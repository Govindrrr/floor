@props(['product'])
<div data-modal-target="product_modal{{$product->id}}" data-modal-toggle="product_modal{{$product->id}}" class="md:col-span-3 col-span-1 grid grid-cols-2 border text-xs hover:shadow-md duration-200">

    <div class="col-span-1 p-2">

        <img class="h-[100px] justify-self-center" src="{{ asset(Storage::url($product->image)) }}" alt="momo">
    </div>
    <div class="flex flex-col items-start justify-center">
        <h1 class="font-semibold text-sm">{{ $product->name }}</h1>
        <p>
            @if ($product->discount || $product->discount > 0)
                <s class="text-red-600">Rs. {{ $product->price }}</s> Rs.
                {{ $product->price - ($product->discount * $product->price) / 100 }}
            @else
                Rs.{{ $product->price }}
            @endif
        </p>
        <p>
            <strong>{{ $product->vendor->shop->name }}</strong>
        </p>
        
    </div>

</div>

  <!-- Main modal -->
  <div id="product_modal{{$product->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                  <h3 class="text-xl font-semibold primary" >
                      Add to Cart
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="product_modal{{$product->id}}">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4 md:col-span-3 col-span-1 grid grid-cols-2 border text-xs hover:shadow-md duration-200">
                <div class="col-span-1 p-2">

                    <img class="h-[100px] justify-self-center" src="{{ asset(Storage::url($product->image)) }}" alt="momo">
                </div>
                <div class="flex flex-col items-start justify-center">
                    <h1 class="font-semibold text-sm">{{ $product->name }}</h1>
                    <p>
                        @if ($product->discount || $product->discount > 0)
                            <s class="text-red-600">Rs. {{ $product->price }}</s> Rs.
                            {{ $product->price - ($product->discount * $product->price) / 100 }}
                        @else
                            Rs.{{ $product->price }}
                        @endif
                    </p>
                    <p>
                        <strong>{{ $product->vendor->shop->name }}</strong>
                    </p>

                    <form action="{{route('addtoCart')}}" class="py-4" method="post">
                        @csrf
                        <input type="text" name="product_id" value="{{$product->id}}" hidden>
                        <label for="qty" class="text-lg font-bold primary">Quantity:</label>
                        <input type="number" id="qty" name="qty" class="rounded-md md:w-[100px] my-5 md:my-0">
                      
                        <button class="bg-pp py-1 px-2 text-lg text-white rounded-md md:my-5">Add to Cart</button>
                    </form>
                </div>
              </div>
              
          </div>
      </div>
  </div>
  