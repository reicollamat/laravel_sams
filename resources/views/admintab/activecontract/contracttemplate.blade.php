@extends('layouts.masterapp')
@section('content')
    @foreach ($contract_infos as $contract_info)
        <div class="p-4 sm:ml-64 mt-14">
            <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-7">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="py-3 flex self-center content-center items-center">
                        <x-custom-back-button class="mx-4" href="{{ route('indexactivecontract') }}">
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
                        <p class="py-3">This AGREEMENT is made and entered into the
                            {{ date('F jS, Y', strtotime($contract_info->approved_date)) }} by and between <span
                                class="underline uppercase">{{ $contract_info->name . ' ' . $contract_info->last_name }}</span>
                            and Security Agency Management System (SAMS), effective on <br>
                            <span
                                class="underline uppercase font-black">{{ date('F jS, Y', strtotime($contract_info->start_date)) }}</span>
                            until <span
                                class="underline uppercase font-black">{{ date('F jS, Y', strtotime($contract_info->end_date)) }}
                            </span>
                        </p>
                    </div>
                    <div>
                        <ol class="px-12 list-decimal text-justify">
                            <li class="pt-8 text-sm">
                                The Security Agency. shall furnish security guard(s) at the premises located at the
                                following
                                area of responsibilities ( Section II). The guard(s) will be in uniform and armed, unless
                                stated
                                otherwise. They will provide security to persons and property in the premises. All services
                                shall be performed in accordance with applicable laws and ordinances.
                            </li>
                            <li class="pt-8 text-sm">
                                The Guard(s) shall be employees of the Contractor. The Contractor shall be responsible for
                                the hiring, supervision, scheduling, and compensation of the Guard(s). The Guard(s) shall
                                not for any purpose be deemed to be employees of the Client
                            </li>
                            <li class="pt-8 text-sm">
                                The Contractor agrees to indemnify and hold harmless the Client, its affiliates, officers,
                                directors, employees and agents from all liability and damages, including cost of defense
                                and reasonable attorneys' fees, which it or they may incur as a result of injury or damages
                                sustained by any person arising out of the negligence or misconduct of the Contractor, its
                                employees, or agents. The liability of the Contractor to the Client, its affiliates,
                                officers, directors, employees, and agents shall be limited to One Million Philippine Pesos
                                (₱1,000,000.00)
                                per occurrence, with a Two Million Philippine Pesos (₱2,000,000.00) annual
                                aggregate.
                            </li>
                            <li class="pt-8 text-sm">
                                The Contractor shall maintain comprehensive general liability insurance on an occurrence
                                basis, covering itself and its employees performing services pursuant to this Agreement in
                                the minimum amounts of One Million Philippine Pesos (₱1,000,000.00) per occurrence, with a
                                Two Million Philippine Pesos (₱2,000,000.00) annual aggregate, with coverage for contractual
                                liability. The Contractor shall also maintain workers’ compensation insurance for its
                                employees. Prior to the performance of services pursuant to this Agreement, the Contractor
                                or its insurer will provide the Client with a Certificate of Insurance showing that such
                                coverages are in effect.
                            </li>
                            <li class="pt-8 text-sm">
                                The Client shall provide details of their Social Security System details for insurance and a
                                copy of their latest NBI Clearance to certify that the client is not involved in any pending
                                criminal proceedings in the Philippines at the time of submission.
                            </li>
                        </ol>
                    </div>
                    <div class="pt-6 text-center font-bold text-lg">
                        <p class="py-3">Section 2</p>
                        <p class="py-3">Scope of Responsibilities</p>
                        <table class="w-full border-4">
                            <tr>
                                <th class="border-4">Location</th>
                                <th class="border-4">Address</th>
                                <th class="border-4">Posts</th>
                                <th class="border-4">Total Number Of Guards</th>
                            </tr>
                            {{-- posts --}}
                            @php
                                $numofpost = count($posts);
                                // echo $numofpost;
                            @endphp
                            <tr>
                                <td class="border">{{ $contract_info->locations_name }}</td>
                                <td class="border">{{ $contract_info->address }}</td>
                                <td class="border">{{ $numofpost }}</td>
                                <td class="border">{{ $contract_info->number_of_guards * $numofpost }}</td>
                            </tr>

                        </table>
                    </div>
                    <div class="px-12 list-decimal text-justify ">
                        <div class="pt-6 text-center font-bold text-lg">
                            <p class="py-3">Section 2.3</p>
                            <p class="py-3">Salary System</p>
                            <p> The salary System are adjusted base on the current year, such values may change when there is holiday, day-off, and any other special non-working holiday</p>
                            <table class="w-full mt-3 border-4">
                                <tr>
                                    <th class="border-4">Daily Wage</th>
                                    <th class="border-4">Quarterly Wage</th>
                                    <th class="border-4">Annually Wage</th>
                                </tr>
                                <tr>
                                    <td class="border">{{ $contract_info->daily_wage }}</td>
                                    <td class="border">{{ number_format($contract_info->daily_wage * 91,2,',','.')  }} Php</td>
                                    <td class="border">{{ number_format($contract_info->daily_wage * 260,2,',','.')  }} Php</td>
                                </tr>
    
                            </table>
                        </div>
                    </div>
                    <div class="pt-6 text-center font-bold text-lg">
                        <p class="py-3">Section 2.2</p>
                        <p class="py-3">Post Locations</p>
                        <table class="w-full border-4">
                            <tr>
                                <th class="border-4">Post Specific Location</th>
                            </tr>
                            {{-- posts --}}
                            @php
                                $numofpost = count($posts);
                                // echo $numofpost;
                            @endphp
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="border flex flex-row">
                                        <span class="w-full underline ">
                                            {{ $post->place }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="pt-6 text-center font-bold text-lg">
                        <p class="py-3">Section 2.3</p>
                        <p class="py-3">Post Guard</p>
                        <table class="w-full border-4">
                            <tr>
                                <th class="border-4">Post Specific Location</th>
                            </tr>
                            {{-- posts --}}
                            @php
                                $numofpost = count($posts);
                                // echo $numofpost;
                            @endphp
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="border flex flex-row">
                                        <span class="w-full underline ">
                                            {{ $post->place }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{-- curr_designations --}}
                    
                    <div class="pt-6 text-center font-bold text-lg">
                        <p class="py-3">Section 2.4</p>
                        <p class="py-3">Assigned Guard</p>
                        <table class="w-full border-4">
                            <tr>
                                <th class="border-4">Guard Name</th>
                                <th class="border-4">Is_armed</th>
                                <th class="border-4">Ballistics information</th>
                            </tr>
                            <tr>
                                @foreach ($curr_designations as $curr_designation)
                                @foreach ($posts as $post)
                                <td class="border">
                                    <span class="w-full underline ">
                                        {{ $curr_designation->first_name ." " . $curr_designation->last_name}}
                                    </span>
                                </td>
                                <td class="border">
                                    {{ $post->is_armed }}
                                </td>
                                <td class="border">
                                    {{ $curr_designation->kind ." / " . $curr_designation->caliber . " / " . $curr_designation->fas_SN}}
                                </td>
                                @endforeach
                                @endforeach

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
                                Personnel have at least three (3) years of experience in providing security services to a
                                government agency.
                            </li>
                            <li class="pt-8 text-md">
                                Personnel are members of the Philippine Association of Detective and Protective Agency
                                Operators (PADPAO) in good and active standing;
                            </li>
                            <li class="pt-8 text-md">
                                Personnel are duly licensed and registered Service Contractor with the Department of Labor
                                and Employment;
                            </li>
                            <li class="pt-8 text-md">
                                Personnel are duly registered with the Securities and Exchange Commission, Department of
                                Trade and Industry, or Cooperative Development Authority;
                            </li>
                            <li class="pt-8 text-md">
                                Personnel are duly registered with the Social Security System (SSS), Home Development;
                                Mutual Fund (PAGIBIG) and Philippine Health Insurance Corporation (PHILHEALTH).
                            </li>
                            <li class="pt-8 text-md">
                                Personnel are duly registered with the Bureau of Internal Revenue; Net Financial Contracting
                                Capacity at least equal to the ABC or Committed Line of Credit at least equal to 10% of ABC;
                                and
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
                                Payments shall be made on a monthly basis, until the 31st of December 2022, subject to
                                submission of billing statement and other supporting documents by the Contractor. Services
                                shall only be billed based on the actual services rendered to the Client; hence, may be
                                computed by a fraction of a month,
                            </li>
                            <li class="pt-8 text-md">
                                Should there be any wage or mandated benefit (e.g. SSS, PAG-IBIG and PHILHEALTH) increase in
                                favor of the assigned security personnel subsequent to the execution of the Contract
                                pursuant to a Law, Executive Order, Decree, or Wage Order, the Contractor must inform the
                                Client in writing of the wage increase to allow the latter to undertake the appropriate
                                measures to address the same before its implementation, subject to the accounting and
                                auditing rules and regulations and upon showing actual payment made to their employees.
                            </li>
                            <li class="pt-8 text-md">
                                The Contractor shall furnish with the Client the monthly billing, together with copies of
                                payroll, remittances (with official receipt of SSS, PAG-IBIG and PHILHEALTH) and other state
                                insurance fund contributions for all security personnel assigned, every 15th of the month.
                                Should the Contractor fail to comply, the Client shall withhold the payment for the current
                                month until the latter shall have complied with subject requirement.
                            </li>
                        </ol>
                    </div>
                    <div class="pt-9 text-center font-bold text-lg">
                        <p class="py-3">Section 5</p>
                        <p class="py-3">Authored By</p>
                    </div>
                    <div class=" w-full flex justify-center px-12 text-xl">
                        <h1 class=" underline uppercase font-black ">{{ $contract_info->operations_manager }}</h1>
                    </div>
                    <div class=" w-full flex justify-center px-12">
                        <p class="">Current Administrator and Operation Manager</p>
                    </div>
                    <div class="pt-9 text-center font-bold text-lg">
                        <p class="py-3">Section 6</p>
                        <p class="py-3">Work Schedule</p>

                        {{-- dito ka --}}



                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
