@extends('dashboard.layouts.app')
  @section('PageContent')
  <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('editCategory')}}">
                <input type="hidden" name="id" value="{{$editCategory->id}}">
                  @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Category Name</label>
                  <input type="text" class="form-control" id="catName" placeholder="Enter Category Name" name="catName" value="{{$editCategory->name}}">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Select Type</label>
                  <select class="form-control" id="catType" name="catType">
                    @if($editCategory->type==0)
                    <option value="0" selected="">Income</option>
                    <option value="1">Expense</option>
                    @else
                    <option value="0">Income</option>
                    <option value="1" selected="">Expense</option>
                    @endif
                  </select>
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