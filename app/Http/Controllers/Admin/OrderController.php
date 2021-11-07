<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Ticket;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')->join('users', 'users.id','=','orders.user_id')->orderBy('orders.id','DESC')->get();
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
        return redirect('admin/order/insert_item/'.$id)->with('message','Data berhasil ditambahkan');
    }
    public function insertItem($id)
    {
        $data['id'] = $id;
        $data['tickets'] = Ticket::get();
        $data['order_items'] = DB::table('order_items')->join('tickets', 'tickets.id','=','order_items.ticket_id')
        ->where('order_id', $id)
        ->orderBy('order_items.id','DESC')->get();
        return view('admin/order/insert_item', $data);
    }
    public function insertItemAction(Request $request)
    {
        $validatedData =$request->validate([
            'order_id' => 'required',
            'ticket_id' =>'required',
            'qty' => 'required',
            'subtotal' =>'required'
        ]);
        $tickets = Ticket::where('id', $request->ticket_id)->first();
        $order_items = new OrderItem();
        $order_items->order_id = $request->order_id;
        $order_items->ticket_id = $request->ticket_id;
        $order_items->qty = $request->qty;
        $order_items->subtotal = $request->qty * $tickets->harga;
        $order_items->save();
        $total = 0;
        foreach($order_items as $row){
            $total = $total + $row->ticket->harga * $row->qty;
        }
        $tickets->total = $total;
        $tickets->stok = $tickets->stok - $order_items->qty;
        $tickets->save();
        return back()->with('message','Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $orders = Order::findOrFail($id);
        $users = User::get();
        return view('admin/order/edit', compact('orders','users'));
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
        return redirect('admin/order')->with('message','Data berhasil dihapus');
    }
}
