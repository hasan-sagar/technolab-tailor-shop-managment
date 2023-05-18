<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderDetails;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function ViewOrderPage()
    {
        $service = Service::latest()->get();
        $customer = Customer::latest()->get();
        $employee = Employee::latest()->get();
        return view('order.create_order_page', compact('service', 'customer', 'employee'));
    }

    public function AddToCart(Request $request)
    {
        Cart::setGlobalTax(15);
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'weight' => 100,
        ]);

        return redirect()->back();
    }

    public function UpadateItemQuantity(Request $request, $rowId)
    {
        $quantity = $request->qty;
        Cart::update($rowId, $quantity);

        return redirect()->back();
    }

    public function RemoveItemFromCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function CreateOrder(Request $request)
    {
        $validateData = $request->validate([
            'customer_id' => 'required',
        ]);
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['employee_id'] = $request->employee_id;
        $data['order_date'] = $request->order_date;
        $data['delivery_date'] = Carbon::parse($request->delivery_date)->format('d-F-Y');
        $data['order_status'] = $request->order_status;
        $data['priority'] = $request->priority;
        $data['payment_method'] = $request->payment_method;
        $data['comment'] = $request->comment;
        $data['total_products'] = $request->total_products;
        $data['sub_total'] = $request->sub_total;
        $data['vat'] = $request->vat;
        $data['total_price'] = $request->total_price;
        $data['pay'] = $request->pay;
        $data['invoice_no'] = '#'.mt_rand(100000,999999);
        $data['created_at'] = Carbon::now();

        $order_id = Order::insertGetId($data);
        $cartContent = Cart::content();
        $orderDetails = array();
        foreach ($cartContent as $key => $cart) {
            $orderDetails['order_id'] = $order_id;
            $orderDetails['service_id'] = $cart->id;
            $orderDetails['quantity'] = $cart->qty;
            $orderDetails['total'] = $cart->total;

            OrderDetails::insert($orderDetails);
        }
        $notification = array(
            'message'=>'New Order Created',
            'alert-type'=>'success'
        );
        Cart::destroy();
        return redirect()->route('all.orders')->with($notification);
    }

    public function AllOrdersList()
    {
        $allOrderslist = Order::latest()->get();
        return view('order.all_order_list',compact('allOrderslist'));
    }

    public function OrderaStatusUpdate(Request $request,$id)
    {
        $status = $request->order_status;
        $order = Order::findOrFail($id)->update([
            'order_status'=> $status
        ]);
        $notification = array(
            'message'=>'Order Status Updated',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
