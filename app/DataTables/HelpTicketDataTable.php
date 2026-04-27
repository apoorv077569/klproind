<?php

namespace App\DataTables;

use App\Models\HelpTicket;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class HelpTicketDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('action', function ($row) {
                return view('backend.inc.action', [
                    'show' => 'backend.help-tickets.show',
                    'delete' => 'backend.help-tickets.destroy',
                    'data' => $row,
                ]);
            })
            ->editColumn('user_id', function ($row) {
                return $row->user?->name ?? 'N/A';
            })
            ->addColumn('role', function ($row) {
                $role = $row->user?->roles?->first()?->name ?? 'user';
                if ($role == 'provider' || $role == 'serviceman') {
                    return '<span class="badge badge-soft-info text-dark">Provider</span>';
                }
                return '<span class="badge badge-soft-primary text-dark">' . ucfirst($role) . '</span>';
            })
            ->editColumn('status', function ($row) {
                $statusClass = [
                    'open' => 'badge-soft-primary',
                    'in-progress' => 'badge-soft-warning',
                    'resolved' => 'badge-soft-success',
                    'closed' => 'badge-soft-secondary',
                ];
                $class = $statusClass[$row->status] ?? 'badge-soft-info';
                return '<span class="badge ' . $class . ' text-dark">' . ucfirst($row->status) . '</span>';
            })
            ->editColumn('priority', function ($row) {
                $priorityClass = [
                    'low' => 'text-primary',
                    'medium' => 'text-warning',
                    'high' => 'text-danger',
                ];
                $class = $priorityClass[$row->priority] ?? '';
                return '<span class="' . $class . ' font-weight-bold">' . ucfirst($row->priority) . '</span>';
            })
            ->editColumn('created_at', function ($row) {
                return date('d-M-Y', strtotime($row->created_at));
            })
            ->editColumn('checkbox', function ($row) {
                return '<div class="form-check"><input type="checkbox" name="row" class="rowClass form-check-input" value="'.$row->id.'" id="rowId'.$row->id.'"></div>';
            })
            ->rawColumns(['action', 'status', 'priority', 'checkbox', 'role']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(HelpTicket $model): QueryBuilder
    {
        $query = $model->newQuery()->with(['user.roles']);
        
        if (request()->status && request()->status != 'all') {
            $query->where('status', request()->status);
        }
        
        if (request()->priority && request()->priority != 'all') {
            $query->where('priority', request()->priority);
        }

        if (request()->role && request()->role != 'all') {
            $query->whereHas('user.roles', function($q) {
                if (request()->role == 'provider') {
                    $q->whereIn('name', ['provider', 'serviceman']);
                } else {
                    $q->where('name', request()->role);
                }
            });
        }

        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        $no_records_found = __('static.no_records_found');
        return $this->builder()
            ->setTableId('help-ticket-table')
            ->addColumn(['data' => 'checkbox', 'title' => '<div class="form-check"><input type="checkbox" class="form-check-input" id="select-all-rows" /> </div>', 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'ticket_id', 'title' => __('Ticket ID')])
            ->addColumn(['data' => 'user_id', 'title' => __('User')])
            ->addColumn(['data' => 'role', 'title' => __('Role'), 'orderable' => false])
            ->addColumn(['data' => 'subject', 'title' => __('Subject')])
            ->addColumn(['data' => 'priority', 'title' => __('Priority')])
            ->addColumn(['data' => 'status', 'title' => __('Status')])
            ->addColumn(['data' => 'created_at', 'title' => __('Date')])
            ->addColumn(['data' => 'action', 'title' => __('Action'), 'orderable' => false, 'searchable' => false])
            ->minifiedAjax()
            ->parameters([
                'language' => [
                    'emptyTable' => $no_records_found,
                    'infoEmpty' => '',
                    'zeroRecords' => $no_records_found,
                ],
                'drawCallback' => 'function() { if(typeof feather !== "undefined") feather.replace(); }',
            ]);
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'HelpTicket_'.date('YmdHis');
    }
}
