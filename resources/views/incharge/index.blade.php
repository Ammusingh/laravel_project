@extends('layouts.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush
 <link href="{{ asset('css/mar-pad.css') }}" rel="stylesheet" /> 
 <link href="{{ asset('css/fadish-custom-app.css') }}" rel="stylesheet" /> 
@section('content')

<div class="d-flex justify-content-between mb-3">
   
    <h3 class="heading">Incharges</h3>
    <div class="svbbbtns"> 
         <a href="{{route('incharge.create')}}" class="btn btn-primary">Add Incharges</a>
    </div>
</div> 
<div class="row">
   
  <div class="col-md-12 grid-margin stretch-card user-page role-page">
    <div class="card">
      <div class="card-body">
      
          <table id="dt-basic-checkbox" class="table table-hover">
            <thead>
              <tr>
                <th><span>Name</span></th>
                <th><span>Email</span></th>
                <th><span>Assign Department</span></th>
                <th><span>Action</span></th>
              </tr>
            </thead>
            <tbody>

            	@foreach($incharges as $charge)
                <tr>
                  <td><strong>{{@$charge->name}}</strong></td>
                  <td>{{@$charge->email}}</td>
                  <td>{{@$charge->dept_name}}</td>
                  <td>
                    <a href="{{route('incharge.edit',@$charge->id)}}"  class="trash-icon" title="Edit"><i class="fas fa-pen"></i></a>
                    <button type="button" link="{{route('incharge.delete',@$charge->id)}}" data-toggle="modal" data-target="#myModal" class="trash-icon open-popup" title="Delete"><i class="far fa-trash-alt"></i></button>
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
          <h4 class="modal-title">Delete Incharge ?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Do you want to delete this Incharge ?</p>
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
      $('#dt-basic-checkbox').dataTable({"order": [[ 0, "asc" ]]});
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

    setTimeout(function(){
     $(".custom-message").hide();
    }, 3000); //Time before execution

  </script>
@endpush