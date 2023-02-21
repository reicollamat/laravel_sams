@extends('layouts.masterapp')
@section('content')

<div class="p-4 sm:ml-64 mt-14">

    <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    {{$user_data->name}}'s Approved Requests
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">List of approved requests from Admin. Please click to review the contract and agree if satisfied</p>
                </caption>
            </table>

            {{-- display if status is 3(approved by admin) --}}
            @if ($contract->status == 3)
                @foreach ($contracts as $contract)
                    <div class="p-4">
                        <a href="#">
                            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <p class="font-normal text-sm text-gray-700 dark:text-gray-600">
                                    Contract ID :
                                </p>
                                <h1 class="mb-3 text-lg tracking-tight text-gray-900 dark:text-white">
                                    #{{$contract->id}}
                                </h1>
                                <hr>
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
                                    Number of Guards :
                                </p>
                                <h1 class="mb-3 text-lg tracking-tight text-gray-900 dark:text-white">
                                    {{$contract->number_of_guards}}
                                </h1>
                                <hr>
                                <p class="font-normal text-sm text-gray-700 dark:text-gray-600">
                                    Number of Post/s :
                                </p>
                                <h1 class="mb-3 text-lg tracking-tight text-gray-900 dark:text-white">
                                    {{count($contract->location->post)}}
                                </h1>
                            </div> 
                        </a>
                    </div>
                @endforeach
            @endif


        </div>
    </div>
</div>

@endsection