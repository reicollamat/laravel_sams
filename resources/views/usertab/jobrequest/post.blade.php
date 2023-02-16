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
            <caption class="p-2 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Add Post
            </caption>
            </table>
        </div>
    
        <form method="POST" action="{{ route('jobrequest.storepost', ['location_id'=>$location_id]) }}">
            @csrf
            <div class="mt-4 ">
                {{-- input post --}}
                <div>
                    <x-input-label for="place" :value="__('Post Name')" />
                    <x-text-input type="text" class="block mt-1 w-full" id="place" name="place" :value="old('place')" required autofocus autocomplete="name" />
                    <p id="floating_helper_text" class="mt-2 text-xs text-gray-500 dark:text-gray-400">Please insert post here.</p>
                </div>

                {{-- check if is armed --}}
                <div class="mt-4 flex">
                    <div class="flex items-center h-5">
                        <input name="is_armed" id="is_armed" aria-describedby="helper-checkbox-text" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="is_armed" class="font-medium text-gray-900 dark:text-gray-300">
                            <strong class="text-blue-600 dark:text-blue-500">Armed</strong> Security Guards
                        </label>
                        <p id="helper-checkbox-text" class="text-xs text-gray-500 dark:text-gray-400">Check to require armed guards on this post</p>
                    </div>
                </div>
            </div>

            <div class="mt-4 ">
                <x-custom-primary-button>
                    Add Post
                </x-custom-primary-button>
            </div>
        </form>


        {{-- temporary table display --}}
        <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Posts Table for {{ $locations->locations_name }}
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet
                        consectetur, adipisicing elit. Nesciunt autem quisquam voluptatum culpa dolor.</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Guard Post Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Security Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Number of Guards
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="">Remove Post</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post['place'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $post['is_armed'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{-- # of guards --}}
                            {{ $post['remarks'] }} 
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('jobrequest.shift', ['location_id'=>$location_id, 'post_id'=>$post['id']]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Remove</a>
                        </td>
                    </tr>
                    @endforeach                    
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">                        
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
