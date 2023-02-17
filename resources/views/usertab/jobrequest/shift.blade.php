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


        <form method="POST" action="{{ route('jobrequest.storeshift', ['post_id'=>$post_id]) }}">
            @csrf

            <div class="mt-4 ">
                <div class="columns-1 md:columns-2 mt-4">

                    {{-- input day start --}}
                    <div>
                        <x-input-label for="startday" :value="__('Day Start')" />
                        <select class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-500 dark:text-gray-400 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8" id="startday" name="startday" :value="old('startday')" required autocomplete="name">
                            <option value="" disabled selected>Select Starting Day</option>
                            <option value="1">Monday</option>
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
                            <option value="" disabled selected>Select Ending Day</option>
                            <option value="1">Monday</option>
                            <option value="2">Tuesday</option>
                            <option value="3">Wednesday</option>
                            <option value="4">Thusday</option>
                            <option value="5">Friday</option>
                            <option value="6">Saturday</option>
                            <option value="7">Sunday</option>
                        </select>
                    </div>

                </div>

                <div class="columns-1 md:columns-2 mt-4">

                    {{-- input no. of shifts --}}
                    <div>
                        <x-input-label for="locations_name" :value="__('Number of Shifts (1-3)')" />
                        <x-text-input type="number" class="block mt-1 w-full" id="locations_name" name="locations_name" :value="old('locations_name')" required autofocus autocomplete="name" min="1" max="3"/>
                    </div>
    
                    {{-- input working hrs --}}
                    <div>
                        <x-input-label for="address" :value="__('Working Hours')" />
                        <select class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-500 dark:text-gray-400 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8" id="startday" name="startday" :value="old('startday')" required autocomplete="name">
                            <option value="" disabled selected>Select Working Hours</option>
                            <option value="1">8 Hours</option>
                            <option value="2">12 Hours</option>
                        </select>
                    </div>

                </div>

                <div class="columns-1 md:columns-2 mt-4">

                    {{-- input rotation start --}}
                    <div>
                        <x-input-label for="locations_name" :value="__('Rotation Start (1-12)')" />
                        <x-text-input type="number" class="block mt-1 w-full" id="locations_name" name="locations_name" :value="old('locations_name')" required autofocus autocomplete="name" min="1" max="12" />
                    </div>
    
                    {{-- input no. of guards per shift --}}
                    <div>
                        <x-input-label for="address" :value="__('Number of Guards per Shift')" />
                        <x-text-input type="number" class="block mt-1 w-full" id="address" name="address" :value="old('address')" required autofocus autocomplete="name" />
                    </div>

                </div>

            </div>

            <div class="mt-4 ">
                <x-custom-primary-button>
                    Confirm
                </x-custom-primary-button>
            </div>
        </form>

        {{-- temporary table display --}}
        <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Schedule for Post #{{ $post_id }}
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet
                        consectetur, adipisicing elit. Nesciunt autem quisquam voluptatum culpa dolor.</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection