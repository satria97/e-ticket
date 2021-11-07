<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('event')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.ticket.list_ticket', compact('tickets'));
    }
}
