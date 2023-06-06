@extends('layouts.app')

@section('content')
    <form action="{{ route('order') }}" method="post">
        @csrf
        <div class="mx-auto w-[1300px] py-[50px]">
            <div class="grid grid-cols-10 gap-[32px]">
                <div class="col-span-6 rounded-[28px] bg-[#FFB7B7] p-[40px]">
                    <div class="grid grid-cols-2 gap-[20px] font-medium">
                        <div class="col-span-2 text-[20px]">Shipping details</div>
                        <div class="flex items-center">Use saved address</div>
                        <div class="w-full">
                            <select class="block h-[60px] w-full rounded-[5px] bg-white p-2.5 text-sm text-[#2D3748]">
                                @foreach($credit_cart as $item)
                                    <option value="{{ $item->id }}">{{ substr($item->number, -4) }}, {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <div class="mb-[20px]">Street name</div>
                            <input type="text" class="h-[60px] w-full rounded-[5px] px-[20px]"/>
                        </div>
                        <div class="col-span-2">
                            <div class="mb-[20px]">Flat (Home)</div>
                            <input type="text" class="h-[60px] w-full rounded-[5px] px-[20px]"/>
                        </div>
                        <div>
                            <div class="mb-[20px]">Select shipping</div>
                            <select class="block h-[60px] w-full rounded-[5px] bg-white p-2.5 text-sm text-[#2D3748]">
                                <option value="deliver">Pickup</option>
                                <option value="deliver">Deliver</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="flex h-[60px] w-full items-center justify-center rounded-[12px] bg-[#EB5757] px-[30px] font-medium text-white">
                                Complete Order
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 rounded-[28px] bg-[#FFB7B7] p-[30px]">
                    <div class="mb-[10px] text-[20px] font-medium">Order Summary</div>
                    <div class="mb-[20px] flex justify-center">
                        <img class="h-[185px] w-[280px] object-cover" src="https://caspiannews.com/media/caspian_news/all_original_photos/1503299057_2399406_1503298772_853446besbarmak.jpg" alt="img"/>
                    </div>
                    <div class="mb-[50px]">
                        <div class="mb-[20px] text-[18px] font-medium">Gift Card / Discount code</div>
                        <div class="grid grid-cols-3 gap-[20px]">
                            <input type="text" class="col-span-2 h-[60px] w-full rounded-[5px] px-[20px]"/>
                            <button class="rounded-[5px] border-[2px] border-[#3182CE] font-medium text-[#3182CE]">Apply</button>
                        </div>
                    </div>
                    <div class="mb-[20px] flex justify-between text-[18px] font-medium">
                        <div>Sub total</div>
                        <div>{{ $sum_cart - 1000 }} KZT</div>
                    </div>
                    <div class="mb-[20px] flex justify-between text-[18px] font-medium">
                        <div>Shipping</div>
                        <div>1000 KZT</div>
                    </div>
                    <div class="mb-[20px] flex justify-between text-[18px] font-medium">
                        <div>Total</div>
                        <div>{{ $sum_cart }} KZT</div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
