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
                                @if ($curr_ddo->status == 3)
                                <h1 class="text-yellow-300">For DDO Approval</h1>
                                @else
                                    <h1>Waiting for Approval</h1>
                                @endif
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
                                    {{-- {{ dd($curr_ddo->years) }} --}}
                                    {{ date('Y-m-d', strtotime($curr_ddo->start_date . '+' . $curr_ddo->years . 'years')) }}
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
                            <p
                                class="w-full  text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Daily Wage in Contract: <span class="ml-4 font-bold text-md">{{ $curr_ddo->daily_wage }}</span>
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
                                Location Included Posts : <span class="ml-2 font-bold text-md">{{ count($curr_posts) }}</span>
                            </p>
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    </div>
                    <div>
                        @php
                            $list = [];
                        @endphp
                        <div class="grid grid-cols-1 gap-0 sm:grid-cols-3">
                            @foreach ($curr_posts as $curr_post)
                                @php
                                    array_push($list, $curr_post->id);
                                @endphp
                                <p
                                    class="ml-[3em] w-fit text-md p-2  uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    &nbsp;&nbsp; <span class="ml-2 font-bold text-"> {{ $curr_post->place }}</span>
                                </p>
                            @endforeach
                        </div>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    </div>
                </div>
                <div
                    class="w-full mt-3 p-3 rounded-lg shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <div class="w-full text-lg flex justify-center gap-1 font-black">
                            <h1>Proceed to Initial Setup .</h1>
                            <h1>Please Click "NEXT" Button</h1>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    {{-- <div class="grid grid-cols-1 gap-6 sm:grid-cols-1 sm:gap-9">
                        <div class="w-full md:mb-0">
                            <x-input-label for="start_date" :value="__('Start Date')" class="mb-1" />
                            <x-text-input id="start_date"
                                class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-2.5 px-4"
                                type="date" name="start_date" :value="old('start_date')" required autocomplete="name" />
                        </div>
                    </div> --}}
                    {{-- @foreach ($curr_posts as $curr_post)
                        @php
                            $list = array();
                            $list[] = $curr_post->id;
                        @endphp
                    @endforeach --}}
                    {{-- {{ dd($list) }} --}}
                    {{-- {{  $serializeArray = serialize($list) }}  --}}
                    {{-- {{ $encoded = json_encode($list) }} --}}
                    <div class="flex justify-center gap-0 mb-6">
                        <div class="mt-6 flex justify-center gap-6">
                            <x-custom-link-button href="{{ $curr_ddo->id }}/{{ $curr_post->id }}/{{ json_encode($list) }}">
                                {{ __('Next') }}
                            </x-custom-link-button>
                        </div>
                    </div>
                </div>
    @endforeach
@endsection





{{-- {{ $i }} --}}
{{-- <td>
                                            fdfd
                                        </td> --}}
{{-- @if ($i > 7) --}}
{{-- <td> --}}
{{-- {{ $shifts->start_time . ' : ' . $shifts->end_time }} --}}
{{-- {{ $i++ }} --}}
{{-- </td> --}}
{{-- @endif --}}
{{-- @php
                                            $i++;
                                            echo $i ;
                                            // if ($shifts->day == $i) {
                                            //     echo 'hello';
                                            //     continue;
                                            // }
                                            echo $shifts->day;
                                        @endphp --}}
{{-- @if ($shifts->day == 1)
                                            <p>Monday {{ 'Shift ' . $i }}</p>
                                            
                                        @endif
                                        @if ($shifts->day == 2)
                                            <p>Tuesday {{ 'Shift ' . $i }}</p>
                                        @endif
                                        @if ($shifts->day == 3)
                                            <p>Wednesday {{ 'Shift ' . $i }}</p>
                                        @endif
                                        @if ($shifts->day == 4)
                                            <p>Thursday {{ 'Shift ' . $i }}</p>
                                        @endif
                                        @if ($shifts->day == 5)
                                            <p>Friday{{ 'Shift ' . $i }}</p>
                                        @endif
                                        @if ($shifts->day == 6)
                                            <p>Saturday {{ 'Shift ' . $i }}</p>
                                        @endif
                                        @if ($shifts->day == 7)
                                            <p>Sunday {{ 'Shift ' . $i }}</p>
                                        @endif
                                        <p>{{ $shifts->start_time . ' : ' . $shifts->end_time }}</p> --}}
