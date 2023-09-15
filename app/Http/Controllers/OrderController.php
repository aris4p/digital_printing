<?php

namespace App\Http\Controllers;

use Xendit\Xendit;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{

    public function __construct()
    {
        Xendit::setApiKey('xnd_development_sdrY7gw2rG0B3u5glRZZRnIDVcxQQzfTGq1kArfGj4yxyWPHXpibWUtoLWXo');

    }

    public function index()
    {
        return view ('order');
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

                $transaction = new Transaction;
                $transaction->id_xendit = $createInvoice['id'];
                $transaction->external_id = $createInvoice['external_id'];
                $transaction->product_id = $request->product;
                $transaction->name = $request->name_customer;
                $transaction->email = $request->email;
                $transaction->nohp  = $request->no_hp;
                $transaction->status = $createInvoice['status'];
                $transaction->save();
                return redirect()->intended('https://checkout-staging.xendit.co/v2/'.$transaction->id_xendit);
                // return response()->json(['message' =>$transaction]);
            }

            public function lacak()
            {
                return view('order_detail');
            }

            public function get_link(Request $request)
            {

                $getInvoice = \Xendit\Invoice::retrieve($request->invoice);
                return response()->json([$getInvoice]);
            }
        }
