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
                            <x-input-label for="birthdate" :value="__('Start Date')" class="mb-1" />
                            <x-text-input id="birthdate"
                                class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-2.5 px-4"
                                type="date" name="birthdate" :value="old('birthdate')" required autocomplete="name" />
                        </div>
                    </div>
                    {{-- <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Shift
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Monday
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tuesday
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Wednesday
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Thursday
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Friday
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Saturday
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sunday
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($curr_posts as $curr_post)
                            @foreach ($curr_post->shift as $shifts)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{-- {{$shift}} 
                                </th>
                                @for ($i=1;$i<=7;$i++)
                                    <td class="px-6 py-4">
                                        @if (in_array($i,$shifts->$days))
                                        {{ $shifts->start_time }} <br>
                                        @endif
                                    </td>
                                 @endfor
                            </tr>
                            @endforeach
                            @endforeach
        
                        </tbody>
                    </table> --}}
                    <div>
                        {{-- {{ dd($curr_ddo->location_id) }} --}}
                        @foreach ($curr_posts as $curr_post)
                            @foreach ($curr_post->shift as $shifts)
                                {{-- {{ $shifts->day }} --}}
                                @switch($shifts->day)
                                    @case(1)
                                        Monday
                                        {{ $shifts->start_time }}
                                        {{ $shifts->end_time }}
                                        @break
                                    @case(2)
                                        Tuesday
                                        {{ $shifts->start_time }}
                                        {{ $shifts->end_time }}
                                        <br>
                                        @break
                                    @case(3)
                                        Wednesday
                                        {{ $shifts->start_time }}
                                        {{ $shifts->end_time }}
                                        <br>
                                        @break
                                    @case(4)
                                        Thursday
                                        {{ $shifts->start_time }}
                                        {{ $shifts->end_time }}
                                        <br>
                                        @break
                                    @case(5)
                                        Friday
                                        {{ $shifts->start_time }}
                                        {{ $shifts->end_time }}
                                        <br>
                                        @break
                                    @case(6)
                                        Saturday
                                        {{ $shifts->start_time }}
                                        {{ $shifts->end_time }}
                                        <br>
                                        @break
                                    @case(7)
                                        Sunday
                                        {{ $shifts->start_time }}
                                        {{ $shifts->end_time }}
                                        <br>
                                        @break
                                
                                    @default
                                        Default case...
                                @endswitch
                                {{-- <br>
                                {{ $shifts->start_time }} --}}
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex justify-center gap-6 mb-6">
                <form method="POST" action="">
                    @csrf
                    <div class="mt-6 w-full flex justify-center gap-6">
                        <x-custom-accept-button>
                            {{ __('Approve') }}
                        </x-custom-accept-button>
                    </div>
                </form>
                <form method="POST" action="">
                    @csrf
                    <div class="mt-6 w-full flex justify-center gap-6">
                        <x-custom-reject-button>
                            {{ __('Reject') }}
                        </x-custom-reject-button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
