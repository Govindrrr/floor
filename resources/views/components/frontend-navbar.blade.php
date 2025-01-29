<nav class="bg-pp">
    <div class="container">
        <div class="flex items-center justify-between">
            <div class="">
                <img class="bg-red-300 md:w-[150px] w-[100px]" src="{{asset(Storage::url($company->logo))}}" alt="xx">
            </div>
            <div class="hidden md:block">
                <form action="" method="get">
                    <div class="flex items-center rounded-md">
    
                        <input type="text" name="q" id="q" class="m-0">
                        <button class="bg-slate-300 font-bold primary m-0 px-4 py-2">Compare</button>
                    </div>
                </form>
            </div>
            <div class="flex gap-2 items-center">
                <a class="bg-secondary primary px-3 py-1 rounded-md" href="{{route('login')}}">SignIn</a>
                <a class="border border-[var(--secondary)] secondary px-3 py-1 rounded-md" href="{{route('register')}}">SignUp</a>
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