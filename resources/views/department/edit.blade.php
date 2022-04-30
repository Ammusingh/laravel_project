@extends('layouts.master')
<link href="{{ asset('css/mar-pad.css') }}" rel="stylesheet" />
<link href="{{ asset('css/fadish-custom-app.css') }}" rel="stylesheet" />
@section('content')
<div class="d-flex justify-content-between mb-3">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Department</li>
        </ol>
    </nav>
</div>

<div class="alert-massage">
    <!-- <h6 class="card-title">Orders Details</h6> -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        <i class="fa fa-info-circle"></i>{{Session::get('success')}}
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger">
        <i class="fa fa-info-circle"></i>{{Session::get('error')}}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li><i class="fa fa-info-circle"></i>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="row">
    
    <div class="col-md-12">
        <div class="card add-users">
            <form method="post" action="{{route('department.update',$department->id)}}" autocomplete="off">

                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Department Name</label>
                        <input type="hidden" name="DepartmentID" value="{{$department->id}}">
                        <input type="text" placeholder="Enter department name" value="{{$department->name}}" name="name" id="name" class="form-control" autocomplete="off required">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" name="submit" value="Save" class="btn btn-primary save">
                         <a href="{{route('department.index')}}" class="btn cancel-btn">Cancel</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('plugin-scripts') 

@endpush

@push('custom-scripts')

<script>
    $(document).ready(function(){
         $('.save').on('click',function(){
             var pass1 = $("#password").val();
             var  name = $("#name").val();
             var  email = $("#email").val();            
             var isTrue = false;

             if(pass1==""){
                 isTrue = true;
                 toastr.error('Please enter password','Password');
             }             
             if(email==""){
                isTrue = true;
                toastr.error('Please enter email','Email');   
             }
             if(name==""){
                 isTrue = true;
                 toastr.error('Please enter name','Name');
             }
             if(isTrue){
                $(".save").attr("type","button");
                return false;
             }else{
                  console.log('form-submit');
                  $(".save").attr("type","submit");
                  $(".save").click();
                  //$('form#chform').submit();
             }
         })
    })
</script>
  
@endpush