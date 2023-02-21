@extends('layouts.masterapp')
@section('content')

{{-- display if status is 1(pending) --}}
@if ($contract->status == 1)
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <x-custom-back-button href="{{ route('jobrequest.index',['user_id'=>$user->id]) }}">
                {{ __('Back') }}
            </x-custom-back-button>
            <div class="border border-gray-200 dark:bg-gray-800 dark:border-gray-700 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <caption class="text-center p-2 text-2xl font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Job Request Details
                        <h1 class="mt-1 text-lg text-gray-500 dark:text-gray-400">
                            <strong>{{Auth::user()->name}}</strong> contract #{{$contract->id}}
                        </h1>
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                            @if ($contract->is_finished == 0)
                                Form not complete! Please finish request form.
                            @elseif ($contract->is_finished == 1)
                                Request is being evaluated by the admin    
                            @endif
                        </p>
                    </caption>
                </table>
            </div>

            <div class="p-4">
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-600">
                        Requested Start Date :
                    </p>
                    <h1 class="mb-3 text-lg tracking-tight text-gray-900 dark:text-white">
                        {{date("F jS, Y", strtotime($contract->start_date))}}
                    </h1>
                    <hr>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-600">
                        Expiration Date :
                    </p>
                    <h1 class="mb-3 text-lg tracking-tight text-gray-900 dark:text-white">
                        {{date("F jS, Y", strtotime($contract->end_date))}}
                    </h1>
                    <hr>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-600">
                        Daily Wage (Peso) :
                    </p>
                    <h1 class="mb-3 text-lg tracking-tight text-gray-900 dark:text-white">
                        ₱ {{$contract->daily_wage}}
                    </h1>
                </div> 
            </div>

            <div class="p-4">
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h1 class="text-center p-2 text-2xl font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Location
                    </h1>
                    <hr>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-600">
                        Location's Name :
                    </p>
                    <h1 class="mb-3 text-lg tracking-tight text-gray-900 dark:text-white">
                        {{$location->locations_name}}
                    </h1>
                    <hr>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-600">
                        Address :
                    </p>
                    <h1 class="mb-3 text-lg tracking-tight text-gray-900 dark:text-white">
                        {{$location->address}}
                    </h1>
                </div> 
            </div>

            <div class="p-4">
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h1 class="text-center p-2 text-2xl font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Posts
                    </h1>
                    <hr>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Guard Post Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Security Type
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
                            </tr>
                            @endforeach                  
                        </tbody>
                    </table>
                </div> 
            </div>

            <div class="p-4">
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h1 class="text-center p-2 text-2xl font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Client's Information
                    </h1>
                    <hr>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-600">
                        Client's Full Name :
                    </p>
                    <h1 class="mb-3 text-lg tracking-tight text-gray-900 dark:text-white">
                        {{$user->name." ".$user->last_name}}
                    </h1>
                    <hr>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-600">
                        Office/Organization Name :
                    </p>
                    <h1 class="mb-3 text-lg tracking-tight text-gray-900 dark:text-white">
                        {{$user->organization_name}}
                    </h1>
                    <hr>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-600">
                        Position in Office / Organization :
                    </p>
                    <h1 class="mb-3 text-lg tracking-tight text-gray-900 dark:text-white">
                        {{$user->position}}
                    </h1>
                </div> 
            </div>          

        </div>
    </div>
@endif


@endsection