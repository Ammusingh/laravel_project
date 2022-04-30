@extends('layouts.master')
<link href="{{ asset('css/mar-pad.css') }}" rel="stylesheet" />
<link href="{{ asset('css/fadish-custom-app.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
@section('content')
<div class="d-flex justify-content-between mb-3">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('role.list')}}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
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
            <form method="post" action="{{url('role/update')}}" autocomplete="off">

                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="hidden" name="RoleID" value="{{$role->id}}">
                        <input type="text" placeholder="Enter role_name" value="{{$role->role_name}}" name="role_name" id="role_name" class="form-control" autocomplete="off" required>
                    </div>

                    <!-- <div class="form-group col-md-6">
                        <label for="">Assign User</label>
                        <select class="selectpicker" multiple aria-label="Default select example" data-live-search="true" name="user_id[]">
                            @foreach($users as $user)
                            <option value="{{$user->id}}" @if($role->user_id == $user->id)selected @endif>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div> -->

                    <div class="form-group col-md-6">
                        <label for="name">Description</label>
                        <input type="text" placeholder="Enter description" value="{{$role->description}}" name="description" id="role_name" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" name="submit" value="Save" class="btn btn-primary">
                         <a href="{{url('role/list')}}" class="btn cancel-btn">Cancel</a>
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