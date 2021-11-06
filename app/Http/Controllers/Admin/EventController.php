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
        $event = Event::orderBy('id','DESC')->paginate(10);
        return view('admin.event.list_event', compact('event'));
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
            'jam' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ]);
        $event = new Event();
        $event->nm_event = $request->input('nm_event');
        $event->slug = $request->input('slug');
        $event->tgl_event = $request->input('tgl_event');
        $event->jam = $request->input('jam');
        $event->lokasi = $request->input('lokasi');
        $event->deskripsi = $request->input('deskripsi');
        $event->save();
        return redirect('admin.event')->with('message','Data berhasil ditambahkan');
    }
}
