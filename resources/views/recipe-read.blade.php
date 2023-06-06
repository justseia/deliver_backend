@extends('layouts.app')

@section('content')
    <div class="pt-[20px]">
        <img src="{{ $recipe->image }}" alt="img" class="h-[475px] w-full object-cover object-center"/>
        <div class="w-[800px] mx-auto">
            <div class="pt-[70px] pb-[80px]">
                <div class="font-medium text-[48px] mb-[30px]">{{ $recipe->name }}</div>
                <div class="font-normal text-[18px] whitespace-pre-line">{{ $recipe->body }}</div>
            </div>
        </div>
        <div class="py-[50px]">
            <livewire:show-category/>
        </div>
    </div>
@endsection
