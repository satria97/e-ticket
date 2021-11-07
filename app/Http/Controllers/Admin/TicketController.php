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
        $tickets = Ticket::with('event')->orderBy('id','DESC')->get();
        return view('admin.ticket.list_ticket', compact('tickets'));
    }
    public function insert()
    {
        $events = DB::table('events')->get();
        return view('admin.ticket.add_ticket', compact('events'));
    }
    public function insertAction(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png,bmp|max:2048',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'diskon' => 'required',
            'status' => 'required'
        ]);
        if ($request->hasFile('gambar')) {
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $imageName = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('gambar')->storeAs('public/images', $imageName);
        } else {
            $imageName = 'noimage.jpg';
        }
        $tickets = new Ticket();
        $tickets->event_id = $request->input('event_id');
        $tickets->harga = $request->input('harga');
        $tickets->stok = $request->input('stok');
        $tickets->diskon = $request->input('diskon');
        $tickets->gambar = $imageName;
        $tickets->status = $request->input('status');
        $tickets->save();
        return redirect('admin/ticket')->with('message','Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $tickets = Ticket::findOrFail($id);
        $events = DB::table('events')->get();
        return view('admin.ticket.edit_ticket', compact('tickets','events'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'event_id' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png,bmp|max:2048',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'diskon' => 'required',
            'status' => 'required'
        ]);
        $tickets = Ticket::findOrFail($id);
        if (Request()->gambar <> "") {
            if ($request->hasFile('gambar')) {
                $filenameWithExt = $request->file('gambar')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('gambar')->getClientOriginalExtension();
                $imageName = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('gambar')->storeAs('public/images', $imageName);
            } else {
                $imageName = 'noimage.jpg';
            }
            $tickets->event_id = $request->input('event_id');
            $tickets->gambar = $imageName;
            $tickets->harga = $request->input('harga');
            $tickets->stok = $request->input('stok');
            $tickets->diskon = $request->input('diskon');
            $tickets->status = $request->input('status');
            $tickets->save();
        } else {
            $tickets->event_id = $request->input('event_id');
            $tickets->harga = $request->input('harga');
            $tickets->stok = $request->input('stok');
            $tickets->diskon = $request->input('diskon');
            $tickets->status = $request->input('status');
            $tickets->save();
        }
        return redirect('admin/ticket')->with('message','Data berhasil diubah');
    }
    public function delete($id)
    {
        $tickets = Ticket::findOrFail($id);
        if ($tickets->image <> "") {
            unlink(public_path('storage/images') . '/' . $tickets->image);
            $tickets->delete();
        }
        $tickets->delete();
        return redirect('admin/ticket')->with('message','Data berhasil dihapus');
    }
}
