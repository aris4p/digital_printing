<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;
use Illuminate\Support\Str;

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

        dd($request->all());

        $params = [
            'external_id' => Str::uuid(),
            'amount' => $request->amount,
            'description' => $request->description,
            'invoice_duration' => 86400,
            'customer' => [
                'given_names' => $request->nama_customer,
                'email' => $request->email_customer,
                'mobile_number' => $request->nohp_customer,
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
            'success_redirect_url' => 'https=>//www.google.com',
            'failure_redirect_url' => 'https=>//www.google.com',
            'currency' => 'IDR',
            'items' => [
                [
                    'name' => $request->nama_product,
                    'quantity' => $request->qty,
                    'price' => $request->price,
                    'category' => 'Electronic',
                    'url' => 'https=>//yourcompany.com/example_item'
                ]
            ]
          ];
          return response()->json([$params]);
          $createInvoice = \Xendit\Invoice::create($params);

          return response()->json(['data' => $createInvoice]);
    }

    public function callback()
    {

    }
}
