<?php

namespace App\Http\Controllers\Frotend;

use App\Http\Controllers\Controller;
use App\Mail\EmailNotification;
use App\Models\Company;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct()
    {
        $company = Company::first();
        View::share([
            'company'=>$company,
        ]);
    }
    public function home(){
        $vendors = Vendor::where('status','approved')->get();
        $products = Product::where('discount', '!=', null)->orWhere('discount', '>', 0)->get();
       return view('frontend.home',compact('vendors','products'));
    }
    public function shops(){
        return view('frontend.shop',['vendors' => Vendor::where('status','approved')->get()]);
    }
    public function products(){
        return view('frontend.product',['products' => Product::all()]);
    }
    public function vendor_request(Request $request){
        $request->validate([
            'name'=>'required',
            'shopname'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'description'=>'required',
        ]);
       $vendor = new Vendor();
       $vendor->name = $request->name;
       $vendor->password = "admin123";
       $vendor->email = $request->email;
       $vendor->save();

       $shop = new Shop();

       $shop->name = $request->shopname;
       $shop->phone = $request->phone;
       $shop->vendor_id = $vendor->id;
       $shop->save();

       $data =[
           "subject" => "new Vender request",
           "to" => "Govind Roka",
           "message" => "vendor requiest received from  $request->name with email $request->email with phone $request->phone shopName $request->shopname ",
       ];
       Mail::to('govindoo98097@gmail.com')->send(new EmailNotification($data));
       toast('Your request has been successfully submitted','success');
       return redirect()->back();
    }
    public function Compare(Request $request){
        $q = $request->q;
        $products = Product::where('name','like',"%$q%")->orderBy('price','asc')->get();
        // return $products;
        return view('frontend.compare',compact('products'));
    }
    public function vendor(Request $req, $id){
        $vendor = Vendor::findOrFail($id);
        $products = $vendor->products;
        $q  = $req->q;
        if($q){
            $products = Product::where('name','like',"%$q%")->orderBy('price','asc')->get();
        }
        return view('frontend.vendor',compact('vendor','products'));
    }
}
