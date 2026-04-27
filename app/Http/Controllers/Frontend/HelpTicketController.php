<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HelpTicket;
use App\Models\Booking;
use App\Repositories\Frontend\HelpTicketRepository;
use Illuminate\Http\Request;

class HelpTicketController extends Controller
{
    private $repository;

    public function __construct(HelpTicketRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function create(Request $request)
    {
        $booking = null;
        if ($request->has('booking_id')) {
            $booking = Booking::where('consumer_id', auth()->id())->find($request->booking_id);
        }
        return view('frontend.help-ticket.create', compact('booking'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'category' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'description' => 'required|string',
            'booking_id' => 'nullable|exists:bookings,id',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        return $this->repository->store($request);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        return $this->repository->reply($request, $id);
    }
}
