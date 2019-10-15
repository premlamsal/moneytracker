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
              <h6 class="m-0 font-weight-bold text-primary">Incomes Transcations</h6>
            </div>
            <div class="card-body">
          @if($incomes->count()>0)
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Account</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                 
                  <tbody>
               
                  @foreach($incomes as $income)
                    @if($income->Category->type==0)
                    <tr>
                      <td>{{$income->title}}</td>
                      <td>{{$income->Category->name}}</td>
                      <td>{{$income->Account->name}}</td>
                      <td>{{$income->description}}</td>
                      <td>{{$income->date}}</td>
                      <td>Rs. {{$income->amount}}</td>
                      <td>
                          <a href="/dashboard/income/edit/{{$income->id}}" class="btn btn-success btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="/dashboard/deleteTransaction/{{$income->id}}" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                          </a>
                      </td>
                    </tr>
                    @endif
                    
                    @endforeach
            
                  </tbody>
                </table>
              </div>
              @else
                <p>No Income Trascations Yet</p>
              @endif
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      @endsection