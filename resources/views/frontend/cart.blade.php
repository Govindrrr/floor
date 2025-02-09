<x-frontend-layout>

    <img src="" alt="">
    <div class="container">
        <div class="grid grid-cols-12 my-10">
            <div class="col-span-4">
                <img src="{{asset(Storage::url($special->image ))}}" alt="">
            </div>
            <div class="col-span-8">
                @foreach ($vendors as $vendor)
                <div class="border-2 bg-white">
                    <div class="grid grid-cols-12 px-4 my-3">
                        <div class="col-span-1 border-b-2 p-1 rounded"><img src="{{asset(Storage::url($vendor->shop->logo))}}" alt=""></div>
                        <div class="col-span-11 border-b-2">
                            <h1 class="text-lg font-semibold">{{$vendor->shop->name}}</h1>
                        </div>
                    </div>

                    <div class="px-4">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-pp text-white text-center">
                                    <th>SN</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Rate(Rs.)</th>
                                    <th>Amount(Rs.)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody class="">`
                               @php
                                   $total = 0;
                               @endphp 
                                @foreach ($carts as $cart)
                                @if ($vendor->id == $cart->product->vendor_id)
                                    
                                    <form action="{{route('cartUpdate',[$cart->id,$cart->price])}}" method="post">
                                        @csrf
                                        @php
                                        $total += $cart->amount;
                                    @endphp
                                      
                                        <tr class="text-center text-slate-600 border-b-2">
                                            <td>
                                               
                                                <button type="submit" name="action" value="delete"><i class="fa-solid fa-x"></i></button>
                                            </td>
                                            <td class="text-center"><img class="w-[100px] m-0 h-[80px] object-cover"
                                                    src="{{asset(Storage::url($cart->product->image))}}"
                                                    alt="xx"></td>
                                            <td>{{$cart->product->name}}</td>
                                            <td class="py-3"><input class="h-[30px] rounded-md w-[100px]" type="text" name="qty"
                                                    value="{{$cart->qty}}"></td>
                                            <td>{{$cart->product->price}}</td>
                                            <td>{{$cart->amount}}</td>
                                            <td class="text-xs"><button
                                                    type="submit" name="action" value="update"
                                                    class="text-white bg-slate-400 px-2 py-1 rounded-md">update</button></td>
                                        </tr>
                                    </form>
                               
                                @endif
                            @endforeach
                           
                       
               
                            </tbody>
                        </table>
                       
                        <div class="my-5">
                            <p class="p-3">
                                <b>Total:</b> Rs.{{$total}}
                            </p>
                            <button class="bg-pp px-4 py-2 text-white rounded">PROCEED TO CHECKOUT</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-frontend-layout>
