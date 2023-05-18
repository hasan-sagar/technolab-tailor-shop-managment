<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;

class InvoiceController extends Controller
{
    //
    public function OrderDetailsInvoice($orderId)
    {
        $order = Order::where('id',$orderId)->first();
        $orderDetails = OrderDetails::with('service')->where('order_id',$orderId)->get();

        //return [$order,$orderDetails];
         return view('invoice.view_invoice',compact('order','orderDetails'));
    }
}
