<?php

namespace App\DataTables;

use App\Models\Division;
use phpDocumentor\Reflection\Types\False_;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DivisionDataTable extends DataTable
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
            ->addColumn('action', 'division.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Division $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Division $model)
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
                    ->setTableId('division-table')
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
            ['data' => 'id', 'name' => 'id', 'title' => 'SL NO', 'searchable' => false, 'orderable' => true, 'exportable' => true, 'printable' => true],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name', 'searchable' => true, 'orderable' => false, 'exportable' => true, 'printable' => true],
            ['data' => 'bn_name', 'name' => 'bn_name', 'title' => 'Bangla Name', 'searchable' => true, 'orderable' => false, 'exportable' => true, 'printable' => true],
            ['data' => 'url', 'name' => 'url', 'title' => 'Website', 'searchable' => true, 'orderable' => false, 'exportable' => true, 'printable' => true]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Division_' . date('YmdHis');
    }
}
