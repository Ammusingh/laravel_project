@extends('layouts.master')

 <link href="{{ asset('css/mar-pad.css') }}" rel="stylesheet" /> 
 <link href="{{ asset('css/fadish-custom-app.css') }}" rel="stylesheet" /> 
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
@section('content')
  <div class="d-flex justify-content-between mb-3">
    <nav class="page-breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{route('complaint.index')}}">Roles</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Complaint</li>
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
          <form method="post" action="{{route('complaint.store')}}" autocomplete="off">
              @csrf
              <div class="row">

              <div class="form-group col-md-6">
                <label for="name"> Email</label>
                <input type="email" placeholder="Enter User Email" value="" name="user_email" id="user_email" class="form-control" autocomplete="off">
              </div>
        
              <div class="form-group col-md-6">
                <label for="name">Complaint Text</label>
                <input type="textarea" placeholder="Enter complaint" value="" name="complaint_text" id="complaint_text" class="form-control" autocomplete="off">
              </div>

              <div class="form-group col-md-6">
                  <label for="">Select Departments</label>
                  <select class="selectpicker" multiple aria-label="Default select example" data-live-search="true" name="department_id">
                      @foreach($departments as $department)
                      <option value="{{$department->id}}">{{$department->name}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group col-md-12">
                   <input type="submit" name="submit" value="Save" class="btn btn-primary save">
                   <a href="{{route('complaint.index')}}" class="btn cancel-btn">Cancel</a>
              </div>

              </div>
          </form>
        </div>
      </div>  
    </div>  

    @endsection  

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>

@push('custom-scripts')

<script>
    $(document).ready(function(){
         $('.save').on('click',function(){
             var name = $("#name").val();
             var description = $("#description").val();
             var isTrue = false;
              if(description==""){
                 isTrue = true;
                 toastr.error('Please enter description','Description');
             }
             if(name==""){
                 isTrue = true;
                 toastr.error('Please enter role name','Name');
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





