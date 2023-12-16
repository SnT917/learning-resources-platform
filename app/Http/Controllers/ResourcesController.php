<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Models\Resources;
use App\Models\Category;

class ResourcesController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Resources', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'resources' => Resources::with('category')->get(),
        ]);
    }

    public function store(Request $request){
        Resources::create([
            'title' => $request->title,
            'link' => $request->link,
            'description' => $request->description,
            'category_id' => Category::first()->id,
            'creator_id' => $request->user()->id,
        ]);
    }
}