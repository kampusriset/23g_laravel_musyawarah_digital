<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        $items = Presensi::where('warga_id', auth()->id())
                 ->orderByDesc('id_presensi')->paginate(15);
        return view('warga.presensi.index', compact('items'));
    }

    public function create()
    {
        return view('warga.presensi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agenda_id'      => 'nullable|integer',
            'metode_presensi'=> 'required|string|max:50',
        ]);

        Presensi::create([
            'agenda_id'    => $data['agenda_id'] ?? null,
            'warga_id'     => auth()->id(),
            'waktu_hadir'  => now(),
            'metode_presensi' => $data['metode_presensi'],
        ]);

        return redirect()->route('warga.presensi.index')->with('success','Presensi tercatat');
    }

    public function destroy($id)
    {
        $item = Presensi::findOrFail($id);
        if ($item->warga_id !== auth()->id()) abort(403);
        $item->delete();
        return back()->with('success','Presensi dihapus');
    }
}
