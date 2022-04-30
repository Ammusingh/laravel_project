<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::get();
        return view('department.index',compact('departments'));
    }

    public function create(Request $request)
    {
        return view('department.add');  
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|max:255',
          ]);
        
        if($validator->passes())
        {
            $department = new Department();

            $department->name = $request->name;
            $department->save();

            Session::flash('success','Department saved successfully');
            return redirect()->route('department.index');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function edit(Request $request,$department_id)
    {
        $department = Department::where('id',$department_id)->first();

        return view('department.edit',compact('department'));

    }

    public function update(Request $request,$department_id)
    {
        $validator = Validator::make($request->all(), [
            'name'             => 'required|max:255',
          ]);
        
        if($validator->passes())
        {
            $department = Department::find($department_id)->first();

            if($department != '')
            {
                $department->name = $request->name;
                $department->save();

                Session::flash('success','Department updated successfully');
                return redirect()->route('department.index');
            }
            else
            {
                Session::flash('error','Department not Found');
                return redirect()->route('department.index');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function delete($department_id)
    {
        $department = Department::where('id',$department_id)->delete();

        Session::flash('success','Department deleted successfully');
        return redirect()->route('department.index');
    }

    // public function profile(Request $request)
    // {
    //     return 
    // }
}
