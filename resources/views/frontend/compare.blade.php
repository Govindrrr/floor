<x-frontend-layout>
    <div class="container py-10">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl primary font-semibold">Compared Items</h1>
                <small class="text-[14px] font-semibold text-slate-600">Based on the price</small>
            </div>
        </div>
        <div class="grid grid-cols-12 py-5">
            @forelse ($products as $product)
            <x-product-cart :product="$product"/>
            @empty
            <div class=" col-span-11 text-center text-3xl font-bold container text-blue-500">
                <h1>Sorry items not found !!</h1>
            </div>
            @endforelse
        
        </div>
       
       
       
       
       
    </div>
</x-frontend-layout>