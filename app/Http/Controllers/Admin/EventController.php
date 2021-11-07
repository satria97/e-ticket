<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('id','DESC')->paginate(10);
        return view('admin.event.list_event', compact('events'));
    }

    public function insert()
    {
        return view('admin.event.add_event');
    }

    public function insertAction(Request $request)
    {
        $validatedData = $request->validate([
            'nm_event' => 'required',
            'slug' => 'required',
            'tgl_event' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ]);
        $events = new Event();
        $events->nm_event = $request->input('nm_event');
        $events->slug = $request->input('slug');
        $events->tgl_event = $request->input('tgl_event');
        $events->jam_mulai = $request->input('jam_mulai');
        $events->jam_selesai = $request->input('jam_selesai');
        $events->lokasi = $request->input('lokasi');
        $events->deskripsi = $request->input('deskripsi');
        $events->save();
        return redirect('admin/event')->with('message','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $events = Event::findOrFail($id);
        return view('admin.event.edit_event', compact('events'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nm_event' => 'required',
            'slug' => 'required',
            'tgl_event' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required'
        ]);
        $events = Event::findOrFail($id);
        $events->nm_event = $request->input('nm_event');
        $events->slug = $request->input('slug');
        $events->tgl_event = $request->input('tgl_event');
        $events->jam_mulai = $request->input('jam_mulai');
        $events->jam_selesai = $request->input('jam_selesai');
        $events->lokasi = $request->input('lokasi');
        $events->deskripsi = $request->input('deskripsi');
        $events->save();
        return redirect('admin/event')->with('message', 'Data berhasil diubah');
    }
    public function delete($id)
    {
        $events = Event::findOrFail($id);
        $events->delete();
        return redirect('admin/event')->with('message', 'Data berhasil dihapus');
    }
}
