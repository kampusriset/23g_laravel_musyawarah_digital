<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\UsulanKegiatan;
use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    public function index()
    {
        // tampilkan daftar usulan + ringkasan hasil
        $usulan = UsulanKegiatan::withCount([
            'votes as total_setuju' => fn($q)=>$q->where('pilihan','setuju'),
            'votes as total_tidak'  => fn($q)=>$q->where('pilihan','tidak'),
            'votes as total_abstain'=> fn($q)=>$q->where('pilihan','abstain'),
        ])->orderByDesc('id_usulan')->paginate(10);

        return view('warga.voting.index', compact('usulan'));
    }

    public function create()
    {
        return view('warga.voting.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul_usulan'     => 'required|string|max:255',
            'deskripsi'        => 'nullable|string',
            'anggaran_estimasi'=> 'nullable|numeric|min:0',
            'status_usulan'    => 'required|string|max:50',
        ]);
        $data['warga_id'] = auth()->id();
        $data['agenda_id'] = null;
        UsulanKegiatan::create($data);
        return redirect()->route('warga.voting.index')->with('success','Usulan dibuat');
    }

    public function edit($id)
    {
        $item = UsulanKegiatan::findOrFail($id);
        if ($item->warga_id !== auth()->id()) abort(403);
        return view('warga.voting.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = UsulanKegiatan::findOrFail($id);
        if ($item->warga_id !== auth()->id()) abort(403);

        $data = $request->validate([
            'judul_usulan'     => 'required|string|max:255',
            'deskripsi'        => 'nullable|string',
            'anggaran_estimasi'=> 'nullable|numeric|min:0',
            'status_usulan'    => 'required|string|max:50',
        ]);
        $item->update($data);
        return redirect()->route('warga.voting.index')->with('success','Usulan diupdate');
    }

    public function destroy($id)
    {
        $item = UsulanKegiatan::findOrFail($id);
        if ($item->warga_id !== auth()->id()) abort(403);
        DB::transaction(function() use ($item){
            Voting::where('usulan_id',$item->id_usulan)->delete();
            $item->delete();
        });
        return back()->with('success','Usulan dihapus');
    }

    public function vote(Request $request, $id)
    {
        $request->validate([
            'pilihan' => 'required|in:setuju,tidak,abstain',
            'komentar'=> 'nullable|string|max:1000'
        ]);
        $usulan = UsulanKegiatan::findOrFail($id);

        // upsert vote per warga
        $vote = Voting::firstOrNew([
            'usulan_id' => $usulan->id_usulan,
            'warga_id'  => auth()->id(),
        ]);
        $vote->pilihan = $request->pilihan;
        $vote->komentar = $request->komentar;
        $vote->save();

        return back()->with('success','Vote disimpan');
    }
}
