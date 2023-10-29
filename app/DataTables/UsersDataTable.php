<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Gate;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('d-m-Y');
            })
            ->editColumn('updated_at', function ($row) {
                return $row->updated_at->format('d-m-Y');
            })
            ->setRowId('Id')
            ->addColumn('role', function($row){
                return $row->getRoleNames()[0];
            })
            ->addIndexColumn()

            ->addColumn('action', function($row){
                $action = '';
                if(Gate::allows('update')){
                    $action ='<a class="btn btn-sm btn-primary" href="'.route('users.edit',$row->id).'"  ><i class="fas fa-pencil-alt"></i></a>';
                }
                if(Gate::allows('delete')){
                    $action .= '
                    <form action="' . route('users.destroy', $row->id) . '" method="POST" style="display: inline;">
                ' . csrf_field() . '
                ' . method_field('DELETE') . '
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
                    ';

                }


                return $action;
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(3)
                    ->selectStyleSingle()
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => [
                            ['extend' => 'print', 'exportOptions' => ['columns' => [0,1,2,3,4,5]]],
                            ['extend' => 'excel', 'exportOptions' => ['columns' => [0,1,2,3,4,5]]],
                            ['extend' => 'csv', 'exportOptions' => ['columns' => [0,1,2,3,4,5]]],
                            ['extend'=>'pdf', 'exportOptions' => ['columns' => [0,1,2,3,4,5]]],
                        ],
                        'searchDelay'  => 1000,

                    ]);

    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            // Column::make('id'),
            Column::make('DT_RowIndex')->title('#')->searchabke(false)->orderable(false),
            Column::make('name'),
            Column::make('email'),
            Column::make('role'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
            ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
