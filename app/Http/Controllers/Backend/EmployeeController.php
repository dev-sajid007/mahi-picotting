<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::latest('id')->get();
        return view('backend.employees.index',compact('employees'));
    }
    public function create(){

        return view('backend.employees.create');
    }
    public function store(Request $request){
        $data = $request->all();
        $this->validate($request,[
           'name' => 'required|unique:employees'
        ]);

        Employee::create($data);
        //notification
        $notification = array(
            'message' =>'Employee Create Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->route('app.employees.index')->with($notification);
    }
    public function edit($id){
        $employee = Employee::find($id);
        return view('backend.employees.create',compact('employee'));
    }
    public function update(Request $request,$id){
        $data = $request->all();
        $this->validate($request,[
            'name' => 'required|unique:employees,name,'.$id
        ]);
        Employee::find($id)->update($data);
        //notification
        $notification = array(
            'message' =>'Employee Updated Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->route('app.employees.index')->with($notification);
    }
    public function delete($id){
        Employee::find($id)->delete();
        //notification
        $notification = array(
            'message' =>'Employee Deleted Successfully ',
            'alert-type' =>'success'
        );
        return back()->with($notification);
    }
}
