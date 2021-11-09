<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Ticket;
use App\Models\Event;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $orders = Order::with('user')->orderBy('orders.id','DESC')->paginate(10);
        return view('admin.order.list_order', compact('orders'));
    }
    public function insert()
    {
        $users = User::get();
        return view('admin.order.add_order', compact('users'));
    }
    public function insertAction(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'tgl_order' => 'required'
        ]);
        $orders = new Order();
        $orders->user_id = $request->input('user_id');
        $orders->tgl_order = $request->input('tgl_order');
        $orders->total = 0;
        $orders->save();
        $id = $orders->id;
        return redirect('admin/order/item/'.$id)->with('message','Data berhasil ditambahkan');
    }
    public function insertItem($id)
    {
        $data['id'] = $id;
        $data['tickets'] = DB::table('tickets')->join('events', 'events.id','=','tickets.event_id')->get();
        $data['order_items'] = DB::table('order_items')->join('tickets', 'tickets.id','=','order_items.ticket_id')
        ->join('events', 'events.id','=','tickets.event_id')
        ->where('order_id', $id)
        ->orderBy('order_items.id','DESC')->paginate(5);
        return view('admin/order/add_item', $data);
    }
    public function insertItemAction(Request $request)
    {
        $validatedData = $request->validate([
            'ticket_id' =>'required',
            'qty' => 'required'
        ]);
        $tickets = Ticket::where('id', $request->ticket_id)->first();
        $order_items = new OrderItem();
        $order_items->order_id = $request->input('order_id');
        $order_items->ticket_id = $request->ticket_id;
        $order_items->qty = $request->qty;
        $order_items->subtotal = $request->qty * $tickets->harga;
        $order_items->save();
        $orders = Order::where('id', $request->order_id)->get();
        $total = 0;
        $order_items = OrderItem::with('ticket')->where('order_id', $request->order_id)->get();
        foreach($order_items as $row){
            $total = $total + $row->ticket->harga * $row->qty;
        }
        $orders = ['total' => $total];
        DB::table('orders')->where('id', $request->order_id)->update($orders);        
        $tickets = ['stok' => $tickets->stok - $request->qty];
        DB::table('tickets')->where('id', $request->ticket_id)->update($tickets);
        return back()->with('message','Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $orders = Order::findOrFail($id);
        $users = User::get();
        return view('admin/order/edit_order', compact('orders','users'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'tgl_order' => 'required'
        ]);
        $orders = Order::findOrFail($id);
        $orders->user_id = $request->input('user_id');
        $orders->tgl_order = $request->input('tgl_order');
        $orders->save();
        return redirect('admin/order')->with('message','Data berhasil diubah');
    }
    public function delete($id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete();
        $order_items = Order::where('order_id', $id)->get();
        $order_items->delete();
        return redirect('admin/order')->with('message','Data berhasil dihapus');
    }

    public function deleteItem($order_id, $id)
    {
        $order_items = Order::findOrFail($id);
        $order_items->delete();
        return redirect('admin/order/item/' . $order_id)->with('message', 'Delete data successfully');
    }
}
