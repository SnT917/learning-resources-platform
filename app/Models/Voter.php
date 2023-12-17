<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = ['code'];

    public function resources(){
        return $this->belongsToMany(Resources::class, 'votes');
    }

    public static function getOrCreateVoter(Request $request){
        $voterId = $request->cookie('voter_code');
        $voter = Voter::where('code', $voterId)->first();

        if(!$voter){
            $voter = Voter::create([
                'code' => Str::random(30),
            ]);
            Cookie::queue('voter_code', $voter->code, 60 * 24 * 30);
        }

        return $voter;
    }
}