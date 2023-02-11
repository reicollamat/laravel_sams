<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-2">
    {{-- temporary table display --}}

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead
                class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            <tr>
                <th class="p-4 w-1/4">
                    <div>
                        <div class="mt-1 w-full flex justify-center">
                                <a {{ $attributes->merge() }}
                                    class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                        <span
                                            class="relative px-6 py-3.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            {{ $slot }}
                                        </span>
                                </a>
                        </div>
                    </div>
                </th>
                <th {{ $heading->attributes->merge(['class' => 'font-bold' ]) }} >
                    {{ $heading }}
                    <p {{ $body->attributes->merge(['class' => 'mt-1 text-sm font-normal text-gray-500 dark:text-gray-400' ]) }} >
                        {{ $body }}
                    </p>
                </th>
            </tr>
            </thead>

        </table>
    </div>

</div>
