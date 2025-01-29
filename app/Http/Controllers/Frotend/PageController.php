<?php

namespace App\Http\Controllers\Frotend;

use App\Http\Controllers\Controller;
use App\Mail\EmailNotification;
use App\Models\Company;
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
       return view('frontend.home');
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
           "message" => "vendor requiest received from  $request->name with email $request->email with phone $request->phone shopName $request->shopname ",
       ];
    //    Mail::to('govindoo98097@gmail.com')->send(new EmailNotification($data));
       toast('Your request has been successfully submitted','success');
    //    return "successfull";

       return redirect()->back();
    }
}
