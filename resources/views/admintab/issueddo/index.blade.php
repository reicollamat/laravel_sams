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
        <div class="border-2 p-3 border-gray-200 rounded-lg dark:border-gray-700 dark:bg-gray-800 mt-4">
            <div class="w-full p-2 border rounded-md dark:border-gray-500 dark:text-white">
                <div class="flex flex-col gap-4 sm:flex-row">
                    <h1 class="text-xl">Contract ID Number : </h1>
                    <h1 class="text-xl">Client Name : </h1>
                </div>
                <div>
                    <h1 class="text-xl">Contract Start Date :  </h1>
                    <h1 class="text-xl">Contract End Date : </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
