@extends('layouts.app')

@section('content')
    <section class="bg-[#EB5757] w-full flex h-[60px] items-center mt-[80px] mb-[20px]">
        <div class="mx-auto w-[800px] flex justify-between">
            <a href="{{ route('profile.info') }}">
                <div class="text-[15px] text-white font-medium">Profile Information</div>
            </a>
            <a href="{{ route('profile.cards') }}">
                <div class="text-[15px] text-white font-medium">My Cards</div>
            </a>
            <a href="{{ route('profile.orders') }}">
                <div class="text-[15px] text-white font-medium">My Orders</div>
            </a>
            <a href="{{ route('profile.favorite') }}">
                <div class="text-[15px] text-white font-medium">My Favorites</div>
            </a>
        </div>
    </section>
    <section class="mx-auto w-[1300px] mb-[200px] flex flex-col items-center">
        @foreach($orders as $order)
            <div class="mb-6 w-[980px] justify-between rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                <img src="{{ $order->menu->image }}" alt="product-image" class="w-full rounded-lg sm:w-40"/>
                <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                    <div class="flex flex-col justify-center">
                        <h2 class="text-lg font-bold text-gray-900">{{ $order->menu->name }}</h2>
                        <p class="mt-1 text-xs text-gray-700 w-[100px] truncate">{{ $order->menu->body }}</p>
                    </div>
                    <div class="flex items-center">
                        @if($order->status == 1)
                            <p class="text-sm">End</p>
                        @elseif($order->status == 2)
                            <p class="text-sm">Deliver</p>
                        @elseif($order->status == 3)
                            <p class="text-sm">Cook</p>
                        @endif
                    </div>
                    <div class="flex items-center">
                        <p class="text-sm">{{ $order->menu->created_at->isoFormat('LL') }}</p>
                    </div>
                    <div class="flex items-center">
                        <p class="text-sm">{{ $order->cost }}KZT</p>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
