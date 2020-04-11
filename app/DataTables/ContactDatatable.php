<?php

namespace App\DataTables;

use App\Contact;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContactDatatable extends DataTable
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
            ->addColumn('checkbox', 'BackEnd.contacts.btn.checkbox')
            ->addColumn('edit', 'BackEnd.contacts.btn.edit')
            ->addColumn('delete', 'BackEnd.contacts.btn.delete')
            ->rawColumns([
                'edit' ,
                'delete',
                'checkbox'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ContactDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contact $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('contactdatatable-table')
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
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
            Column::make('id'),
            Column::make('name')->title(trans('lang.Name')),
            Column::make('email')->title(trans('lang.Email')),
            Column::make('type_message')->title(trans('lang.Type Message')),
            Column::make('subject')->title(trans('lang.Subject')),
            Column::make('bodyMessage')->title(trans('lang.Message')),
            Column::make('created_at'),
            Column::make('updated_at'),
            [
                'name'  => 'edit',
                'data'  => 'edit',
                'title' => trans('lang.Edit'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false
            ],
            [
                'name'  => 'delete',
                'data'  => 'delete',
                'title' => trans('lang.Delete'),
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
        return 'Contact_' . date('YmdHis');
    }
}
