<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hujan;

class DashboardController extends Controller
{
    public function index()
    {
    
    	//Ambil data hujan 30 hari terakhir
    	$hujans = Hujan::select(['tanggal','total'])
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();

        $data = [
            'hujans' => $hujans
        ];

        return view('vendor.backpack.base.dashboard')->with(compact('data'));
    }
}
