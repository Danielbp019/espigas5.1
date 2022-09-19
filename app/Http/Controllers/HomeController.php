<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use App\Pqrnc;
use App\Pqr;

class HomeController extends Controller
{
    public function index(){
        $countpqrncs= Pqrnc::where('pending','=','SI')->count();
        $countpqrs= Pqr::where('pending','=','SI')->count();
        return view('home', [
                                'countpqrncs' => $countpqrncs,
                                'countpqrs' => $countpqrs
                                ]);
    }
    
}//end
