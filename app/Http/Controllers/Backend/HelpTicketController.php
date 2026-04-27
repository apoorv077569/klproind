<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HelpTicket;
use App\DataTables\HelpTicketDataTable;
use App\Repositories\Backend\HelpTicketRepository;
use Illuminate\Http\Request;

class HelpTicketController extends Controller
{
    private $repository;

    public function __construct(HelpTicketRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(HelpTicketDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:open,in-progress,resolved,closed',
        ]);
        return $this->repository->updateStatus($request->all(), $id);
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        return $this->repository->reply($request, $id);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
