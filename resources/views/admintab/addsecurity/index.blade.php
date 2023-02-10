@extends('layouts.masterapp')
@section('content')
<div class="p-4 sm:ml-64 mt-14">

    <div class="relative overflow-x-auto border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

        <div class="p-3 w-full flex justify-center">
            <form action="/securityguard/add">
                <button
                class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span
                        class="relative px-6 py-3.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Add Security Guard
                    </span>
                </button>
            </form>
        </div>
    </div>
    <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">

        <div class="relative overflow-x-auto">
            @if (count($guards) > 0)
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Security Guard Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Age
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
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $guard->first_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $guard->sex }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $guard->birthdate }}
                        </td>
                        <td class="px-6 py-4">
                            <a class="text-blue-600" href="#">View / Edit</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                @else
                <h1 class="w-full py-7 text-2xl text-center text-gray-500 dark:text-gray-400">No Guards Found!</h1>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection