@extends('layouts.app')

@section('content')
    <section class="mx-auto w-[1180px] mt-[100px] mb-[150px]">
        <div class="font-medium text-[18px] mb-[10px]">Restaurants</div>
        <div class="grid grid-cols-4 gap-[24px]">
            @foreach($restaurants as $restaurant)
                <div class="bg-white border border-gray-200 rounded-[10px] shadow">
                    <a href="{{ route('menu.show', $restaurant) }}">
                        <img class="rounded-t-[10px] h-[250px] w-[277px] object-cover object-center" src="{{ $restaurant->image }}" alt=""/>
                    </a>
                    <div class="px-[40px] py-5">
                        <a href="#">
                            <h5 class="mb-2 text-[16px] tracking-tight text-gray-900">{{ $restaurant->name }}</h5>
                        </a>
                        <div
                            class="inline-block items-center bg-[#F7F8FA] text-[12px] font-semibold px-2.5 py-0.5 rounded">
                            <img class="inline-block" src="{{ asset('assets/img/star.svg') }}" alt="img">
                            <span>{{ $restaurant->reiting }}</span>
                        </div>
                        <div class="inline-block bg-[#F7F8FA] text-[12px] font-semibold px-2.5 py-0.5 rounded">
                            {{ $restaurant->body }} min
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <x-contact-us/>

    <x-get-start/>

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
    </style>
@endsection
