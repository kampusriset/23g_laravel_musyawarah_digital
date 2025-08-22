<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Voting;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function index(){
        $votings = Voting::with('usulan')->get();
        return view('warga.voting',compact('votings'));
    }

    public function vote(Request $request){
        $request->validate(['voting_id'=>'required','pilihan'=>'required']);
        $voting = Voting::updateOrCreate(
            ['id'=>$request->voting_id,'warga_id'=>auth('warga')->id()],
            ['pilihan'=>$request->pilihan]
        );
        return response()->json($voting);
    }
}
