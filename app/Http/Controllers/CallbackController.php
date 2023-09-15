<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Xendit\Xendit;
use Xendit\Invoice;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function __construct()
    {
        Xendit::setApiKey('xnd_development_sdrY7gw2rG0B3u5glRZZRnIDVcxQQzfTGq1kArfGj4yxyWPHXpibWUtoLWXo');

    }
    public function handleCallback(Request $request)
    {
       $invoice = Invoice::retrieve($request->id);
        // dd($invoice);
       $transaction = Transaction::where('external_id', $request->external_id)->firstOrFail();

       if ($transaction->status == 'settled')
       {
            return response()->json(['message' => "Transaction Has been paid already"]);
       }

       $transaction->status = strtolower($invoice['status']);
       $transaction->save();

        return response()->json(['message'=> "Transaction status has been updated"]);
    }
}
