@extends('layouts.masterapp')
@section('content')
    <div class="p-4 sm:ml-64 mt-14">

        <x-custom-button href="{{ route('createsecurityguard') }}">
            {{ __('+ Security Guard') }}
            <x-slot name="heading" class="">
                {{ __('Add to Security Guard') }}
                <x-slot name="body" class="">
                    {{ __('Let\'s you add providing some basic information') }}
                </x-slot>
            </x-slot>
        </x-custom-button>

        <x-search-bar action="{{ route('searchsecurityguard') }}" method="GET">
            <x-slot name="anchor" href="{{ route('indexsecurityguard') }}">

            </x-slot>
        </x-search-bar>

        <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-4">

            <div class="relative overflow-x-auto">
                @if (count($s_guards) > 0)
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Security Guard Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sex
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    View
                                </th>
                            </tr>
                        </thead>
                        @foreach ($s_guards as $s_guard)
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $s_guard->first_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        @if ($s_guard->sex === 'M')
                                            Male
                                        @elseif ($s_guard->sex === 'F')
                                            Female
                                        @else
                                            Unknown
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $s_guard->birthdate }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="text-blue-600" href="/securityguard/{{ $s_guard->id }}/show">View
                                            Information</a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                @endif
                @if (count($guards) > 0)
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Security Guard Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sex
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    View
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guards as $guard)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $guard->first_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        @if ($guard->sex === 'M')
                                            Male
                                        @elseif ($guard->sex === 'F')
                                            Female
                                        @else
                                            Unknown
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $guard->birthdate }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="text-blue-600" href="/securityguard/{{ $guard->id }}/show">View
                                            Information</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        @if (count($s_guards) > 0)
                            <h1 class="w-full py-2 text-xl text-center text-gray-500 dark:text-gray-400">Found
                                {{ count($s_guards) . ' Results' }}</h1>
                        @else
                            <h1 class="w-full py-7 text-2xl text-center text-gray-500 dark:text-gray-400">No Guards
                                Found!</h1>
                        @endif
                    </table>
                @endif
            </div>

        </div>

    </div>
    <div class="relative w-full mb-3">
        @if (count($guards) > 0)
            {{ $guards->links('pagination::tailwind') }}
        @endif
    </div>

@endsection
