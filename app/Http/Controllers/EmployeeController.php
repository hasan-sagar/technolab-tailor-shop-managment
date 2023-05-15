<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    //
    public function ViewEmployee()
    {
        $employees = Employee::latest()->get();
        return view('employee.view_employee', compact('employees'));
    }

    public function AddEmployee()
    {
        return view('employee.add_employee');
    }

    public function StoreEmployee(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:200',
            'gender' => 'required|max:200',
            'phone' => 'required|unique:employees|max:200',
            'address' => 'required|max:200',
        ]);

        Employee::insert([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'salary' => $request->salary,
            'experience' => $request->experience,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Employee Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('view.employee')
            ->with($notification);
    }

    public function EditEmployee(Request $request)
    {
        $employeeId = $request->id;
        $employee = Employee::findOrFail($employeeId);

        return view('employee.edit_employee', compact('employee'));
    }

    public function UpdateEmployee(Request $request)
    {
        $employeeId = $request->id;

        Employee::findOrFail($employeeId)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'salary' => $request->salary,
            'experience' => $request->experience,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('view.employee')
            ->with($notification);
    }

    public function DeleteEmployee($id)
    {
        Employee::findOrFail($id)->delete();
        $notification = [
            'message' => 'Employee Deleted',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }
}
