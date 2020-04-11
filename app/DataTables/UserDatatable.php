<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('checkbox', 'BackEnd.users.btn.checkbox')
            ->addColumn('edit', 'BackEnd.users.btn.edit')
            ->addColumn('delete', 'BackEnd.users.btn.delete')
            ->rawColumns([
                'edit' ,
                'delete',
                'checkbox'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\UserDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return User::query()->with('roles');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('userdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'  => 'checkbox',
                'data'  => 'checkbox',
                'title' => '<input type="checkbox" class="check_all" onclick="check_all()" />',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false
            ],
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->title(trans('lang.Action'))
            //       ->addClass('text-center'),
            Column::make('id')->title(trans('lang.ID')),
            Column::make('name')->title(trans('lang.Name')),
            Column::make('email')->title(trans('lang.Email')),
            Column::make('admin')->title(trans('lang.Admin')),
            Column::make('roles' , 'roles.name')->title(trans('lang.Roles')),
            Column::make('created_at')->title(trans('lang.Name')),
            Column::make('updated_at')->title(trans('lang.Name')),
            [
                'name'  => 'edit',
                'data'  => 'edit',
                'title' => trans('lang.edit'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false
            ],
            [
                'name'  => 'delete',
                'data'  => 'delete',
                'title' => trans('lang.delete'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
