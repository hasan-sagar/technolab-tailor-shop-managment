<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

class CustomerController extends Controller
{
    //
    public function ViewCustomer()
    {
        $customers = Customer::latest()->get();
        return view('customer.view_customer',compact('customers'));
    }

    public function AddCustomer()
    {
        return view('customer.add_customer');
    }

    public function StoreCustomer(Request $request)
    {
        $validateData = $request->validate([
            'name'=>'required|max:200',
            'gender'=>'required|max:200',
            'phone'=>'required|unique:customers|max:200',
        ]);

        Customer::insert([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'chest'=>$request->chest,
            'waist'=>$request->waist,
            'hips'=>$request->hips,
            'rise'=>$request->rise,
            'neck_to_waist'=>$request->neck_to_waist,
            'waist_to_floor'=>$request->waist_to_floor,
            'outseam'=>$request->outseam,
            'inseam'=>$request->inseam,
            'bust'=>$request->bust,
            'crotch'=>$request->crotch,
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message'=> 'Customer Added Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('view.customer')->with($notification);
    }

    public function EditCustomer (Request $request)
    {
        $customerId = $request->id;
        $customer = Customer::findOrFail($customerId);

        return view('customer.edit_customer',compact('customer'));
    }

    public function UpdateCustomer (Request $request)
    {
        $customerId = $request->id;

        Customer::findOrFail($customerId)->update([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'chest'=>$request->chest,
            'waist'=>$request->waist,
            'hips'=>$request->hips,
            'rise'=>$request->rise,
            'neck_to_waist'=>$request->neck_to_waist,
            'waist_to_floor'=>$request->waist_to_floor,
            'outseam'=>$request->outseam,
            'inseam'=>$request->inseam,
            'bust'=>$request->bust,
            'crotch'=>$request->crotch,
            'updated_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message'=>'Customer Updated Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('view.customer')->with($notification);
    }

    public function DeleteCustomer($id)
    {
        Customer::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Customer Deleted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ViewCustomerMeasurments()
    {
        $customers = Customer::latest()->get();
        return view('customer.view_customer_measurment',compact('customers'));
    }
}
