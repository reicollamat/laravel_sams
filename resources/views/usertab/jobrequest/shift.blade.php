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
            <x-custom-back-button href="{{ url()->previous() }}">
                {{ __('Back') }}
            </x-custom-back-button>
            <table class="mt-4 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-2 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Add Shift
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                        Work Schedule for Post #{{$post_id}} - Armed
                    </p>
                </caption>
            </table>
        </div>


        <form method="GET" action="{{ route('jobrequest.schedule', ['post_id'=>$post_id]) }}">
            @csrf
            <div class="mt-4 ">
                <div class="columns-1 md:columns-2 mt-4">

                    {{-- input day start --}}
                    <div>
                        <x-input-label for="startday" :value="__('Day Start')" />
                        <select class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-500 dark:text-gray-400 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8" id="startday" name="startday" :value="old('startday')" required autocomplete="name">
                            <option value="" disabled>Select Starting Day</option>
                            <option value="1" selected>Monday</option>
                            <option value="2">Tuesday</option>
                            <option value="3">Wednesday</option>
                            <option value="4">Thusday</option>
                            <option value="5">Friday</option>
                            <option value="6">Saturday</option>
                            <option value="7">Sunday</option>
                        </select>
                    </div>
    
                    {{-- input day end --}}
                    <div>
                        <x-input-label for="endday" :value="__('Day End')" />
                        <select class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-500 dark:text-gray-400 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8" id="endday" name="endday" :value="old('endday')" required autocomplete="name">
                            <option value="" disabled>Select Ending Day</option>
                            <option value="1">Monday</option>
                            <option value="2">Tuesday</option>
                            <option value="3">Wednesday</option>
                            <option value="4">Thusday</option>
                            <option value="5">Friday</option>
                            <option value="6">Saturday</option>
                            <option value="7" selected>Sunday</option>
                        </select>
                    </div>

                </div>

                <div class="columns-1 mt-4">

                    {{-- input no. of shifts --}}
                    <div>
                        <x-input-label for="shiftsno" :value="__('Number of Shifts')" />
                        <select class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-500 dark:text-gray-400 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8" id="shiftsno" name="shiftsno" :value="old('shiftsno')" required autocomplete="name">
                            <option value="" disabled selected>Select number of shift/s</option>
                            <option value="1">1 Shift - 24 Working Hours</option>
                            <option value="2">2 Shifts - 12 Working Hours</option>
                        </select>
                    </div>

                </div>

                <div class="columns-1 mt-4">

                    {{-- input rotation start --}}
                    <div>
                        <x-input-label for="starttime" :value="__('Rotation Start')" />
                        <select class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-500 dark:text-gray-400 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8" id="starttime" name="starttime" :value="old('starttime')" required autocomplete="name">
                            <option value="" disabled selected>Select Start Time</option>
                            <option value="1:00">1:00 AM</option>
                            <option value="2:00">2:00 AM</option>
                            <option value="3:00">3:00 AM</option>
                            <option value="4:00">4:00 AM</option>
                            <option value="5:00">5:00 AM</option>
                            <option value="6:00">6:00 AM</option>
                            <option value="7:00">7:00 AM</option>
                            <option value="8:00">8:00 AM</option>
                            <option value="9:00">9:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="12:00">12:00 PM</option>
                        </select>
                    </div>
    
                    {{-- input no. of guards per shift
                    <div>
                        <x-input-label for="guardspershift" :value="__('Number of Guards per Shift')" />
                        <x-text-input type="number" class="block mt-1 w-full" id="guardspershift" name="guardspershift" :value="old('guardspershift')" required autofocus autocomplete="name" value="2"/>
                    </div> --}}

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