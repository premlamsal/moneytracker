@extends('dashboard.layouts.app')
  @section('PageContent')
  <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Accounts</h6>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('editAccount')}}">
                <input type="hidden" name="id" value="{{$editAccount->id}}">
                  @csrf
               <div class="form-group">
                  <label for="exampleFormControlInput1">Bank Name</label>
                  <input type="text" class="form-control" id="accName" placeholder="Enter Bank Name" name="bank_name" value="{{$editAccount->bank_name}}">
                </div>
                 <div class="form-group">
                  <label for="exampleFormControlInput2">Account Name</label>
                  <input type="text" class="form-control" id="accName" placeholder="Enter Account Name" name="name" value="{{$editAccount->name}}">
                </div>
                 <div class="form-group">
                  <label for="exampleFormControlInput3">Account Number</label>
                  <input type="text" class="form-control" id="accName" placeholder="Enter Account No." name="number" value="{{$editAccount->number}}">
                </div>
                <div class="form-group">
                 <input type="submit" name="Submit" class="btn btn-primary">
               </div>
              </form>


            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->




@endsection

@section('PageScripts')

  <script type="text/javascript">
    

    
  </script>

@endsection