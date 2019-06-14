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
                    ->where('stasiun', 'like', '%staklim%')
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
        //Ambil data hujan 30 hari terakhir di Stasiun Wapeko
        $wapeko = Hujan::select(['tanggal','total'])
                    ->where('stasiun', 'like', '%wapeko%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Wapeko
        $wonorejo = Hujan::select(['tanggal','total'])
                    ->where('stasiun', 'like', '%wonorejo%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Iwaka
        $iwaka = Hujan::select(['tanggal','total'])
                    ->where('stasiun', 'like', '%iwaka%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Kepi
        $kepi = Hujan::select(['tanggal','total'])
                    ->where('stasiun', 'like', '%kepi%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        $amunkay = Hujan::select(['tanggal','total'])
                    ->where('stasiun', 'like', '%amun%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        $semangga = Hujan::select(['tanggal','total'])
                    ->where('stasiun', 'like', '%semangga%')
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
            'wapeko' => $wapeko,
            'wonorejo' => $wonorejo,
            'iwaka' => $iwaka,    
            'kepi' => $kepi,  
            'amunkay' => $amunkay,    
            'semangga' => $semangga,         
        ];

        return view('vendor.backpack.base.dashboard')->with(compact('data'));
    }
}
