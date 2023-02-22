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
                                <span class="text-red-600">
                                    Request is being evaluated by the admin    
                                </span>
                            @endif
                        </p>
                    </caption>
                </table>
            </div>

            <div class="p-4 text-center">
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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

            <div class="p-4 text-center">
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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

            <div class="p-4 text-center">
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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

            <div class="p-4 text-center">
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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

@if ($contract->status == 2)
    <div class="p-4 sm:ml-64 mt-14">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="py-3 flex self-center content-center items-center">
                    <x-custom-back-button class="mx-4" href="{{ route('jobrequest.index',['user_id'=>$user->id]) }}">
                        {{ __('Back') }}
                    </x-custom-back-button>
                    <p class="ml-3 font-bold text-2xl text-gray-900 dark:text-gray-100">
                        Contract Details
                    </p>

                </div>
            </div>
        </div>
        <div class="border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-7">
            <div class="w-full border-2 rounded-lg px-20 border-black bg-white dark:bg-white">
                <div class="flex justify-center">
                    <h1 class="py-6 font-bold text-2xl">Security Services Agreement Contract</h1>
                </div>
                <div class="text-center font-bold text-lg">
                    <p class="py-3">Section 1</p>
                    <p class="py-3">Scope of Responsibilities</p>
                    <p class="py-3">This AGREEMENT is made and entered into the Day of Aug. 10, 2022 by and between <span
                            class="underline">{{ __(auth()->user()->name) }}</span> and SIKYUrity Agency, effective on Aug.
                        20, 2022 until Aug. 20, 2028</p>
                </div>
                <div>
                    <ol class="px-12 list-decimal text-justify">
                        <li class="pt-8 text-sm">
                            The SIKYUrity Agency. shall furnish security guard(s) at the premises located at the following
                            area of responsibilities ( Section II). The guard(s) will be in uniform and armed, unless stated
                            otherwise. They will provide security to persons and property in the premises. All services
                            shall be performed in accordance with applicable laws and ordinances.
                        </li>
                        <li class="pt-8 text-sm">
                            The Guard(s) shall be employees of the Contractor. The Contractor shall be responsible for the hiring, supervision, scheduling, and compensation of the Guard(s). The Guard(s) shall not for any purpose be deemed to be employees of the Client
                        </li>
                        <li class="pt-8 text-sm">
                            The Contractor agrees to indemnify and hold harmless the Client, its affiliates, officers, directors, employees and agents from all liability and damages, including cost of defense and reasonable attorneys' fees, which it or they may incur as a result of injury or damages sustained by any person arising out of the negligence or misconduct of the Contractor, its employees, or agents. The liability of the Contractor to the Client, its affiliates, officers, directors, employees, and agents shall be limited to One Million Philippine Pesos (₱1,000,000.00) per occurrence, with a Two Million Philippine Pesos (₱2,000,000.00) annual aggregate.
                        </li>
                        <li class="pt-8 text-sm">
                            The Contractor shall maintain comprehensive general liability insurance on an occurrence basis, covering itself and its employees performing services pursuant to this Agreement in the minimum amounts of One Million Philippine Pesos (₱1,000,000.00) per occurrence, with a Two Million Philippine Pesos (₱2,000,000.00) annual aggregate, with coverage for contractual liability. The Contractor shall also maintain workers’ compensation insurance for its employees. Prior to the performance of services pursuant to this Agreement, the Contractor or its insurer will provide the Client with a Certificate of Insurance showing that such coverages are in effect.
                        </li>
                        <li class="pt-8 text-sm">
                            The Client shall provide details of their Social Security System details for insurance and a copy of their latest NBI Clearance to certify that the client is not involved in any pending criminal proceedings in the Philippines at the time of submission.
                        </li>
                    </ol>
                </div>
                <div class="pt-6 text-center font-bold text-lg">
                    <p class="py-3">Section 2</p>
                    <p class="py-3">Scope of Responsibilities</p>
                    <table class="w-full border-4">
                        <tr >
                            <th class="border-4">Location</th>
                            <th class="border-4">Address</th>
                            <th class="border-4">Total Number Of Guards</th>
                        </tr>
                        <tr>
                            <td class="border">Alfreds Futterkiste</td>
                            <td class="border">Maria Anders</td>
                            <td class="border">Germany</td>
                        </tr>
                    </table>
                </div>
                <div class="pt-9 text-center font-bold text-lg">
                    <p class="py-3">Section 3</p>
                    <p class="py-3">Qualifications of the Service Provider</p>
                    <p class="py-3 font-normal text-left">The qualifications of the contractor are:</p>
                </div>
                <div>
                    <ol class="px-12 list-disc text-justify" type="A">
                        <li class="pt-3 text-md">
                            Personnel have at least three (3) years of experience in providing security services to a government agency.
                        </li>
                        <li class="pt-8 text-md">
                            Personnel are members of the Philippine Association of Detective and Protective Agency Operators (PADPAO) in good and active standing;
                        </li>
                        <li class="pt-8 text-md">
                            Personnel are duly licensed and registered Service Contractor with the Department of Labor and Employment;
                        </li>
                        <li class="pt-8 text-md">
                            Personnel are duly registered with the Securities and Exchange Commission, Department of Trade and Industry, or Cooperative Development Authority;
                        </li>
                        <li class="pt-8 text-md">
                            Personnel are duly registered with the Social Security System (SSS), Home Development; Mutual Fund (PAGIBIG) and Philippine Health Insurance Corporation (PHILHEALTH).
                        </li>
                        <li class="pt-8 text-md">
                            Personnel are duly registered with the Bureau of Internal Revenue; Net Financial Contracting Capacity at least equal to the ABC or Committed Line of Credit at least equal to 10% of ABC; and
                        </li>
                        
                    </ol>
                </div>
                <div class="pt-9 text-center font-bold text-lg">
                    <p class="py-3">Section 4</p>
                    <p class="py-3">Terms of Payment</p>
                </div>
                <div>
                    <ol class="px-12 list-disc text-justify" type="A">
                        <li class="pt-3 text-md">
                            Payments shall be made on a monthly basis, until the 31st of December 2022, subject to submission of billing statement and other supporting documents by the Contractor. Services shall only be billed based on the actual services rendered to the Client; hence, may be computed by a fraction of a month,
                        </li>
                        <li class="pt-8 text-md">
                            Should there be any wage or mandated benefit (e.g. SSS, PAG-IBIG and PHILHEALTH) increase in favor of the assigned security personnel subsequent to the execution of the Contract pursuant to a Law, Executive Order, Decree, or Wage Order, the Contractor must inform the Client in writing of the wage increase to allow the latter to undertake the appropriate measures to address the same before its implementation, subject to the accounting and auditing rules and regulations and upon showing actual payment made to their employees.
                        </li>
                        <li class="pt-8 text-md">
                            The Contractor shall furnish with the Client the monthly billing, together with copies of payroll, remittances (with official receipt of SSS, PAG-IBIG and PHILHEALTH) and other state insurance fund contributions for all security personnel assigned, every 15th of the month. Should the Contractor fail to comply, the Client shall withhold the payment for the current month until the latter shall have complied with subject requirement.
                        </li>
                    </ol>
                </div>
                <div class="pt-9 text-center font-bold text-lg">
                    <p class="py-3">Section 5</p>
                    <p class="py-3">Work Schedule</p>
                </div>
            </div>
            {{-- if agree = status = 3 --}}
            <form method="POST" action="{{ route('jobrequest.clientapprove') }}">
                @csrf
                <div class="mt-4 text-center">
                    <x-custom-primary-button>
                        I AGREE
                    </x-custom-primary-button>
    
                    <input type="number" name="contract_id" value="{{$contract->id}}" hidden>
                    <input type="number" name="status" value="3" hidden>
    
                </div>
            </form>
            {{-- if agree = status = 5 --}}
            <form method="POST" action="{{ route('jobrequest.clientapprove') }}">
                @csrf
                <div class="mt-4 text-center">
                    <x-custom-primary-button>
                        <span class="text-red-600">
                            I DISAGREE
                        </span>
                    </x-custom-primary-button>
    
                    <input type="number" name="contract_id" value="{{$contract->id}}" hidden>
                    <input type="number" name="status" value="5" hidden>
    
                </div>
            </form>
        </div>
    </div>
@endif


@endsection