<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ResiduesController extends Controller
{
    public function index(){
        return view("residuos");
    }
}
