<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\Resources;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function __invoke(Request $request, Resources $resource){
        //Buscar o crear al votante
        $voter = Voter::getOrCreateVoter($request);

        //Toggle del voto
        $resource->votes()->toggle($voter->id);

        //Devolverle el resource
        return $resource->load('votes', 'category');
    }
}