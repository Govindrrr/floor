<x-frontend-layout>
    <section class="relative">
        <img class="w-full object-cover h-[70vh]" src="{{ asset(Storage::url($vendor->shop->logo)) }}"
            alt="{{ $vendor->shop->name }}">
        <div class="grid grid-cols-12 items-center absolute bottom-0 md:left-10 md:right-10 lg:left-20 lg:right-20">
            <img class="col-span-3 md:col-span-1 h-[110px] w-full" src="{{ asset(Storage::url($vendor->shop->logo)) }}"
                alt="{{ $vendor->shop->name }}">
            <div
                class="col-span-9 md:col-span-11 bg-black opacity-65 h-full text-white flex items-center px-5 justify-between">
                <div>
                    <h1>{{ $vendor->shop->name }}</h1>
                    <address>{{ $vendor->shop->address }}</address>
                </div>
                <div>


                    <!-- Modal toggle -->
                    <button data-modal-target="map-modal" data-modal-toggle="map-modal"
                        class="block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        View Map
                    </button>


                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="grid grid-cols-12 gap-4 my-10">
                <div class="col-span-2 text-lg">
                    <h1 class="primary text-lg font-bold">Menus</h1>
                    <ul class="mt-3">
                        <li class="border-b p-2 font-bold"><a href="">All Items</a></li>
                        <li class="border-b p-2 text-slate-500 font-semibold"><a href="">Special Deals</a></li>
                       
                    </ul>
                </div>
                <div class="col-span-10 w-ful">
                    <form action="{{route('vendor', $vendor->id)}}" method="get">
                        @csrf
                        <div class="flex items-center rounded-md border">
                            <input type="text" name="q" id="q" class="m-0 w-full">
                            <button type="submit" class="bg-black text-white px-4 text-lg py-2 m-0 font-bold">SEARCH</button>
                        </div>

                    </form>
                    <div class="grid md:grid-cols-9 lg:grid-cols-12 grid-cols-2 gap-3 py-5">
                        @foreach ($products as $product)
                          <x-product-cart :product="$product"/>
                        @endforeach
    
                    </div>
                </div>
            </div>
        </div>
        <div id="map-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full border-4">
                <!-- Modal content -->
                <iframe class="w-full" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1641.7546046527643!2d85.31247279839474!3d27.7221692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sHotels!5e1!3m2!1sen!2snp!4v1738248271459!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
