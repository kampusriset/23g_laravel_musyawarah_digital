<?php
namespace App\Http\Controllers\Warga;
use App\Http\Controllers\Controller;
use App\Models\Voting;

class VotingController extends Controller
{
    public function index(){
        $votes = Voting::all();
        return view('warga.voting',compact('votes'));
    }
}
