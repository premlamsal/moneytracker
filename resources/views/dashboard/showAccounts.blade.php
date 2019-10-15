@extends('dashboard.layouts.app')
  @section('PageContent')
  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
 <!--          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <a href="#" class="btn btn-primary" style="margin-bottom: 10px" data-toggle="modal" data-target="#addModal">Add Account</a>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Accounts</h6>
            </div>
            <div class="card-body">
 

          @if($Accounts->count()>0)
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Account Name</th>
                      <th>Bank Name</th>
                      <th>Number Name</th>
                      <th>Actions</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Account Name</th>
                      <th>Bank Name</th>
                      <th>Number Name</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
               
                  @foreach($Accounts as $Account)
                    <tr>
                      <td>{{$Account->name}}</td>
                      <td>{{$Account->bank_name}}</td>
                      <td>{{$Account->number}}</td>
                      <td>
	                      	<a href="/dashboard/editAccount/{{$Account->id}}" class="btn btn-success btn-circle btn-sm">
	                      		<i class="fas fa-edit"></i>
	                      	</a>
	                      	<a href="/dashboard/deleteAccount/{{$Account->id}}" class="btn btn-danger btn-circle btn-sm">
	                      		<i class="fas fa-trash"></i>
	                      	</a>
                      </td>
                    </tr>
                    @endforeach
            
                  </tbody>
                </table>
              </div>
              @else
                <p>No Accounts. Add One</p>
              @endif
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


  <!-- Logout Modal-->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Account</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        		@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
	      <form method="post" action="{{route('addAccount')}}">
	      	@csrf
			 
         <div class="form-group">
          <label for="exampleFormControlInput1">Bank Name</label>
          <input type="text" class="form-control" id="accName" placeholder="Enter Bank Name" name="bank_name">
        </div>
         <div class="form-group">
          <label for="exampleFormControlInput2">Account Name</label>
          <input type="text" class="form-control" id="accName" placeholder="Enter Account Name" name="name">
        </div>
         <div class="form-group">
          <label for="exampleFormControlInput3">Account Number</label>
          <input type="text" class="form-control" id="accName" placeholder="Enter Account No." name="number">
        </div>
			  
			  
    	</div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-primary">
         
        </div>
      </div>
      </form>
    </div>
  </div>


@endsection

@section('PageScripts')

  <script type="text/javascript">
    


  </script>

@endsection