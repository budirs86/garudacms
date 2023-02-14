<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Resources\BeritaCategoryResource;

class BeritaCategoryController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $berita = Berita::where('unit_id', $id)->where('category_id', $request->category_id)
        ->with('unit')->with('penulis')->with('category')
        ->orderBy('id', 'DESC')->take(20)->get();
        //return collection of posts as a resource

        return new BeritaCategoryResource(true, 'List Berita Category', $berita);
    }
}
