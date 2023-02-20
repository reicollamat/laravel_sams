@extends('layouts.mainlayout')
@section('content')
    @foreach ($curr_ddos as $curr_ddo)
        <div class="p-4 mt-14">
            <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-6">
                {{-- Banner --}}
                <div
                    class="w-full p-3 rounded-lg flex shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <x-custom-back-button href="{{ route('indexissueddo') }}">
                        {{ __('Back') }}
                    </x-custom-back-button>
                    <div class="w-full flex flex-col font-bold text-sm p-2 sm:text-xl sm:flex-row">
                        <h1 class="w-full">{{ __('Duty Detail Order') . ' Number : # ' . $curr_ddo->id }}</h1>
                        <div class="w-full flex flex-col justify-end gap-2 sm:flex-row">
                            <h1>{{ __('STATUS :') }}</h1>
                            {{-- @if ($contract_detail->status == 1)
                            <h1 class="text-red-600">Waiting for Approval</h1>
                        @else
                            <h1>Waiting for Approval</h1>
                        @endif --}}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">

                {{-- client info detail --}}
                <div
                    class="w-full mt-3 p-3 rounded-lg shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <div class="w-full text-lg flex justify-center font-black">
                        <h1>Clientele Information</h1>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                        <p class="w-full text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Name <span
                                class="ml-[13em] text-xl font-black">{{ $curr_ddo->name . ' ' . $curr_ddo->last_name }}</span>
                        </p>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="grid grid-cols-1 gap-0 sm:grid-cols-2 sm:gap-9">
                        <div>
                            <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                                <p
                                    class="w-full  text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    Contract Issued Date
                                </p>
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    {{ $curr_ddo->start_date }}
                                </p>
                            </div>
                            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        </div>
                        <div>
                            <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                                <p
                                    class="w-full  text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    Contract Issued End Date
                                </p>
                                <p
                                    class="w-full font-bold text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    {{ date('Y-m-d', strtotime($curr_ddo->start_date . '+' . $curr_ddo->years . ' years')) }}
                                </p>
                            </div>
                            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        </div>
                    </div>
                </div>
                <div
                    class="w-full mt-3 p-3 rounded-lg shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <div class="w-full text-lg flex justify-center font-black">
                        <h1>Contract / Request  Information</h1>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    <div>
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full  text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Location Name : <span class="ml-4 font-bold text-md">{{ $curr_ddo->locations_name }}</span>
                            </p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    </div>
                    <div>
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full  text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Location Address : <span class="ml-2 font-bold text-md">{{ $curr_ddo->address }}</span>
                            </p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    </div>
                    <div>
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p
                                class="w-full  text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Location Included Posts :
                            </p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    </div>
                    <div>
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-1">
                            @foreach ($curr_posts as $curr_post)
                                <p
                                class="ml-[14em] text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                {{ $curr_post->place }}
                                </p>
                            @endforeach
                           
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    </div>
                </div>
            </div>
    @endforeach
@endsection
