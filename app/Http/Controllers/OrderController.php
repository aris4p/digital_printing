<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;
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

        $params = [
            'external_id' => 'demo_1475801962607',
            'amount' => 50000,
            'description' => 'Invoice Demo #123',
            'invoice_duration' => 86400,
            'customer' => [
                'given_names' => 'John',
                'surname' => 'Doe',
                'email' => 'arisanggara72@gmail.com',
                'mobile_number' => '+6287774441111',
                'addresses' => [
                    [
                        'city' => 'Jakarta Selatan',
                        'country' => 'Indonesia',
                        'postal_code' => '12345',
                        'state' => 'Daerah Khusus Ibukota Jakarta',
                        'street_line1' => 'Jalan Makan',
                        'street_line2' => 'Kecamatan Kebayoran Baru'
                    ]
                ]
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
                    'name' => 'Air Conditioner',
                    'quantity' => 1,
                    'price' => 100000,
                    'category' => 'Electronic',
                    'url' => 'https=>//yourcompany.com/example_item'
                ]
            ]
          ];

          $createInvoice = \Xendit\Invoice::create($params);

          return response()->json(['data' => $createInvoice]);
    }
}
