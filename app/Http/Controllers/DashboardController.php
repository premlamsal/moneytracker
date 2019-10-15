<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transcation;

use App\Category;

use App\Account;

use DB;

class DashboardController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function messages()
    {
        return [
            'Category-Name' => 'A title is required',
            'Category-type'  => 'A message is required',
        ];
    }
    public function index()
    {
       $data=Transcation::select(DB::raw('SUM(amount) as total_amount'))
                 ->groupBy(DB::raw('YEAR(created_at) DESC, MONTH(created_at) DESC'))->get();

        // print_r($data);

        return view('dashboard.index');
    }
    //shows all the  transaction
    public function showTransactions()
    {
        $transactions=Transcation::all();
        return view('dashboard.showTransactions')->with('transactions',$transactions);
    }
    public function showCategories()
    {

        $Categories=Category::all();
        return view('dashboard.showCategory')->with('Categories',$Categories);
    }

    public function addCategory(Request $request)
    {
       $this->validate($request,[
        'catName'=>'required',
        'catType'=>'required',
        ],[
            'catName.required'=>'Category Name couldn\'t be Empty',
            'catType.required'=>'Category Type couldn\'t be Empty',
        ]);

        $Category=new Category;
        $Category->name=$request->catName;
        $Category->type=$request->catType;
        $Category->save();

        if($Category){
            return redirect('/dashboard/categories');
        }

    }
    public function deleteCategory($id){

        $deleteCategory=Category::find($id);
        $deleteCategory->delete();

        if($deleteCategory){
            return redirect('/dashboard/categories');
        }
    }

    public function showEditCategory($id)
    {
       $editCategory=Category::find($id);
       return view('dashboard.showEditCategory')->with('editCategory',$editCategory);
    }
    public function editCategory(Request $request){
          $this->validate($request,[
        'catName'=>'required',
        'catType'=>'required',
        ],[
            'catName.required'=>'Category Name couldn\'t be Empty',
            'catType.required'=>'Category Type couldn\'t be Empty',
        ]);
        $editCategory=Category::find($request->id);  
        $editCategory->name=$request->catName;
        $editCategory->type=$request->catType;
        $editCategory->save();

        if($editCategory){
          return redirect('/dashboard/categories');
        }

    }

       public function showAccounts()
    {

        $Accounts=Account::all();
        return view('dashboard.showAccounts')->with('Accounts',$Accounts);
    }

    public function addAccount(Request $request)
    {
       $this->validate($request,[
        'bank_name'=>'required',
        'name'=>'required',
        'number'=>'required',
        ],[
            'bank_name.required'=>'Bank Name couldn\'t be Empty',
            'name.required'=>'Account Name Type couldn\'t be Empty',
            'number.required'=>'Account Number couldn\'t be Empty',
        ]);

        $Account=new Account;
        $Account->bank_name=$request->bank_name;
        $Account->name=$request->name;
        $Account->number=$request->number;
        $Account->save();

        if($Account){
            return redirect('/dashboard/accounts');
        }

    }
    public function deleteAccount($id){

        $deleteAccount=Account::find($id);
        $deleteAccount->delete();

        if($deleteAccount){
            return redirect('/dashboard/accounts');
        }
    }

    public function showEditAccount($id)
    {
       $editAccount=Account::find($id);
       return view('dashboard.showEditAccount')->with('editAccount',$editAccount);
    }
    public function editAccount(Request $request){
       $this->validate($request,[
        'bank_name'=>'required',
        'name'=>'required',
        'number'=>'required',
        ],[
            'bank_name.required'=>'Bank Name couldn\'t be Empty',
            'name.required'=>'Account Name Type couldn\'t be Empty',
            'number.required'=>'Account Number couldn\'t be Empty',
        ]);

        $Account=Account::find($request->id);
        $Account->bank_name=$request->bank_name;
        $Account->name=$request->name;
        $Account->number=$request->number;
        $Account->save();

        if($Account){
            return redirect('/dashboard/accounts');
        }

    }

    public function showIncomes(){

        $incomes=Transcation::all();
        return view('dashboard.showIncome')->with('incomes',$incomes);
    }
    public function showAddIncome(){

        $categories=Category::where('type','0')->get();    
        $accounts=Account::all();
        return view('dashboard.showAddIncome')->with(['categories'=>$categories,'accounts'=>$accounts]);
    }
    public function addIncome(Request $request){

         $this->validate($request,[
        'title'=>'required',
        'category_id'=>'required',
        'account_id'=>'required',
        'description'=>'required',
        'amount'=>'required',
        'date'=>'required',
        ],[
            'title.required'=>'Category Name couldn\'t be Empty',
            'category_id.required'=>'Category couldn\'t be Empty',
            'account_id.required'=>'Account Type couldn\'t be Empty',
            'description.required'=>'Description couldn\'t be Empty',
            'amount.required'=>'Amount couldn\'t be Empty',
            'date.required'=>'Date couldn\'t be Empty',
        ]);

        $Transcation=new Transcation;
        $Transcation->title=$request->title;
        $Transcation->category_id=$request->category_id;
        $Transcation->account_id=$request->account_id;
        $Transcation->description=$request->description;
        $Transcation->amount=$request->amount;
        $Transcation->date=$request->date;
        $Transcation->save();

        if($Transcation){
            return redirect('/dashboard/incomes');
        }

    }
    public function showEditIncome($id)
    {
        $categories=Category::where('type','0')->get();    
        $accounts=Account::all();
        $editIncome=Transcation::find($id);

        return view('dashboard.showEditIncome')->with(['categories'=>$categories,'accounts'=>$accounts,'editIncome'=>$editIncome]);
    }
    public function updateIncome(Request $request)
    {
         $this->validate($request,[
        'title'=>'required',
        'category_id'=>'required',
        'account_id'=>'required',
        'description'=>'required',
        'amount'=>'required',
        'date'=>'required',
        ],[
            'title.required'=>'Category Name couldn\'t be Empty',
            'category_id.required'=>'Category couldn\'t be Empty',
            'account_id.required'=>'Account Type couldn\'t be Empty',
            'description.required'=>'Description couldn\'t be Empty',
            'amount.required'=>'Amount couldn\'t be Empty',
            'date.required'=>'Date couldn\'t be Empty',
        ]);

        $id=$request->getID;
        $Transcation=Transcation::find($id);
        $Transcation->title=$request->title;
        $Transcation->category_id=$request->category_id;
        $Transcation->account_id=$request->account_id;
        $Transcation->description=$request->description;
        $Transcation->amount=$request->amount;
        $Transcation->date=$request->date;
        $Transcation->save();

        if($Transcation){
            return redirect('/dashboard/incomes');
        }
    }
    public function deleteTransaction($id)
    {
        $deleteTransaction=Transcation::find($id);
        $deleteTransaction->delete();

        if($deleteTransaction){
         return redirect('/dashboard/transactions');
        }

    }

    public function showExpenses(){

        $expenses=Transcation::all();
        return view('dashboard.showExpenses')->with('expenses',$expenses);
    }
    public function showAddExpense(){

        $categories=Category::where('type','1')->get();    
        $accounts=Account::all();
        return view('dashboard.showAddExpense')->with(['categories'=>$categories,'accounts'=>$accounts]);
    }
    public function addExpense(Request $request){

         $this->validate($request,[
        'title'=>'required',
        'category_id'=>'required',
        'account_id'=>'required',
        'description'=>'required',
        'amount'=>'required',
        'date'=>'required',
        ],[
            'title.required'=>'Category Name couldn\'t be Empty',
            'category_id.required'=>'Category couldn\'t be Empty',
            'account_id.required'=>'Account Type couldn\'t be Empty',
            'description.required'=>'Description couldn\'t be Empty',
            'amount.required'=>'Amount couldn\'t be Empty',
            'date.required'=>'Date couldn\'t be Empty',
        ]);

        $Transcation=new Transcation;
        $Transcation->title=$request->title;
        $Transcation->category_id=$request->category_id;
        $Transcation->account_id=$request->account_id;
        $Transcation->description=$request->description;
        $Transcation->amount=$request->amount;
        $Transcation->date=$request->date;
        $Transcation->save();

        if($Transcation){
            return redirect('/dashboard/expenses');
        }

    }
    public function showEditExpense($id)
    {
        $categories=Category::where('type','1')->get();    
        $accounts=Account::all();
        $editExpense=Transcation::find($id);

        return view('dashboard.showEditExpense')->with(['categories'=>$categories,'accounts'=>$accounts,'editExpense'=>$editExpense]);
    }
    public function updateExpense(Request $request)
    {
         $this->validate($request,[
        'title'=>'required',
        'category_id'=>'required',
        'account_id'=>'required',
        'description'=>'required',
        'amount'=>'required',
        'date'=>'required',
        ],[
            'title.required'=>'Category Name couldn\'t be Empty',
            'category_id.required'=>'Category couldn\'t be Empty',
            'account_id.required'=>'Account Type couldn\'t be Empty',
            'description.required'=>'Description couldn\'t be Empty',
            'amount.required'=>'Amount couldn\'t be Empty',
            'date.required'=>'Date couldn\'t be Empty',
        ]);

        $id=$request->getID;
        $Transcation=Transcation::find($id);
        $Transcation->title=$request->title;
        $Transcation->category_id=$request->category_id;
        $Transcation->account_id=$request->account_id;
        $Transcation->description=$request->description;
        $Transcation->amount=$request->amount;
        $Transcation->date=$request->date;
        $Transcation->save();

        if($Transcation){
            return redirect('/dashboard/expenses');
        }
    }
    
}
