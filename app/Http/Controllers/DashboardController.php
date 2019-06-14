<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Hujan;

class DashboardController extends Controller
{
    public function index()
    {
    
    	//Ambil data hujan 30 hari terakhir di Stasiun Tanah Miring
    	$tanahmiring = Hujan::select(['tanggal','total'])
                    ->where('stasiun', 'like', 'tanahmiring%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Met Merauke
        $metmerauke = Hujan::select(['tanggal','total'])
                    ->where('stasiun', 'like', '%met.merauke%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun mimibaru
        $mimibaru = Hujan::select(['tanggal','total'])
                    ->where('stasiun', 'like', '%mimibaru%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Okaba
        $okaba = Hujan::select(['tanggal','total'])
                    ->where('stasiun', 'like', '%okaba%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Agats
        $agats = Hujan::select(['tanggal','total'])
                    ->where('stasiun', 'like', '%agats%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Atsj
        $atsj = Hujan::select(['tanggal','total'])
                    ->where('stasiun', 'like', '%atsj%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        $totalrains = DB::table('hujans')->count();
        $totaltemps = DB::table('temperaturs')->count();
        $totalwinds = DB::table('angins')->count();
        $totalnisbis = DB::table('nisbis')->count();

        $data = [
            'tanahmiring' => $tanahmiring,
            'totalrains' => $totalrains,
            'totaltemps' => $totaltemps,
            'totalwinds' => $totalwinds,
            'totalnisbis' => $totalnisbis,
            'metmerauke' => $metmerauke,
            'mimibaru' => $mimibaru,
            'okaba' => $okaba,
            'agats' => $agats,
            'atsj' => $atsj,
        ];

        return view('vendor.backpack.base.dashboard')->with(compact('data'));
    }
}
