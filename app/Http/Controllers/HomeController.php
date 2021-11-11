<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tickets = Ticket::with('event')->orderBy('id','DESC')->paginate(4); 
        return view('front-page/home', compact('tickets'));
    }
    public function detail($slug)
    {
        $tickets = DB::table('tickets')
        ->join('events', 'events.id','=','tickets.event_id')
        ->where('events.slug', $slug)
        ->first();
        return view('front-page/detail', compact('tickets'));
    }

    public function booking(Request $request)
    {
        $ticket_id = $request->input('ticket_id');
        $qty = $request->input('qty');

        $orders = new Order();
        $orders->user_id = Auth::user()->id;
        $orders->tgl_order = Carbon::now();
        $orders->total = 0;
        $orders->save();
        $id = $orders->id;
        
        $orders = Order::where('id', $id)->get();
        $tickets = Ticket::where('id', $request->ticket_id)->first();
        $order_items = new OrderItem();
        $order_items->order_id = $id ;
        $order_items->ticket_id = $ticket_id;
        $order_items->qty = $qty;
        $order_items->subtotal = $qty * $tickets->harga;
        $order_items->save();
        $total = 0;
        $order_items = OrderItem::with('ticket')->where('order_id', $id)->get();
        foreach($order_items as $row){
            $total = $total + $row->ticket->harga * $row->qty;
        }
        $orders = ['total' => $total];
        DB::table('orders')->where('id', $id)->update($orders);        
        $tickets = ['stok' => $tickets->stok - $qty];
        DB::table('tickets')->where('id', $ticket_id)->update($tickets);
        return redirect('/home')->with('message','Booking ticket berhasil');
    }
}
