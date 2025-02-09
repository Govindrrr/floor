<?php

namespace App\Http\Controllers\Frotend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Special;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class UserController extends PageController
{
    public function google_login(){
        return Socialite::driver('google')->redirect();
    }
    public function google_callback(){
        $user = Socialite::driver('google')->user();

        if($user){
            $find_user = User::where('google_id', $user->id)->first();
            if($find_user){
                Auth::login($find_user);
                return redirect('/');
            }
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            $new_user->google_id = $user->id;
            $new_user->password = Hash::make(rand(1000, 9999));
            $new_user->save();
            Auth::login($new_user);
            return redirect('/');
        }
        else{
            return redirect('/');
        }
    }
    public function addtoCart(Request $req){
        $user_id = Auth::user()->id;
        $product = Product::findOrFail($req->product_id);
        $A = $product->discount > 0 ? $product->price-($product->price * $product->discount / 100) : $product->price;
        $amount = $A * $req->qty;
        $validate = $req->validate([
            'product_id'=>'required',
            'qty'=>'required|min:1'
                ]);
       
        $cart = new Cart();
        $cart->product_id = $product->id;
        $cart->user_id = $user_id;
        $cart->vendor_id = $product->vendor_id;

        $cart->amount = $amount;
        $cart->qty = $req->qty;
        $cart->save();
        toast('Product Added to Cart','success');
        return redirect()->back();
        
    }
    public function cart(){
        $user_id = Auth::user()->id;
        $special = Special::first();
        $vendors = [];
        $carts = Auth::user()->carts;
        foreach($carts as $cart){
          $product = $cart->product;
          if(!in_array($product->vendor, $vendors)){
            $vendors[] = $product->vendor;
          }
        }
        return view('frontend.cart',compact('carts','vendors','special'));
    }
    public function cartForm(Request $req, $id){
          if($req->action == "update"){
            $cart = DB::table('carts')->where('id', $id)->first();
            $product = Product::where('id',$cart->product_id)->first();
            DB::table('carts')
            ->where('id', $id)
            ->update(['qty' => $req->qty, 'amount'=> $req->qty *$product->price ]);
            toast('Quantity Updated','success');
            return redirect()->back();
          }
          elseif($req->action == "delete"){
            DB::table('carts')->where('id', $id)->delete();
            toast('Item Deleted !', 'warning');
            return redirect()->back();
          }
          else
          return redirect()->back();

    }
    public function profile(){
        return view('profile.profile');
    }
}
