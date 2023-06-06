<header aria-label="Site Header" class="bg-white">
    <div class="mx-auto w-[1300px] pt-[45px]">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center gap-12">
                <a class="block text-teal-600" href="{{ route('home.index') }}">
                    <img src="{{ asset('assets/img/logo.svg') }}" alt="img"/>
                </a>
            </div>
            <div>
                <nav>
                    <ul class="flex items-center gap-[60px] text-[14px]">
                        <li>
                            <a class="text-[#333333] hover:text-[#EB5757]" href="{{ route('home.index') }}">Home</a>
                        </li>
                        <li>
                            <a class="text-[#333333] hover:text-[#EB5757]" href="{{ route('menu.index') }}">Menu</a>
                        </li>
                        <li>
                            <a class="text-[#333333] hover:text-[#EB5757]" href="{{ route('recipe.index') }}">Recipe</a>
                        </li>
                        <li>
                            <a class="text-[#333333] hover:text-[#EB5757]" href="{{ route('contact.index') }}">Contact</a>
                        </li>
                        <li>
                            <a class="text-[#333333] hover:text-[#EB5757]" href="{{ route('about.index') }}">About Us</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="flex items-center">
                <div class="flex gap-[15px] text-center">
                    <a class="flex flex-col items-center justify-center" href="{{ route('profile.favorite') }}">
                        <img class="mb-[10px] h-[24px] w-[24px]" src="{{ asset('assets/img/favorite.svg') }}" alt="img"/>
                        <div class="text-[12px]">Favorite</div>
                    </a>
                    <a class="relative flex flex-col items-center justify-center" href="{{ route('cart.index') }}">
                        @if($count_cart != 0)
                            <div class="absolute top-[-5px] right-0 flex h-[14px] w-[14px] items-center justify-center rounded-full bg-[#EB5757] text-[6px] text-white">{{ $count_cart }}</div>
                        @endif
                        <img class="mb-[10px] h-[24px] w-[24px]" src="{{ asset('assets/img/cart.svg') }}" alt="img"/>
                        <div class="text-[12px]">Cart</div>
                    </a>
                    @auth
                        <a class="mr-[20px] flex flex-col items-center justify-center" href="{{ route('profile.info') }}">
                            <img class="mb-[10px] h-[24px] w-[24px]" src="{{ asset('assets/img/profile.png') }}" alt="img"/>
                            <div class="text-[12px]">Profile</div>
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="flex h-[50px] w-[120px] items-center justify-center rounded-full bg-[#EB5757]">
                            <img class="mr-[5px]" src="{{ asset('assets/img/login.svg') }}" alt="img"/>
                            <div class="text-[14px] font-medium text-white">Logout</div>
                        </a>
                        <form id="logout-form" class="hidden" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    @else
                        <a class="flex h-[50px] w-[120px] items-center justify-center rounded-full bg-[#EB5757]" href="{{ route('login') }}">
                            <img class="mr-[5px]" src="{{ asset('assets/img/login.svg') }}" alt="img"/>
                            <div class="text-[14px] font-medium text-white">Login</div>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>
