<nav class="bg-pp mb-10">
    <div class="container">
        <div class="flex items-center justify-between">
            <a href="{{ route('home') }}">
                <img class="md:w-[150px] w-[100px] py-2" src="{{asset(Storage::url($company->logo))}}" alt="xx">
            </a>
            <div class="hidden md:block">
                <form action="{{route('compare')}}" method="get">
                    @csrf
                    <div class="flex items-center rounded-md">
                        <input type="text" name="q" id="q" class="m-0">
                        <button type="submit" class="bg-slate-300 font-bold primary m-0 px-4 py-2"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                   
                </form>
            </div>
            <div class="flex gap-2 items-center">
             @if (Auth::user())
             <a href="{{route('profile')}}" class="text-white text-2xl px-2">
                <i class="fa-solid fa-user"></i>
            </a>
             <a href="{{route('cart')}}" class="text-white text-xl mr-5 relative p-3 ">
                <small class="bg-red-600 rounded-full px-1 -right-1 top-2 text-xs absolute">{{Auth::user()->carts->count()}}</small>

                <i class="fa-solid fa-cart-shopping">
                </i>
            </a>
             <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <button class="bg-red-500 px-3 py-1 rounded-md">Logout</button>
            </form>
            
             @else
             <a class="bg-secondary primary px-3 py-1 rounded-md" href="{{route('login')}}">SignIn</a>
             <a class="border border-[var(--secondary)] secondary px-3 py-1 rounded-md" href="{{route('register')}}">SignUp</a>
             @endif
            
            </div>
        </div>
        
        

        <div class="md:hidden">
            <form action="" method="get">
                <div class="flex items-center rounded-md">

                    <input type="text" name="q" id="q" class="m-0">
                    <button class="bg-slate-300 font-bold primary m-0 px-4 py-2">Compare</button>
                </div>
            </form>
        </div>
    </div>
</nav>