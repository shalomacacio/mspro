<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.home');
    }

    public function busca(){
        return view('admin.busca');
    }

    // public function convocacao(){
    //     $campanhas = Campanha::all();
    //     return view('admin.convocacao', compact('campanhas'));
    // }
}
