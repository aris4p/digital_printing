<?php

namespace App\Http\Controllers;

use Xendit\Xendit;
// use Knp\Snappy\Pdf;
use Xendit\Invoice;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class OrderController extends Controller
{
    
    public function __construct()
    {
        Xendit::setApiKey('xnd_development_sdrY7gw2rG0B3u5glRZZRnIDVcxQQzfTGq1kArfGj4yxyWPHXpibWUtoLWXo');
        
    }
    
    public function index()
    {
        $product = Product::all();
        return view ('order', [
            'title' => "Order"
        ], compact('product'));
    }
    
    public function payment(Request $request)
    {
        
        
        
        
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'name_customer' => 'required',
            'no_hp' => 'required|numeric',
            'email' => 'required|email',
            'product' => 'required',
            'file' => 'required|mimes:png,jpg,gif,svg|max:2048'
        ], [
            'amount.required' => 'Jumlah Wajib Diisi',
            'name_customer.required' => 'Nama Wajib Diisi',
            'no_hp.required' => 'No HP Wajib Diisi',
            'no_hp.numeric' => 'No Hp Hanya Angka',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Format email salah',
            'file.required' => 'gambar  Wajib Diisi',
            'file.mimes' => 'Hanya format png,jpg,gif,svg',
        ]);
        
        $params = [
            'external_id' => Str::uuid(),
            'amount' => $request->amount,
            'customer'=> [
                'given_names' => $request->name_customer,
                'email' => $request->email,
                'mobile_number' => $request->no_hp,
            ],
            'customer_notification_preference' => [
                'invoice_created' => [
                    'whatsapp',
                    'sms',
                    'email',
                    'viber'
                ],
                'invoice_reminder' => [
                    'whatsapp',
                    'sms',
                    'email',
                    'viber'
                ],
                'invoice_paid' => [
                    'whatsapp',
                    'sms',
                    'email',
                    'viber'
                ],
                'invoice_expired' => [
                    'whatsapp',
                    'sms',
                    'email',
                    'viber'
                    ]
                ],
                'success_redirect_url' => 'https=>//creativeme.tech',
                'failure_redirect_url' => 'https=>//www.google.com',
                'currency' => 'IDR',
                'items' => [
                    [
                        'name' => $request->product,
                        'quantity' => 1,
                        'price' => 100000,
                        'category' => 'Electronic',
                        'url' => 'https=>//yourcompany.com/example_item'
                        ]
                    ],
                    
                ];
                
                
                $createInvoice = \Xendit\Invoice::create($params);
                // dd($createInvoice['status']);
                
                
                //request gambar pesanan
                $gambar = time().'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('gambar_pesanan'), $gambar);
                //input ke database
                $transaction = new Transaction;
                $transaction->id_xendit = $createInvoice['id'];
                $transaction->external_id = $createInvoice['external_id'];
                $transaction->product_id = $request->product;
                $transaction->name = $request->name_customer;
                $transaction->email = $request->email;
                $transaction->nohp  = $request->no_hp;
                $transaction->qty  = $request->qty;
                $transaction->harga_total  = $request->amount;
                $transaction->gambar = $gambar;
                $transaction->pesan = $request->message;
                $transaction->status = $createInvoice['status'];
                $transaction->save();
                return  redirect()->route('invoice', ['invoice' => $transaction->id_xendit]);
                // return redirect()->intended('https://checkout-staging.xendit.co/v2/'.$transaction->id_xendit);
                // return response()->json(['message' =>$transaction]);
            }
            
            public function lacak()
            {
                return view('order_detail');
            }
            
            public function get_link(Request $request)
            {
                
                $invoice = \Xendit\Invoice::retrieve($request->invoice);
                
                // return response()->json([$invoice]);
                return view('lacak_invoice', [
                    'title' => "Invoice"
                ], compact('invoice'));
                
            }
            
            public function invoice($invoice){
                $invoice = Transaction::with('product')->where('id_xendit', $invoice)->first();
                
                return view('invoice', [
                    'title' => "Invoice"
                ], compact('invoice'));
            }
            
            public function lihat_invoice($invoice){
                $invoice = \Xendit\Invoice::retrieve($invoice);
                $mpdf = new \Mpdf\Mpdf();
                $mpdf->WriteHTML(view('cetak_invoice', compact('invoice')));
                $mpdf->Output();
            }
            public function cetak_invoice($invoice){
                $invoice = \Xendit\Invoice::retrieve($invoice);
                $mpdf = new \Mpdf\Mpdf();
                $mpdf->WriteHTML(view('cetak_invoice', compact('invoice')));
                $mpdf->Output('invoice.pdf','D');
            }
        }
        