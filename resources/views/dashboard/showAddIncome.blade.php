@extends('dashboard.layouts.app')
  @section('PageContent')
  <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add Income</h6>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('addIncome')}}">
          @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Enter Income Title" name="title">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Select Category</label>
          <select class="form-control" id="category_id" name="category_id">
            @if($categories->count()>0)
            @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
             @endforeach
                    @endif
          </select>
        </div>
         <div class="form-group">
          <label for="exampleFormControlSelect1">Select Account</label>
          <select class="form-control" id="account_id" name="account_id">
            @if($accounts->count()>0)
            @foreach($accounts as $account)
              <option value="{{$account->id}}">{{$account->name}}</option>
             @endforeach
                    @endif
          </select>
        </div>
         <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
         <div class="form-group">
          <label for="amount">Amount</label>
          <input type="number" name="amount" class="form-control" placeholder="Amount">
        </div>
        <div class="form-group">
          <label for="date">date</label>
          <input type="date" name="date" class="form-control">
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