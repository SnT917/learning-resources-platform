<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class VoteController extends Controller
{
    public function __invoke(Request $request, Resources $resource){
        //Buscar o crear al votante
        $voterId = $request->cookie('voter_code');
        $voter = Voter::where('code', $voterId)->first();

        if(!$voter){
            $voter = Voter::create([
                'code' => Str::random(30),
            ]);
            Cookie::queue('voter_code', $voter->code, 60 * 24 * 30);
        }

        //Toggle del voto
        $resource->votes()->toggle($voter->id);

        //Devolverle el resource
        return $resource->load('votes', 'category');
    }
}