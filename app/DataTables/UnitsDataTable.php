<?php

namespace App\DataTables;

use App\Models\Unit;
use Yajra\DataTables\Html\Builder;

class UnitsDataTable extends Builder
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($row) {
                return '<a href="' . route('admin.unit.edit', $row->id) . '" class="btn btn-xs btn-primary">Edit</a>';
            })
            ->rawColumns(['action']);
    }

    public function query(Unit $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('units-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0);
    }

    protected function getColumns()
    {
        return [
            'id' => ['title' => 'ID'],
            'name' => ['title' => 'Name'],
            'code' => ['title' => 'Code'],
            'action' => ['title' => 'Actions', 'orderable' => false, 'searchable' => false],
        ];
    }
}
