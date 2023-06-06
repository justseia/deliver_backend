@extends('layouts.app')

@section('content')
    <section class="mx-auto w-[1180px] mt-[100px] mb-[150px]">
        <div class="font-medium text-[18px] mb-[10px]"> Menu</div>
        <form action="{{ route('menu.search', $restauran) }}" method="post">
            @csrf
            <select name="category_id" onchange="this.form.submit()" class="border border-gray-500 w-[255px] h-[40px] rounded-[10px] px-[20px] mb-[170px]">
                <option value="0" selected>All</option>
                <option value="1">Hot dishes</option>
                <option value="2">Soups</option>
                <option value="3">Snack dishes</option>
                <option value="4">Cold dishes</option>
                <option value="5">Sweets</option>
                <option value="6">Beverages</option>
            </select>
            <div class="grid grid-cols-4 gap-[24px]">
                @foreach($menus as $menu)
                    <div class="relative rounded-[50px] border border-gray-200 shadow-lg">
                        <a href="javascript:show({{$menu}})">
                            <img class="h-[250px] object-cover object-center w-full" src="{{ $menu->image }}" alt="img"/>
                        </a>
                        <div class="px-[40px] py-5">
                            <h5 class="mb-2 text-[16px] tracking-tight text-gray-900">{{ $menu->name }}</h5>
                            <div>{{ $menu->cost }}KZT</div>
                            <form class="absolute top-[25px] left-[25px]" method="post" action="{{ route('profile.favorite.add', $menu) }}">
                                @csrf
                                <button type="submit">
                                    @auth
                                        @if($menu->isFavoritedBy(auth()->user()))
                                            <img src="{{ asset('assets/img/favorite_full.svg') }}" alt=""/>
                                        @else
                                            <img src="{{ asset('assets/img/favorite.svg') }}" alt=""/>
                                        @endif
                                    @else
                                        <img src="{{ asset('assets/img/favorite.svg') }}" alt=""/>
                                    @endauth
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </form>
    </section>

    <x-contact-us/>

    <x-get-start/>

    <div id="addCart" class="fixed left-0 top-0 flex h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black/50 hidden" style="z-index: 9999;">
        <div class="relative w-[1400px] overflow-hidden bg-white">
            <a href="javascript:hidden()">
                <div class="absolute top-[50px] text-[40px] right-[50px] text-white">&#x2715</div>
            </a>
            <div class="h-[160px] w-full bg-[#EB5757]"></div>
            <div class="ml-[92px] w-[520px] pt-[63px]">
                <div id="nameMenu" class="mb-[200px] text-[42px] font-bold"></div>
                <div class="mb-[60px] flex flex-col gap-[18px]">
                    <div class="flex items-center gap-[30px]">
                        <div id="sweetnessMenu" class="flex gap-[12px]"></div>
                        <div class="text-[18px] font-bold">sweetness</div>
                    </div>
                    <div class="flex items-center gap-[30px]">
                        <div id="acidityMenu" class="flex gap-[12px]"></div>
                        <div class="text-[18px] font-bold">acidity</div>
                    </div>
                    <div class="flex items-center gap-[30px]">
                        <div id="aromaticityMenu" class="flex gap-[12px]"></div>
                        <div class="text-[18px] font-bold">aromaticity</div>
                    </div>
                    <div class="flex items-center gap-[30px]">
                        <div id="oillinessMenu" class="flex gap-[12px]"></div>
                        <div class="text-[18px] font-bold">oilliness</div>
                    </div>
                </div>
                <div id="costMenu" class="mb-[100px] text-[32px] font-bold"></div>
                <div class="mb-[82px] text-[20px]">
                    <div class="mb-[20px] font-bold">Details</div>
                    <div id="bodyMenu" class="line-clamp-5"></div>
                </div>
                <form id="formMenu" action="{{ route('cart.add', 0) }}" method="post">
                    @csrf
                    <div class="flex gap-[45px] pb-[200px] items-center">
                        <button class="flex items-center gap-[33px] border border-black p-[26px] text-[23px]">
                            <div>+</div>
                            <div>Add</div>
                        </button>
                        <div class="custom-number-input h-10 w-32">
                            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                <button type="button" data-action="decrement" class="text-gray-600 hover:text-gray-700 h-full w-20 rounded-l cursor-pointer outline-none">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input name="count_cart" type="number" class="outline-none focus:outline-none text-center w-full font-semibold text-md hover:text-black focus:text-black md:text-basecursor-default flex items-center text-gray-700" value="0"/>
                                <button type="button" data-action="increment" class="text-gray-600 hover:text-gray-700 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <img id="imgMenu" class="absolute right-0 top-1/2 w-[1000px] -translate-y-1/2 translate-x-1/4" src="" alt="img"/>
            </div>
        </div>
    </div>

    <style>
        .selected {
            background-color: #EB5757;
            color: #FFFFFF;
        }

        .not-selected {
            color: #333333;
        }

        .scrollbar-custom::-webkit-scrollbar {
            width: 6px;
        }

        .scrollbar-custom::-webkit-scrollbar-track {
            background-color: #F2F2F2;
            border-radius: 9999px;
        }

        .scrollbar-custom::-webkit-scrollbar-thumb {
            background-color: #EB5757;
            border-radius: 100px;
        }

        .scrollbar-hidden::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hidden {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-number-input input:focus {
            outline: none !important;
        }

        .custom-number-input button:focus {
            outline: none !important;
        }
    </style>

    <script>
        function show(data) {
            document.getElementById("sweetnessMenu").innerHTML = ''
            document.getElementById("acidityMenu").innerHTML = ''
            document.getElementById("aromaticityMenu").innerHTML = ''
            document.getElementById("oillinessMenu").innerHTML = ''
            cat = document.getElementById("formMenu").action
            cat = cat.replace('0', data['id']);
            console.log(cat)
            document.getElementById("formMenu").action = cat

            for (let i = 0; i < data['sweetness']; i++) {
                document.getElementById("sweetnessMenu").innerHTML += `<div class="h-[16px] w-[16px] rounded-full bg-black"></div>`
            }
            for (let i = data['sweetness']; i < 5; i++) {
                document.getElementById("sweetnessMenu").innerHTML += `<div class="h-[16px] w-[16px] rounded-full border-[2px] border-black"></div>`
            }

            for (let i = 0; i < data['acidity']; i++) {
                document.getElementById("acidityMenu").innerHTML += `<div class="h-[16px] w-[16px] rounded-full bg-black"></div>`
            }
            for (let i = data['acidity']; i < 5; i++) {
                document.getElementById("acidityMenu").innerHTML += `<div class="h-[16px] w-[16px] rounded-full border-[2px] border-black"></div>`
            }

            for (let i = 0; i < data['aromaticity']; i++) {
                document.getElementById("aromaticityMenu").innerHTML += `<div class="h-[16px] w-[16px] rounded-full bg-black"></div>`
            }
            for (let i = data['aromaticity']; i < 5; i++) {
                document.getElementById("aromaticityMenu").innerHTML += `<div class="h-[16px] w-[16px] rounded-full border-[2px] border-black"></div>`
            }

            for (let i = 0; i < data['oilliness']; i++) {
                document.getElementById("oillinessMenu").innerHTML += `<div class="h-[16px] w-[16px] rounded-full bg-black"></div>`
            }
            for (let i = data['oilliness']; i < 5; i++) {
                document.getElementById("oillinessMenu").innerHTML += `<div class="h-[16px] w-[16px] rounded-full border-[2px] border-black"></div>`
            }

            document.getElementById("nameMenu").innerHTML = data['name']
            document.getElementById("costMenu").innerHTML = data['cost'] + 'KZT'
            document.getElementById("bodyMenu").innerHTML = data['body']
            document.getElementById("imgMenu").setAttribute("src", data['image'])

            const addCart = document.querySelector("#addCart")
            addCart.classList.remove("hidden")
        }

        function hidden() {
            const addCart = document.querySelector("#addCart")
            addCart.classList.add("hidden")
        }

        function decrement(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            value--;
            target.value = value;
        }

        function increment(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            value++;
            target.value = value;
        }

        const decrementButtons = document.querySelectorAll(
            `button[data-action="decrement"]`
        );

        const incrementButtons = document.querySelectorAll(
            `button[data-action="increment"]`
        );

        decrementButtons.forEach(btn => {
            btn.addEventListener("click", decrement);
        });

        incrementButtons.forEach(btn => {
            btn.addEventListener("click", increment);
        });
    </script>
@endsection
