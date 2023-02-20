@extends('layouts.masterapp')
@section('content')
    <div class="p-4 sm:ml-64 mt-14">
        <div class="border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-7">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 font-bold text-2xl text-gray-900 dark:text-gray-100">
                    Duty Detail Order
                </div>
            </div>
        </div>
        <x-search-bar action="{{ route('searchsecurityguard') }}" method="GET">
            <x-slot name="anchor" href="#">
            </x-slot>
        </x-search-bar>
        <div class="border-2 p-4 border-gray-200 rounded-lg dark:border-gray-700 dark:bg-gray-800 mt-4">
            @foreach ($active_ddos as $active_ddo)
            <div class="w-full p-8 border rounded-md gap-6 dark:border-gray-500 dark:text-white mb-4">
                @foreach ($active_ddo->contract as $detail)
                <div class="w-full flex flex-col justify-between gap-8 sm:flex-row">
                    <h1 class="text-xl">Contract ID Number : <span class="font-black uppercase">{{ $detail->id }}</span></h1>
                    <h1 class="text-xl">Client Name &nbsp: <span class="font-black uppercase">{{ $active_ddo->name . " " . $active_ddo->last_name }}</span></h1>
                </div>
                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="w-full mt-3 flex justify-start gap-8">
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <h1 class="text-xl">Contract Start Date : <span class="font-black uppercase">{{ $detail->start_date }}</span>  </h1>
                        <h1 class="text-xl"> To </h1>
                        <h1 class="text-xl"><span class="font-black uppercase">kunwari meron</span> </h1>
                    </div>
                </div>
                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                <div>
                    <h1 class="text-xl">Location : <span class="font-black uppercase"></span></h1>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
@endsection
