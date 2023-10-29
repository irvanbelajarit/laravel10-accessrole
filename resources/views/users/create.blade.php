@extends('layouts.template')


@section('title')
Tambah User
@endsection


@section('breadcrumb')
{{ Breadcrumbs::render('user-create') }}
@endsection

@section('content')
<div class="col-lg-6 mx-auto">
     <!-- general form elements -->
     <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">New Users</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('users.store')}}" method="POST">
          @csrf
          <div class="card-body">

            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
              @error('name')
              <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              @error('email')
              <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
              </span>

              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              @error('password')
              <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password">
              @error('password')
              <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
              </span>

              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Role</label>
              {{-- select --}}
              <select class="form-control" name="roles">
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>
            </div>


          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->


  </div>
  @endsection
