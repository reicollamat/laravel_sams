@extends('layouts.masterapp')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

        @if (Session::has('status'))
        <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">{{ Session::get('status') }}</span>
            </div>
        </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <x-custom-back-button href="{{route('jobrequest.post',['contract_id'=>$contract_id, 'location_id'=>$location_id])}}">
                {{ __('Back') }}
            </x-custom-back-button>
            <table class="mt-4 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption class="p-2 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Job Request
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                        Please complete the remaining details for <strong>{{Auth::user()->name}}</strong> contract #{{$contract_id}}
                    </p>
                </caption>
            </table>
        </div>


        <form method="GET" action="{{ route("jobrequest.confirm") }}">
            @csrf
            <div class="mt-4 ">
                <div class="columns-1 mt-4">

                    {{-- input start date --}}
                    <div>
                        <x-input-label for="start_date" :value="__('Starting Date')" />
                        <x-text-input type="date" class="block mt-1 w-full" id="start_date" name="start_date" :value="old('start_date')" required autofocus autocomplete="name" min={{$datenow}} value={{$datenow}}/>
                    </div>

                </div>

                <div class="columns-1 mt-4">

                    {{-- input duration --}}
                    <div>
                        <x-input-label for="years" :value="__('Duration (year/s)')" />
                        <select class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-500 dark:text-gray-400 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8" id="years" name="years" :value="old('years')" required autocomplete="name">
                            <option value="" disabled selected>Select year/s</option>
                            <option value="1">1 Year</option>
                            <option value="2">2 Years</option>
                            <option value="3">3 Years</option>
                        </select>
                    </div>

                </div>

            </div>

                <div class="columns-1 mt-4">

                    {{-- input daily wage --}}
                    <div>
                        <x-input-label for="daily_wage" :value="__('Daily Wage (Peso)')" />
                        <x-text-input type="number" class="block mt-1 w-full" id="daily_wage" name="daily_wage" :value="old('daily_wage')" required autofocus autocomplete="name"/>
                    </div>

                </div>

            <div class="mt-4 ">
                <x-custom-primary-button>
                    Next
                </x-custom-primary-button>
            </div>

            <input type="text" name="contract_id" value="{{$contract_id}}" hidden>
            <input type="text" name="location_id" value="{{$location_id}}" hidden>
        </form>
        
    </div>
</div>
@endsection