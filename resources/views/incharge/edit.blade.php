@extends('layouts.master')
<link href="{{ asset('css/mar-pad.css') }}" rel="stylesheet" />
<link href="{{ asset('css/fadish-custom-app.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
@section('content')
<div class="d-flex justify-content-between mb-3">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('incharge.index')}}">Incharges</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Incharge</li>
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
            <form method="post" action="{{route('incharge.update',$incharge->id)}}" autocomplete="off">

                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="hidden" name="inchargeID" value="{{$incharge->id}}">
                        <input type="text" placeholder="Enter name" value="{{$incharge->name}}" name="name" id="name" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">Email</label>
                        <input type="email" placeholder="Enter email" value="{{$incharge->email}}" name="email" id="email" class="form-control" autocomplete="off">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Assign Departments</label>
                        <select class="selectpicker" multiple aria-label="Default select example" data-live-search="true" name="department_id[]" required>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}" @if($incharge->department_id == $department->id)selected @endif>{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" name="submit" value="Save" class="btn btn-primary">
                         <a href="{{route('incharge.index')}}" class="btn cancel-btn">Cancel</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>

@endsection