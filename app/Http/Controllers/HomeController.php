<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pqr;
use App\Models\Pqrnc;

class HomeController extends Controller
{
    public function index()
    {
        $countpqrncs = Pqrnc::where('pending', '=', 'SI')->count();
        $countpqrs = Pqr::where('pending', '=', 'SI')->count();
        return view('home', [
            'countpqrncs' => $countpqrncs,
            'countpqrs' => $countpqrs,
        ]);
    }

}