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
                                    {{ $curr_ddo->issued_date }}
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
                        <h1>Contract / Request Information</h1>
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
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-1">
                            <p
                                class="w-full  text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Location Address : <span class="ml-2 font-bold text-md">{{ $curr_ddo->address }}</span>
                            </p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    </div>
                    <div>
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
                            <p class="w-full text-md p-2 uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Location Included Posts :
                            </p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    </div>
                    <div>
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-3">
                            @foreach ($curr_posts as $curr_post)
                                <p
                                    class="ml-[3em] text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    &nbsp;&nbsp;{{ $curr_post->place }}
                                </p>
                            @endforeach
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    </div>
                </div>
                <div
                    class="w-full mt-3 p-3 rounded-lg shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <div class="w-full text-lg flex justify-center font-black">
                        <h1>Initial Setup</h1>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-9">
                        <div class="w-full md:mb-0">
                            <x-input-label for="birthdate" :value="__('Start Date')" class="mb-1"/>
                            <x-text-input id="birthdate"
                                class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-2.5 px-4"
                                type="date" name="birthdate" :value="old('birthdate')" required autocomplete="name" />
                        </div>
                        <div>
                            <div>
                                <div>
                                    <label for="visitors"
                                        class="block text-sm font-medium text-gray-900 dark:text-white mb-1.5">
                                        Effective Number of Days
                                    </label>
                                    <input type="number" id="visitors"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
