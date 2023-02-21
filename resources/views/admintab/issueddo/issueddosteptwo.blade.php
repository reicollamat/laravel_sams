@extends('layouts.mainlayout')
@section('content')
    {{-- {{ dd($loc_id,$post_id,$data) }} --}}
    <div class="p-4 mt-14">
        <form action="#" method="POST">
            <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">

                {{-- client info detail --}}
                <div
                    class="w-full mt-2 p-3 rounded-lg shadow-md uppercase text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <x-custom-back-button href="{{ url()->previous() }}">
                        {{ _('Back') }}
                    </x-custom-back-button>
                </div>
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
                    <div class="flex flex-col mt-4 sm:justify-evenly sm:flex-row">
                        <div>
                            <p class="text-xl">Conttract Shift Per Day</p>
                            <div class="mt-2 w-full md:mb-0">
                                <x-input-label for="phone_number" :value="__('')" class="w-full" />
                                <input
                                    class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 "
                                    id="phone_number" type="text" name="phone_number" value="{{ $shift_count }}"
                                    disabled :value="{{ $shift_count }}" />

                            </div>
                        </div>
                        <div>
                            <div class="mt-4 flex gap-10 sm:mt-0">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($shift_time as $time)
                                    @php
                                        $i++;
                                    @endphp
                                    <div>
                                        <p class="text-xl">Shift {{ $i }} : Starting : Ending</p>
                                        <div class="mt-2 w-full md:mb-0">
                                            <x-input-label for="phone_number" :value="__('')" class="w-full" />
                                            <input
                                                class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 "
                                                id="phone_number" type="text" name="phone_number"
                                                value="{{ $time->start_time . ' To ' . $time->end_time }}" disabled
                                                :value="{{ $shift_count }}" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                    </div>
                    <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                    <div>
                        <table class="mt-4 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Location Post Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Location Post Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Is Armed
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Assign Guard
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Assign Gun
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($posts as $post)
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $post->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $post->place }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{-- {{ $post->is_armed }} --}}
                                            @if ($post->is_armed)
                                                True
                                            @else
                                                False
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300"
                                                for="sex">
                                            </label>
                                            <div class="relative">
                                                <select
                                                    class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8"
                                                    id="assign_guard" name="assign_guard" :value="old('assign_guard')"
                                                    required autocomplete="">
                                                    <option value="" disabled selected>Select</option>
                                                    @foreach ($guard_lists as $guard_list)
                                                        <option value="{{ $guard_list->id }}">
                                                            {{ $guard_list->first_name . " " .$guard_list->last_name }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('assign_guard')" class="mt-2" />
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300"
                                                for="sex">
                                            </label>
                                            <div class="relative">
                                                <select
                                                    class="block appearance-none w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-3 px-4 pr-8"
                                                    id="assign_gun" name="assign_gun" :value="old('assign_gun')" required
                                                    autocomplete="">
                                                    <option value="" disabled selected>Select</option>
                                                    @foreach ($firearm_lists as $firearm_list)
                                                        <option value="{{ $firearm_list->id }}">
                                                            {{ $firearm_list->kind . " " .$firearm_list->caliber }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('assign_gun')" class="mt-2" />
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="w-full mt-6 flex justify-center">
                        
                        <x-custom-clear-button>
                            {{ __('Reset') }}
                        </x-custom-clear-button>
                        <x-custom-primary-button>
                            {{ __('Save') }}
                        </x-custom-primary-button>
                    </div>

                </div>
        </form>
    </div>
@endsection
