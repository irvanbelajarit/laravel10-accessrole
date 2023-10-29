<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\DataTables\UsersDataTable;
//validator
use Illuminate\Support\Facades\Validator;
//DB
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $userDataTable)
    {
        $user = User::all();
        return $userDataTable->render('users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */

     protected function validator(array $data)
     {
         return Validator::make($data, [
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);
     }
     protected function validatorEdit(array $data)
     {
         return Validator::make($data, [
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255'],
             'password' => ['nullable', 'string', 'min:8', 'confirmed'],

         ]);
     }

    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

       // dd($request->all());



        //create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find($id);
        $roles = Role::all();
        //get role id
       // dd($user->roles()->pluck('id')[0]);

        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validatorEdit($request->all())->validate();
        $user = User::find($id);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;

        if($request->password != null){
            $data['password'] = bcrypt($request->password);
        }

        DB::table('users')->where('id',$id)->update($data);
        $user->roles()->sync($request->roles);


        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete

        $user = User::find($id);

        $currentUser = auth()->user();

        //jika current user == user tidak bisa delete
        if($currentUser->id == $user->id){
            return redirect()->route('users.index');
        }



        $user->delete();
        return redirect()->route('users.index');

    }
}
