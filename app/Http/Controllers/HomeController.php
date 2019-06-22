<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stasiun;

class HomeController extends Controller
{
   public function index () {
   	$stasiuns = Stasiun::all();
   	return view('welcome', compact('stasiuns'));

   }
}
