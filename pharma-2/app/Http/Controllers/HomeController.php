<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\supplier;
use App\Models\stock;
use App\Models\sold;
use App\Models\expire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function stud()
    {
          $students = stock::all();
          return view('ps')->with('students', $students);;
    }
    public function prnpriview()
    {
          $students = stock::all();
          return view('stu')->with('students', $students);;
    }

    // print
public function printP(){
    $solds = sold::where(['user_id'=>Auth::id(),'clean'=>0])->get();
    return view('printP',['solds'=>$solds]);
   
}



//   sell
    public function index()
    {   $solds = sold::where(['user_id'=>Auth::id(),'clean'=>0])->get();
        return view('home',['solds'=>$solds]);
    }
    public function addsel(Request $request){
        if(empty($request->barcode)){
            exit("your code  is Empty");
        }
        $stock = stock::with('expire')->where('barcode',$request->barcode)->first();
     
        if($stock){
           
           if($stock->count != 0){
                
            if($stock->expire->expire_date > carbon::today()){
                //  return  dd($stock);
                 $stock->count = $stock->count - 1;
                 $stock->save();
                 $date = Carbon::now ();
                 $find_sold = sold::where(['user_id'=>Auth::id(), "stock_id"=>$stock->id , "clean" => 0])->first();
                 if($find_sold == null){
                     $sold = sold::create([
                           'user_id'=> Auth::id(),
                           'stock_id'=>$stock->id,
                           'clean'=>0,
                           'price_at'=> $stock->selling,
                           'selling_at'=> $stock->price,
                           'piece'=> 1,
                         
                 ]);
                 return $sold ? "success" : "you have some erorr";
                 }else{
                     $find_sold->piece = $find_sold->piece + 1 ;
                     $find_sold->save();
                     return "success";
                 }
               
            } else{
                exit("the product is Expier !");
            }
           }else{
               exit("The Product is not longer available !");
           }
        }else{
            exit("the product NOt Found");
        }

    }
    public function viewtb(){
     
        $solds = sold::where(['user_id'=> Auth::id(), 'clean'=>0])->orderBy('updated_at','DESC')->get();
        return view('layouts.tabale', compact('solds'));
    }

    public function undo (Request $request){
        $find_sold = sold::where(['user_id'=> Auth::id(), 'clean'=>0])->find($request->sold_id);
        if($find_sold){
            $find_stock = stock::find($find_sold->stock_id);
            if($find_stock){
                // Count +1
                $find_stock->count = $find_stock->count+ 1;
                $find_stock->save();
               
                if($find_sold->piece == 1){
                    $find_sold->delete();
                }else{
                  // piece - 1
                $find_sold->piece = $find_sold->piece - 1;
                $find_sold->save();
                }
                return "success";

            }else{
                exit("fail");
            }

        }else{
            exit("fail");
        }

    }


    public function addCuont (Request $request){
        $find_sold = sold::where(['user_id'=> Auth::id(), 'clean'=>0])->find($request->sold_id);
        if($find_sold){
            $find_stock = stock::find($find_sold->stock_id);
            if($find_stock){
               
                if($find_stock->count == 0){
                   exit("the product is over");
                }else{
                     // Count +1
                $find_stock->count = $find_stock->count - 1;
                $find_stock->save();
                  // piece - 1
                $find_sold->piece = $find_sold->piece + 1;
                $find_sold->save();
                
                }
                return "success";

            }else{
                exit("fail");
            }

        }else{
            exit("fail");
        }

    }


    public function invoice(){
        $solds = sold::where(['user_id'=>Auth::id(),'clean'=>0])->get();
        return view('layouts.invoice',['solds'=>$solds]);
    }
    public function print_item(){
        $solds = sold::where(['user_id'=>Auth::id(),'clean'=>0])->get();
        return view('layouts.table_print',['solds'=>$solds]);
    }

    public function clean(){
        $sold = sold::where('user_id', Auth::id())->update(['clean'=> 1]);
        return \redirect('home');
    }




    // casher
    public function inCasher(){
$user = User::all();
        return view('Casher',['user'=>$user]);
    }
    public function addcasher(Request $request){

        $validator =\Validator::make($request->all(), [
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            
        ]);
        if($validator->fails())
        {
                 return \redirect('Casher')->withErrors($validator); 
        }else{

        $addCasher = new User;

        $addCasher->name = $request->input('name');
        $addCasher->email = $request->input('email');
        $addCasher->password = Hash::make($request->password);
        $addCasher->rule = $request->input('rule');

        $addCasher->save();
        return \redirect('/Casher')->with('success','The casher is successfully');
        }
    }
    public function supplier(){
        $supplier = supplier::paginate(3);
        return view('Supplier',['supplier'=>$supplier]);
    }
    public function addSupplier(Request $request, $status ,$id){

        if($status == 0){
            // create
  $validator =\Validator::make($request->all(), [
            'name'=> 'required',
            'email'=> 'required',
            'address'=> 'required',
            'phone'=> 'required',
            
        ]);
        if($validator->fails())
        {
                 return \redirect('Supplier')->withErrors($validator); 
        }else{

            $supplier = supplier::create([
                'company_name'=> $request->name,
                'email'=> $request->email,
                'address'=> $request->address,
                'phone_number'=> $request->phone,
            ]);
    

    }
        }elseif($status == 1 && !empty($status) &&!empty($id)){
            // delete
            $supplier = supplier::findOrfail($id);
            $supplier->delete();

        }else{
            // edit
            $validator =\Validator::make($request->all(), [
                'name'=> 'required',
                'email'=> 'required',
                'address'=> 'required',
                'phone'=> 'required',
                
            ]);
            if($validator->fails())
            {
                     return \redirect('Supplier')->withErrors($validator); 
            }else{
    
                $supplier = supplier::where('id',$id)->update([
                    'company_name'=> $request->name,
                    'email'=> $request->email,
                    'address'=> $request->address,
                    'phone_number'=> $request->phone,
                ]);
                 }

        }
        return $supplier ? \redirect('/Supplier')->with('success',' successfully') :  \redirect('/Supplier')->with('success','you have some erorrs');
    }

    // buy
    public function buy(){
       

        $stock = stock::with('one_supplier')->with('expire')->orderBy('id','DESC')->paginate(3);
        $supplier = supplier::all();
        
        return view('Buy',['buy'=>$stock , 'supplier'=> $supplier]);
    }
    public function addbuy(Request $request, $status ,$id){
   
        $required =  [
            'barcode'=> 'required',
             'name'=> 'required',
            'supplier_id'=> 'required',
            'count'=> 'required',
            'price'=> 'required',
            'selling'=> 'required',
            'expire_date'=> 'required',
            'is_debt'=> 'required', 
            'type'=> 'required',
        ];
        $fild =[
            'barcode'=> $request->barcode,
            'name'=> $request->name,
            'supplier_id'=> $request->supplier_id,
            'count'=> $request->count,
            'price'=> $request->price,
            'selling'=> $request->selling,
            'is_debt'=> $request->is_debt,
            'type'=> $request->type,
        ];
        if($status == 0){
            // create
  $validator =\Validator::make($request->all(),$required );
        if($validator->fails())
        {
                 return \redirect('Buy')->withErrors($validator); 
        }else{

            $stock = stock::create($fild);
            $exoier = expire::create(['barcode'=> $request->barcode, 'expire_date'=> $request->expire_date,]);

    }
        }elseif($status == 1 && !empty($status) &&!empty($id)){
            // delete
            $stock = stock::findOrfail($id)->delete();
        }else{
            // edit
            $validator =\Validator::make($request->all(),$required);
            if($validator->fails())
            {
                     return \redirect('Buy')->withErrors($validator); 
            }else{
    
                $stock = stock::where('id',$id)->update($fild);
                }
        }
        return $stock ? \redirect('/Buy')->with('success',' successfully') :  \redirect('/Buy')->with('success','you have some erorrs');
    }

    // not lift
    public function notleft(){
        
        $stock = stock::where('count','<' ,'2')->with('one_supplier')->orderBy('id','DESC')->paginate(3);
        $supplier = supplier::all();
       
        return view('notleft',['buy'=>$stock ,'supplier'=>$supplier ]);
    }
    // debt list
    public function debtlist(){
        
        $stock = stock::where('is_debt','1')->with('one_supplier')->orderBy('id','DESC')->paginate(10);
        $supplier = supplier::all();
       
        return view('debtlist',['buy'=>$stock ,'supplier'=>$supplier]);
    }
    // expier date
    public function expire(){

        
        $stock = stock::with('one_supplier')->orderBy('id','DESC')->paginate(10);
        $supplier = supplier::all();
        $expire = expire::where('expire_date','<=', carbon::today())->get();
        return view('expire',['buy'=>$stock ,'supplier'=>$supplier,'expire'=>$expire]);
    }
    // sellers
    public function sellers(){
        $date = Carbon::now ();
        $list = [
            'All Piece' => sold::where('clean' , '1')->sum('piece'),
            'All Price' => sold::where('clean' , '1')->sum('price_at'),
            'All Piece and Price' =>sold::where('clean' , '1')->sum('piece') * sold::where('clean' , '1')->sum('price_at') ,
            'All Price Today' => sold::where(['clean' => '1' , 'created_at'=> $date->toDateString()])->sum('price_at'),
            'All Piece Today' => sold::where(['clean' => '1' , 'created_at'=> $date->toDateString()])->sum('piece'),
            'All Piece and Price Today' =>sold::where(['clean' => '1' , 'created_at'=> $date->toDateString()])->sum('price_at') * sold::where(['clean' => '1' , 'created_at'=> $date->toDateString()])->sum('piece') ,
        ];
        $list2 = [
            'All Profit '=> (sold::where('clean' , '1')->sum('piece') * sold::where('clean' , '1')->sum('price_at')) - (sold::where('clean' , '1')->sum('piece') * sold::where('clean' , '1')->sum('selling_at')),
            'All Profit Today'=> (sold::where(['clean' => '1' , 'created_at'=> $date->toDateString()])->sum('price_at') * sold::where(['clean' => '1' , 'created_at'=> $date->toDateString()])->sum('piece')) - (sold::where(['clean' => '1' , 'created_at'=> $date->toDateString()])->sum('selling_at') * sold::where(['clean' => '1' , 'created_at'=> $date->toDateString()])->sum('piece'))
        ];
     
        
        $sold = sold::where('clean','1')->orderBy('id' , 'DESC')->get();
        return view('sellers',['solds'=>$sold , 'lists'=> $list , 'list2'=>$list2]);
    }

    public function profit( Request $request)
    {
        $solds = sold::selectRaw("COUNT(*) views, DATE_FORMAT(created_at, '%Y-%m-%e') date")
        ->groupBy('date')
        ->get();
       return view('profit',['solid'=>$solds]);
    }
    public function search(Request $request)
    {
        // return dd('brwa');
        $from = $request->start_time;
        $end = date($request->end_time);
       
        $solds = sold::selectRaw("COUNT(*) views, DATE_FORMAT(created_at, '%Y-%m-%e') date")
        ->groupBy('date')->whereBetween('created_at', [$from, $end])->get();
        // return dd($solds);
        return view('profit',['solid'=>$solds]);
       
    }
}
