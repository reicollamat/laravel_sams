@extends('layouts.masterapp')
@section('content')
    <div class="p-4 sm:ml-64 mt-14">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 font-bold text-2xl text-gray-900 dark:text-gray-100">
                    Active Contracts
                </div>
            </div>
        </div>
        <x-search-bar action="#" method="GET">
            <x-slot name="anchor" href="#">
            </x-slot>
        </x-search-bar>
        <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-5">
            
            <div class="border-2 p-4 border-gray-200 rounded-lg dark:border-gray-700 dark:bg-gray-800">
                @if (session('status'))
                    <x-custom-info-banner>
                        {{ session('status') }} 
                    </x-custom-info-banner>
                @endif

                <div class="w-full p-8 border rounded-md gap-6 dark:border-gray-500 dark:text-white mb-4">
                    {{-- @foreach ($active_ddo->contract as $detail) --}}
                    <div class="w-full flex flex-col justify-between gap-8 sm:flex-row">
                        <h1 class="text-xl">Contract ID Number : <span class="font-black uppercase"></span></h1>
                        <h1 class="text-xl">Client Name &nbsp: <span class="font-black uppercase"></span></h1>
                    </div>
                    <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="w-full mt-3 flex justify-between gap-8">
                        <div class="flex flex-col gap-3 sm:flex-row">
                            <h1 class="text-xl">Contract Issued Date : <span class="font-black uppercase"></span>  </h1>
                        </div>
                        <div class="flex flex-col gap-3 sm:flex-row">
                            <h1 class="text-xl">Contract Daily Wage : <span class="font-black uppercase"></span>  </h1>
                        </div>
                    </div>
                    <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="flex justify-between content-center items-center">
                        <h1 class="text-xl">Location : <span class="font-black uppercase"></span></h1>
                        <x-custom-link-button href="{{ route('showcontract') }}">
                            {{ __('View Contract') }}
                        </x-custom-link-button>
                    </div>
                    <div>
                        
                    </div>
                    {{-- @endforeach --}}
                </div>
                {{-- @endforeach --}}
            {{-- @else --}}
                <div>
                    <h1 class="w-full py-7 text-2xl text-center text-gray-500 dark:text-gray-400">No DDO
                        Found!
                    </h1>
                </div>
            {{-- @endif --}}
            </div>
            </div>

    </div>
@endsection
