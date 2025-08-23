<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Obrolan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObrolanController extends Controller
{
    public function index()
    {
        $items = Obrolan::with('warga')->orderByDesc('id_obrolan')->paginate(15);
        return view('warga.obrolan.index', compact('items'));
    }

    public function create()
    {
        return view('warga.obrolan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pesan'      => 'required|string|max:5000',
            'tipe_pesan' => 'nullable|in:text,image,file,system',
            'parent_id'  => 'nullable|integer',
            'file'       => 'nullable|file|max:20480' // 20MB
        ]);

        $data = [
            'warga_id'   => auth()->id(),
   
            'pesan'      => $validated['pesan'],
            'tipe_pesan' => $validated['tipe_pesan'] ?? 'text',
            'parent_id'  => $validated['parent_id'] ?? null,
            'is_edited'  => false,
            'is_deleted' => false,
        ];

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('chat', 'public');
            $data['file_path'] = $path;
            $data['file_name'] = $request->file('file')->getClientOriginalName();
            $data['file_size'] = $request->file('file')->getSize();
            $data['tipe_pesan'] = str_starts_with($request->file('file')->getClientMimeType(),'image') ? 'image' : 'file';
        }

        Obrolan::create($data);
        return redirect()->route('warga.obrolan.index')->with('success','Pesan dibuat');
    }

    public function edit($id)
    {
        $item = Obrolan::findOrFail($id);
        $this->authorizeOwner($item);
        return view('warga.obrolan.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Obrolan::findOrFail($id);
        $this->authorizeOwner($item);

        $validated = $request->validate([
            'pesan' => 'required|string|max:5000',
            'file'  => 'nullable|file|max:20480'
        ]);

        $item->pesan = $validated['pesan'];
        $item->is_edited = true;
        $item->edited_at = now();

        if ($request->hasFile('file')) {
            if ($item->file_path) Storage::disk('public')->delete($item->file_path);
            $path = $request->file('file')->store('chat', 'public');
            $item->file_path = $path;
            $item->file_name = $request->file('file')->getClientOriginalName();
            $item->file_size = $request->file('file')->getSize();
        }

        $item->save();
        return redirect()->route('warga.obrolan.index')->with('success','Pesan diupdate');
    }

    public function destroy($id)
    {
        $item = Obrolan::findOrFail($id);
        $this->authorizeOwner($item);
        if ($item->file_path) Storage::disk('public')->delete($item->file_path);
        $item->delete();
        return back()->with('success','Pesan dihapus');
    }

    private function authorizeOwner(Obrolan $item)
    {
        if ($item->warga_id !== auth()->id()) {
            abort(403,'Tidak boleh mengubah pesan orang lain');
        }
    }
}
