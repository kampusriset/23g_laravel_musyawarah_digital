<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Notulen;
use Illuminate\Http\Request;

class NotulenController extends Controller
{
    public function index() {
        $notulens = Notulen::orderBy('created_at','desc')->get();
        return view('warga.notulen',compact('notulens'));
    }

    public function store(Request $request){
        $request->validate(['judul'=>'required','catatan'=>'required']);
        $notulen = Notulen::create([
            'judul_musyawarah'=>$request->judul,
            'catatan'=>$request->catatan,
            'status'=>'draft',
            'admin_id'=>auth('warga')->id()
        ]);
        return response()->json($notulen);
    }

    public function update(Request $request, $id){
        $notulen = Notulen::findOrFail($id);
        $notulen->update(['catatan'=>$request->catatan]);
        return response()->json($notulen);
    }
}
