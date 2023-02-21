@extends('layouts.mainlayout')
@section('content')
    {{-- {{ dd($loc_id,$post_id,$data) }} --}}
    <div class="p-4 mt-14">
        <form action="#" method="POST">
            <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">
                {{-- client info detail --}}
                <div
                    class="w-full mt-3 p-3 rounded-lg shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <div class="w-full text-lg flex justify-center font-black">
                        <h1>Initial Setup</h1>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-1 sm:gap-9">
                        <div class="w-full md:mb-0">
                            <x-input-label for="start_date" :value="__('Start Date')" class="mb-1" />
                            <x-text-input id="start_date"
                                class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-2.5 px-4"
                                type="date" name="start_date" :value="old('start_date')" required autocomplete="name" />
                        </div>
                    </div>
                    <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                    @php
                    $shift_counts = count($curr_shifts);
                    $shift_count = $shift_counts / 7;
                    @endphp
                    <div class="flex justify-around mt-4">
                        <div>
                            <p class="text-xl">Conttract Shift Per Day</p>
                            <div class="mt-2 w-full md:mb-0">
                                <x-input-label for="phone_number" :value="__('')" class="w-full"/>
                                <input
                                    class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 "
                                    id="phone_number" type="text" name="phone_number" value="{{ $shift_count }}" disabled
                                    :value="{{ $shift_count }}"/>
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                            </div>
                        </div>
                        <div>
                            <p class="text-xl">Operating Hours</p>
                            <div class="mt-2 w-full md:mb-0">
                                <x-input-label for="phone_number" :value="__('')" class="w-full"/>
                                <input
                                    class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 "
                                    id="phone_number" type="text" name="phone_number" value="{{ $shift_count }}" disabled
                                    :value="{{ $shift_count }}"/>
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                            </div>
                    </div>
                    
                </div>
                
            </div>
        </form>
    </div>
@endsection
