@extends('dashboard.layouts.app')
  @section('PageContent')
  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
 <!--          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Transcations</h6>
            </div>
            <div class="card-body">
          @if($transactions->count()>0)
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Account</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Type</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                 
                  <tbody>
               
                  @foreach($transactions as $transaction)
                    <tr>
                      <td>{{$transaction->title}}</td>
                      <td>{{$transaction->Category->name}}</td>
                      <td>{{$transaction->Account->name}}</td>
                      <td>{{$transaction->description}}</td>
                      <td>{{$transaction->date}}</td>
                      <td>
                        @if($transaction->Category->type==0)
                          Income
                        @else
                          Expense
                        @endif
                      </td>
                      <td>Rs. {{$transaction->amount}}</td>
                    </tr>
                    @endforeach
            
                  </tbody>
                </table>
              </div>
              @else
                <p>No Trascations Yet</p>
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
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
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
        <form method="post" action="{{route('addCategory')}}">
          @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Category Name</label>
          <input type="text" class="form-control" id="catName" placeholder="Enter Category Name" name="catName">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Select Type</label>
          <select class="form-control" id="catType" name="catType">
            <option value="0">Income</option>
            <option value="1">Expense</option>
          </select>
        </div>
        <!-- <div class="form-group">
          <label for="exampleFormControlTextarea1">Example textarea</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div> -->
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