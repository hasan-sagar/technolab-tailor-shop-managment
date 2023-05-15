<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
    //

    public function ViewService()
    {
        $service = Service::latest()->get();
        return view('service.view_service', compact('service'));
    }

    public function AddService()
    {
        $category = Category::latest()->get();
        return view('service.add_service', compact('category'));
    }

    public function StoreService(Request $request)
    {
        $request->validate([
            'service_name' => 'required|max:200',
        ]);

        Service::insert([
            'service_name' => $request->service_name,
            'service_code' => $request->service_code,
            'category_id' => $request->category_id,
            'selling_price' => $request->selling_price,
        ]);

        $notification = array(
            'message'=> 'Service Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('view.service')->with($notification);
    }

    public function EditService($id)
    {
        $category = Category::latest()->get();
        $service = Service::findOrFail($id);
        return view('service.edit_service',compact('service','category'));
    }

    public function UpdateService(Request $request)
    {
        $request->validate([
            'service_name' => 'required|max:200',
        ]);

        $serviceId = $request->id;
        Service::findOrFail($serviceId)->update([
            'service_name' => $request->service_name,
            'service_code' => $request->service_code,
            'category_id' => $request->category_id,
            'selling_price' => $request->selling_price,
        ]);

        $notification = array(
            'message'=> 'Service Updated',
            'alert-type'=>'success'
        );
        return redirect()->route('view.service')->with($notification);
    }

    public function DeleteService($id)
    {
        Service::findOrFail($id)->delete();

        $notification = array(
            'message'=> 'Service Deleted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
