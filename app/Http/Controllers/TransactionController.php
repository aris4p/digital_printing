<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index(){
        $transaksi = Transaction::all();
        
        return view('admin.transaksi.index', [
            'title' => "Transaksi"
        ], compact('transaksi')) ;
    }
    
    public function filter_transaction(Request $request){
        
        $startDate = $request->input('startDate');
        
        // menghitung untuk menambah 30 hari dari waktu di mulai
        $endDate = date('Y-m-d', strtotime($startDate . ' +30 days'));
        
        $transaksis = Transaction::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
        ->orderBy('created_at', 'desc')
        ->get();
        
        
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $mpdf->WriteHTML(view('admin.transaksi.cetak_transaksi', compact('transaksis','startDate','endDate')));
        $mpdf->Output('transaksi_30Days.pdf','D');
    }
}
