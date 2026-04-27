<?php

namespace App\DataTables;

use App\Models\TimeSlot;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;
use Spatie\Permission\Traits\HasRoles;

class ServicemanTimeSlotDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->editColumn('created_at', function ($row) {
                return date('d-M-Y', strtotime($row->created_at));
            })
            ->editColumn('serviceman.name', function ($row) {
                $serviceman = $row->serviceman;
                if ($serviceman) {
                    return view('backend.inc.action', [
                        'info' => $serviceman,
                        'ratings' => $serviceman->review_ratings,
                        'route' => 'backend.serviceman.edit' // Changed route for serviceman since general-info is dashboard specific, edit works fine.
                    ]);
                }
                return 'N/A';
            })
            ->editColumn('checkbox', function ($row) {
                return '<div class="form-check"><input type="checkbox" name="row" class="rowClass form-check-input" value='.$row->id.' id="rowId'.$row->id.'"></div>';
            })
            ->editColumn('action', function ($row) {
                return view('backend.inc.action', [
                    'edit' => 'backend.serviceman-time-slot.edit',
                    'delete' => 'backend.serviceman-time-slot.destroy',
                    'edit_permission' => 'backend.serviceman.edit', // Reuse serviceman permissions or define new ones
                    'delete_permission' => 'backend.serviceman.destroy',
                    'data' => $row,
                ]);
            })
            ->rawColumns(['checkbox','action', 'created_at']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(TimeSlot $model): QueryBuilder
    {
        // Only get time slots where serviceman_id is not null
        $timeSlots = $model->newQuery()->whereNotNull('serviceman_id');

        $user = auth()->user();
        if ($user) {
            if ($user->hasRole('admin')) {
                // Admin can see all serviceman time slots
                $timeSlots = $timeSlots->orderBy('created_at', 'desc');
            }  // We assume servicemen don't log into the backend. If they do, add role checking here.
        }

        if (request()->order) {
            if ((bool) head(request()->order)['column']) {
                $index = head(request()->order)['column'];

                if (!isset(request()->columns[$index]['orderable'])) {
                    return $timeSlots;
                }
            }
        }

        return $timeSlots?->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        $user = auth()->user();
        $builder = $this->builder();
        $no_records_found = __('static.no_records_found');
        $timeslot = TimeSlot::whereNotNull('serviceman_id')->get();
        $builder->setTableId('servicemantimeslot-table');
        if ($user?->can('backend.serviceman.destroy')) {
            if($timeslot->count() > 1) {
            $builder->addColumn(['data' => 'checkbox', 'title' => '<div class="form-check"><input type="checkbox" class="form-check-input" title="Select All" id="select-all-rows" /> </div>', 'class' => 'title', 'orderable' => false, 'searchable' => false]);
            }
        }
        // Instead of hardcoding translation, I'll use raw string if not found, but it should be fine
        $builder->addColumn(['data' => 'serviceman.name', 'title' => 'Provider Name', 'orderable' => false, 'searchable' => true])
            ->addColumn(['data' => 'created_at', 'title' => __('static.created_at'), 'orderable' => true, 'searchable' => false]);

        if ($user->can('backend.serviceman.edit') || $user->can('backend.serviceman.destroy')) {
            $builder->addColumn(['data' => 'action', 'title' => __('static.action'), 'orderable' => false, 'searchable' => false]);

        }

        return $builder->minifiedAjax()
        ->selectStyleSingle()
        ->parameters([
            'language' => [
                'emptyTable' => $no_records_found,
                'infoEmpty' => '',
                'zeroRecords' => $no_records_found,
            ],
            'drawCallback' => 'function(settings) {
                if (settings._iRecordsDisplay === 0) {
                    $(settings.nTableWrapper).find(".dataTables_paginate").hide();
                } else {
                    $(settings.nTableWrapper).find(".dataTables_paginate").show();
                }
                feather.replace();
            }',
        ]);

    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ServicemanTimeSlot_'.date('YmdHis');
    }
}
