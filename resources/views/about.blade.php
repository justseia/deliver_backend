@extends('layouts.app')

@section('content')
    <section>
        <div class="relative mb-[185px] pt-[80px]">
            <img src="{{ asset('assets/img/bg_about.png') }}" class="absolute inset-0 top-[340px] z-0 bg-cover bg-center bg-no-repeat" alt=""/>
            <div class="w-[1300px] mx-auto">
                <div class="relative grid grid-cols-2">
                    <div class="text-[55px] font-bold">Immerse yourself<br/>in the authentic<br/>world of Kazakh<br/>cuisine.</div>
                    <img src="https://img.livestrong.com/1260x/cme-data/getty%2Fba4eaa8ccdf648c78d3eb2a492ea1eb7.jpg?type=webp" class="h-[500px] w-[630px] rounded-[10px] rounded-bl-[240px] rounded-tl-[45px] object-cover object-center" alt="img"/>
                </div>
            </div>
        </div>
        <div class="w-[1300px] mx-auto">
            <div class="relative grid grid-cols-2 items-center">
                <img src="https://img.livestrong.com/1260x/cme-data/getty%2Fba4eaa8ccdf648c78d3eb2a492ea1eb7.jpg?type=webp" class="h-[570px] w-[715px] rounded-[150px] object-cover object-center" alt="img"/>
                <div>
                    <div class="text-end text-[80px] font-bold">
                        Welcome to <br/>
                        <span class="text-[#EB5757]">Tandyr!</span>
                    </div>
                    <div class="text-center text-[25px]">Now you can order your favourite Kazakh<br/>Food from home.Our goal is to promote the<br/>Kazakh National Cuisine.We look forward<br/>to your support!<br/><br/>Welcome to Tandyr! Now you can order<br/>your favourite Kazakh Food from home.<br/>Our goal is to promote the Kazakh National Cuisine.<br/>We look forward to your support!<br/>With love Nurila and Assyl<br/><br/>Welcome to Tandyr! Now you can order your favourite Kazakh Food from home.Our goal is to promote the Kazakh National Cuisine.We look forward to your support!</div>
                </div>
            </div>
        </div>
    </section>

    <x-get-start/>

@endsection
