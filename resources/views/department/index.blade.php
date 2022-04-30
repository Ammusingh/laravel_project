@extends('layouts.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush
 <link href="{{ asset('css/mar-pad.css') }}" rel="stylesheet" /> 
 <link href="{{ asset('css/fadish-custom-app.css') }}" rel="stylesheet" /> 
@section('content') 
<div class="d-flex justify-content-between mb-3">
    <h3 class="heading">Departments</h3>
   
    <div class="svbbbtns"> 
      <a href="{{route('department.create')}}" class="btn btn-primary">Add Department</a>
    </div>

</div> 
<div class="row">
  <div class="col-md-12">
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
  </div>
  <div class="col-md-12 grid-margin stretch-card user-page">
    <div class="card">
      <div class="card-body">
        <!-- <h6 class="card-title">Users</h6>  -->
          <table id="dt-basic-checkbox" class="table table-hover">
            <thead>
              <tr>
                <th style="display: none;"><span>#</span></th>
                <th><span>Department Name</span></th>
              </tr>
            </thead>
            <tbody>
            	@foreach($departments as $department)
            	<tr>
                <td style="display: none;"></td>
            		<td>{{$department->name}}</td>
            		<td>
						      <a href="{{route('department.edit',$department->id)}}"  class="trash-icon" title="Edit"><i class="fas fa-pen"></i></a>
              	  <button type="button" link="{{route('department.delete',$department->id)}}"  data-toggle="modal" data-target="#myModal" class="trash-icon open-popup" title="Delete"><i class="far fa-trash-alt"></i></button>
            		</td>
            	</tr>
            	@endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal custom-popup fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Department ?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Do you want to delete this Department ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary delete-btn" id="ok">Delete</button>
        </div>
      </div>
      
    </div>
  </div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
  
    <script type="text/javascript">
      $('#dt-basic-checkbox').dataTable({"order": [[ 0, "desc" ]]});
      $('#tablemenu1').dataTable({"order": [[ 0, "desc" ]]});
      $('#tablemenu2').dataTable({"order": [[ 0, "desc" ]]});
      $('#tablemenu3').dataTable({"order": [[ 0, "desc" ]]});
      $('#tablemenu4').dataTable({"order": [[ 0, "desc" ]]});
      $('#tablemenu5').dataTable({"order": [[ 0, "desc" ]]});
  </script>

  <script>
    $(document).ready(function(){
      $('.open-popup').on('click',function(){
          var link = $(this).attr('link');
          $('#ok').on('click',function(){
             location.href = link;
          })
      });
    })
  </script>
@endpush