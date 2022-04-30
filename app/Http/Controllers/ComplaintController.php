<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Complaint;
use App\Models\Department;
use App\Models\Incharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Hash;
use Session; 

class ComplaintController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 1)
        {
            $complaints = Complaint::with('department')->get();
        }
        elseif(auth()->user()->role == 2)
        {
            $user = User::where('id',auth()->user()->id)->first();
            $complaints = Complaint::with('department')->where('department_id',$user->department_id)->get();
        }else
        {
            $user       = User::where('id',auth()->user()->id)->first();
            $complaints = Complaint::with('department')->where('user_email',$user->email)->get();
        }

        return view('complaint.index',compact('complaints'));
    }

    public function create(Request $request)
    {     
        $departments = Department::whereHas('user', function($query) {
            $query->where('department_id','!=','');
        })->get();

        return view('complaint.create',compact('departments'));
        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_email'       => 'required|max:255',
            'complaint_text'   => 'required',
            'department_id'    => 'required'
          ]);
        
        if($validator->passes())
        {
            $complaint = new Complaint();

            $complaint->user_email      = $request->user_email;
            $complaint->complaint_text  = $request->complaint_text;
            $complaint->department_id   = $request->department_id;
            $complaint->save();

            Session::flash('success','Complaint saved successfully');
            return redirect()->route('complaint.index');
        }
        else
        {
            return redirect()->back();
        }
        
    }

    public function edit(Request $request,$complaint_id)
    {
        $complaint = Complaint::where('id',$complaint_id)->first();

        return view('complaint.edit',compact('complaint'));

    }

    //No Need but i can make it 
    public function update(Request $request,$complaint_id)
    {
        $validator = Validator::make($request->all(), [
            'user_email'       => 'required|max:255',
            'complaint_text'   => 'required',
            'department_id'    => 'required'
          ]);
        
        if($validator->passes())
        {
            $complaint = Complaint::find('id',$complaint_id)->first();

            if($complaint != '')
            {
                $complaint->user_email      = $request->user_email;
                $complaint->complaint_text  = $request->complaint_text;
                $complaint->department_id   = $request->department_id;
                $complaint->save();

                Session::flash('success','Complaint updates successfully');
                return redirect()->route('complaint.index');
            }
            else
            {
                Session::flash('message','complaint ID is not Found');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    //No Need but i can make it
    public function delete($complaint_id)
    {
        $complaint = Complaint::where('id',$complaint_id)->delete();

        return redirect()->route('complaint.index');
    }
}
