<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Notulen;
use Illuminate\Http\Request;

class NotulenController extends Controller
{
    public function index()
    {
        $items = Notulen::orderByDesc('id_notulen')->paginate(10);
        return view('warga.notulen.index', compact('items'));
    }

    public function create(){ return view('warga.notulen.create'); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul_musyawarah' => 'required|string|max:255',
            'total_hadir'      => 'nullable|integer|min:0',
            'total_undangan'   => 'nullable|integer|min:0',
            'catatan'          => 'nullable|string',
            'hasil_keputusan'  => 'nullable|string',
            'status'           => 'required|in:draft,selesai,ditunda',
        ]);
        $data['admin_id'] = auth()->id();
        Notulen::create($data);
        return redirect()->route('warga.notulen.index')->with('success','Notulen disimpan');
    }

    public function edit($id)
    {
        $item = Notulen::findOrFail($id);
        return view('warga.notulen.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Notulen::findOrFail($id);
        $data = $request->validate([
            'judul_musyawarah' => 'required|string|max:255',
            'total_hadir'      => 'nullable|integer|min:0',
            'total_undangan'   => 'nullable|integer|min:0',
            'catatan'          => 'nullable|string',
            'hasil_keputusan'  => 'nullable|string',
            'status'           => 'required|in:draft,selesai,ditunda',
        ]);
        $item->update($data);
        return redirect()->route('warga.notulen.index')->with('success','Notulen diupdate');
    }

    public function destroy($id)
    {
        Notulen::findOrFail($id)->delete();
        return back()->with('success','Notulen dihapus');
    }
}
