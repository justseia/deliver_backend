@extends('layouts.app')

@section('content')
    <div class="mx-auto mb-[180px] w-[980px] pt-[100px]">
        <div class="text-center">
            <div class="mb-[10px] text-[40px] font-bold text-[#EB5757]">Cart</div>
            <div class="mb-[70px] text-[18px] font-medium text-[#333333]">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</div>
        </div>
        <div class="mb-[50px] text-[18px] font-semibold">
            <a href="{{ route('menu.index') }}">
                <i class="fas fa-chevron-left"></i>
                Shopping Continue
            </a>
        </div>
        <div class="text-[18px] font-medium">Shopping cart</div>
        <div class="mb-[30px] text-[14px] font-medium">You have {{ $count_cart }} item in your cart</div>
        <div class="mb-[65px] flex flex-col gap-[24px]">
            @foreach($carts as $cart)
                <div class="flex w-full justify-between rounded-[15px] bg-white p-6 shadow-lg">
                    <img src="https://sayavegan.com/wp-content/uploads/2022/05/DSC05908-removebg-preview.png" alt="product-image" class="w-full rounded-lg sm:w-40 object-cover object-center"/>
                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                        <div class="flex flex-col justify-center">
                            <h2 class="text-lg font-bold">{{ $cart->menu->name }}</h2>
                            <p class="mt-1 w-[200px] truncate text-xs text-gray-700">{{ $cart->menu->body }}</p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-[20px]">{{ $cart->count }}</p>
                            <div class="flex flex-col text-[20px]">
                                <form action="{{ route('cart.up', $cart) }}" method="post">
                                    @csrf
                                    <button type="submit">
                                        <i class="fas fa-caret-up"></i>
                                    </button>
                                </form>
                                <form action="{{ route('cart.down', $cart) }}" method="post">
                                    @csrf
                                    <button type="submit">
                                        <i class="fas fa-caret-down"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <p class="text-sm">{{ $cart->menu->cost }}KZT</p>
                        </div>
                        <form class="flex items-center" action="{{ route('cart.delete', $cart) }}" method="post">
                            @csrf
                            <button type="submit">
                                <img src="{{ asset('assets/img/delete.png') }}" alt="img"/>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-end">
            <a href="{{ route('pay') }}" class="flex h-[60px] w-[350px] items-center justify-between rounded-[12px] bg-[#EB5757] px-[30px] font-medium text-white">
                <div>{{ $sum_cart }}KZT</div>
                <div class="flex items-center">
                    Checkout
                    <i class="far fa-arrow-right ml-[10px] text-[12px]"></i>
                </div>
            </a>
        </div>
    </div>
@endsection
