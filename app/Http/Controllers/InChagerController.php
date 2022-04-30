<?php

namespace App\Http\Controllers;
use Session;
use Redirect;
use App\Models\User;
use App\Models\Department;
use App\Models\Incharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Hash;

class InChagerController extends Controller
{
    
    public function index()
    {
        $incharges = \DB::table("users")
                    ->select("users.*",\DB::raw("GROUP_CONCAT(departments.name) as dept_name"))
                    ->leftjoin("departments",\DB::raw("FIND_IN_SET(departments.id,users.department_id)"),">",\DB::raw("'0'"))
                    ->where('role',2)
                    ->groupBy("users.id")
                    ->get();

        return view('incharge.index',compact('incharges'));
    }

    public function create(Request $request)
    {
        $departments = Department::all();
        return view('incharge.create',compact('departments'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'               => 'required|max:255',
            'email'              => 'required',
            'password'           => 'required',
            'department_id'      => 'required'
          ]);
        
        if($validator->passes())
        {
            $incharge = new User();

            $incharge->name          = $request->name;
            $incharge->role          = 2;
            $incharge->email         = $request->email;
            $incharge->password      = Hash::make($request->password);
            $incharge->department_id = implode(',',$request->department_id);
            $incharge->save();

            Session::flash('success','Incharge saved successfully');
            return redirect()->route('incharge.index');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function edit(Request $request,$incharge_id)
    {   
        $departments    = Department::all();
        $incharge       = User::where('id',$incharge_id)->first();
        $ids            = explode(',',$incharge->department_id);
        
        return view('incharge.edit',compact('incharge','departments','ids'));

    }

    public function update(Request $request,$incharge_id)
    {
        $validator = Validator::make($request->all(), [
            'name'               => 'required|max:255',
            'department_id'      => 'required'
          ]);
         
        if($validator->passes())
        {
            $incharge       = User::where('id',$incharge_id)->first();

            if($incharge != '')
            {
                $incharge->name         = $request->name;
                $incharge->role         = 2;
                // $incharge->email        = $request->email;
                $incharge->department_id = implode(',',$request->department_id);
                $incharge->save();

                Session::flash('error','Incharge updated successfully');
                return redirect()->route('incharge.index');
            }
            else
            {
                Session::flash('message','Incharge Not Found');
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function delete($incharge_id)
    {
        $incharge = User::where('id',$incharge_id)->delete();

        Session::flash('success','Incharge deleted successfully');
        return redirect()->route('incharge.index');
    }
}
