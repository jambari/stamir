<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Rain;

class DashboardController extends Controller
{
    public function index()
    {
    
    	//Ambil data hujan 30 hari terakhir di Stasiun Tanah Miring
    	$tanahmiring = Rain::select(['tanggal','rain'])
                    ->where('stasiun_id', '=', 3)
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Met Merauke
        $metmerauke = Rain::select(['tanggal','rain'])
                    ->where('stasiun_id', 'like', '%met.merauke%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun mimibaru
        $mimibaru = Rain::select(['tanggal','rain'])
                    ->where('stasiun_id', 'like', '%mimibaru%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Okaba
        $okaba = Rain::select(['tanggal','rain'])
                    ->where('stasiun_id', 'like', '%okaba%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Agats
        $agats = Rain::select(['tanggal','rain'])
                    ->where('stasiun_id', 'like', '%agats%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Atsj
        $atsj = Rain::select(['tanggal','rain'])
                    ->where('stasiun_id', 'like', '%atsj%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Wapeko
        $wapeko = Rain::select(['tanggal','rain'])
                    ->where('stasiun_id', 'like', '%wapeko%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Wapeko
        $wonorejo = Rain::select(['tanggal','rain'])
                    ->where('stasiun_id', 'like', '%wonorejo%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Iwaka
        $iwaka = Rain::select(['tanggal','rain'])
                    ->where('stasiun_id', 'like', '%iwaka%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Ambil data hujan 30 hari terakhir di Stasiun Kepi
        $kepi = Rain::select(['tanggal','rain'])
                    ->where('stasiun_id', 'like', '%kepi%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        $amunkay = Rain::select(['tanggal','rain'])
                    ->where('stasiun_id', 'like', '%amun%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        $semangga = Rain::select(['tanggal','rain'])
                    ->where('stasiun_id', 'like', '%semangga%')
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        $totalrains = DB::table('rains')->count();
        $totaltemps = DB::table('tmaxes')->count();
        $totalwinds = DB::table('ddds')->count();
        $totalnisbis = DB::table('humidities')->count();

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
