<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Employee;
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
        return view('order.create_order_page', compact('service', 'customer','employee'));
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
        return $request;
    }

    public function CreateInvoice (Request $request)
    {
        $validateData = $request->validate([
            'customer_id' => 'required',
        ]);
        $customerId = $request->customer_id;
        $orderItems = Cart::content();
        $customer = Customer::where('id',$customerId)->first();

        // return view('invoice.product_invoice',compact('customer','orderItems'));
         return view('invoice.test_invoice',compact('customer','orderItems'));
    }

    public function AllCart()
    {
        return Cart::content();
    }
}
