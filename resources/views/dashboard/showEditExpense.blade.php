@extends('dashboard.layouts.app')
  @section('PageContent')
  <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add Income</h6>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('updateExpense')}}">
          @csrf
          <input type="hidden" name="getID" value="{{$editExpense->id}}">
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Enter Expense Title" name="title" value="{{$editExpense->title}}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Select Category</label>
          <select class="form-control" id="category_id" name="category_id">
             @if($categories->count()>0)
            @foreach($categories as $category)
                    @if($category->id==$editExpense->category_id)
                        <option value="{{$category->id}}" selected="">{{$category->name}}</option>
                    @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
             @endforeach
                    @endif
          </select>
        </div>
         <div class="form-group">
          <label for="exampleFormControlSelect1">Select Account</label>
          <select class="form-control" id="account_id" name="account_id">
            @if($accounts->count()>0)
            @foreach($accounts as $account)
                  @if($account->id==$editExpense->account_id)
                     <option value="{{$account->id}}" selected="">{{$account->name}}</option>
                  @else
                     <option value="{{$account->id}}">{{$account->name}}</option>
                  @endif
             @endforeach
                    @endif
          </select>
        </div>
         <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" rows="3" name="description">{{$editExpense->description}}</textarea>
        </div>
         <div class="form-group">
          <label for="amount">Amount</label>
          <input type="number" name="amount" class="form-control" placeholder="Amount" value="{{$editExpense->amount}}">
        </div>
        <div class="form-group">
          <label for="date">date</label>
          <input type="date" name="date" class="form-control" value="{{$editExpense->date}}">
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