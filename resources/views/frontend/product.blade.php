<x-frontend-layout>
    <section>
        <div class="bg-white py-10">
            <div class="container ">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl primary">Special Deal</h1>
                        <small class="text-[14px] font-semibold text-slate-600">Best quality and products</small>
                    </div>
                    <a href="" class="primary">view all <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="grid md:grid-cols-9 lg:grid-cols-12 grid-cols-2 gap-3">
                    @foreach ($products as $product)
                      <x-product-cart :product="$product"/>
                    @endforeach

                </div>

            </div>
        </div>

    </section>
    {{-- Vendor request --}}
    <section>
        <div class="container flex justify-center text-center py-20">
            <div>
                <h1 class="text-2xl font-semibold text-slate-500">
                    List your Restaurant or Store at Floor Digital Pvt. Ltd. ! <br>
                    Rech 1,00,000 + new customers.
                </h1>

                <button data-modal-target="request-model" data-modal-toggle="request-model"
                    class="bg-pp py-2 px-4 rounded-md text-white font-semibold mt-5">
                    SEND A REQUEST
                </button>
                <div class="space-y-2 my-2">
                    @error('name')
                        <div class="text-red-600 bg-red-200 py-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2 my-2">
                    @error('email')
                        <div class="text-red-600 bg-red-200 py-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2 my-2">
                    @error('shopname')
                        <div class="text-red-600 bg-red-200 py-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2 my-2">
                    @error('phone')
                        <div class="text-red-600 bg-red-200 py-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div id="request-model" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold primary">
                                Welcome to Floor Digital Pvt. Ltd.
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="request-model">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>

                        </div>

                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <form action="{{ route('vendor-request') }}" method="post">
                                @csrf
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="col-span-1">
                                        <label for="name">Name <span class="text-red-600">*</span></label>
                                        <input type="text" name="name" id="name"
                                            class="w-full px-2 py-1 rounded-md " placeholder="Enter your Name">
                                    </div>
                                    <div class="col-span-1">
                                        <label for="shopname">Shop Name <span class="text-red-600">*</span></label>
                                        <input type="text" name="shopname" id="shopname"
                                            class="w-full px-2 py-1 rounded-md" placeholder="Restaurent/Store Name">
                                    </div>
                                    <div class="col-span-1">
                                        <label for="email">Email <span class="text-red-600">*</span></label>
                                        <input type="text" name="email" id="email"
                                            class="w-full px-2 py-1 rounded-md">
                                    </div>

                                    <div class="col-span-1">
                                        <label for="phone">phone <span class="text-red-600">*</span></label>
                                        <input type="text" name="phone" id="phone"
                                            class="w-full px-2 py-1 rounded-md" placeholder="eg. 98234234324">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="description">Description <span
                                                class="text-red-600">*</span></label>

                                        <textarea name="description" id="description" class="w-full px-2 py-1 rounded-md" placeholder="'short description">
                                      </textarea>
                                    </div>

                                    <div class="col-span-2 flex text-center justify-center">
                                        <button data-modal-target="request-model" data-modal-toggle="request-model"
                                            class="bg-pp py-2 px-4 rounded-md text-white font-semibold">
                                            SEND A REQUEST
                                        </button>

                                    </div>

                                </div>


                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
</x-frontend-layout>