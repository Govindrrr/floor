<div class="container my-5 shadow-lg">
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-3 primary border-r-8 px-3 border-lime-400 h-[400px]" >
            <h1 class="text-3xl font-bold px-3 border-black border-b-4">
                <a href="{{route('profile')}}" >Profile</a>
            </h1>
            <ul class="p-3 text-lime-600 font-semibold">
                <li>
                    <a href="{{route('profile.edit')}}">
                        1. Edit-profile
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-span-9">
            {{ $slot }}
        </div>
    </div>
</div>