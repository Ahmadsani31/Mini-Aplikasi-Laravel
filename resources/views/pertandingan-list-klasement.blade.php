<x-app-layout>
    <main class="p-4 md:ml-64 h-auto pt-20">
        <div class="border-2 rounded-lg mb-4">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="w-full">
                    <!-- Start coding here -->
                    <div class="relative overflow-hidden bg-white dark:bg-gray-800">
                        <div
                            class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                            <div>
                                <h5 class="mr-3 font-semibold dark:text-white">Klasement</h5>

                            </div>

                        </div>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Product name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        MA
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ME
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        S
                                    </th>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        K
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        GM
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        GK
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Point
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($point as $nama => $item)
                                @php
                                // dd($klasement[$nama]);
                                @endphp
                                @php
                                $me = [];
                                $se = [];
                                $ke = [];
                                @endphp
                                @foreach ($klasement[$nama] as $key)
                                @php
                                $main[$nama][] = $key;
                                @endphp
                                @if ($key[0] == 3)
                                @php
                                $me[] = $key;
                                @endphp
                                @elseif ($key[0] == 1)
                                @php
                                $se[] = $key;
                                @endphp
                                @elseif ($key[0] == 0)
                                @php
                                $ke[] = $key;
                                @endphp
                                @endif
                                @endforeach


                                @php
                                $goalMenang = 0;
                                if (isset($gm[$nama])) {
                                $goalMenang = array_sum($gm[$nama]);
                                }
                                $goalKalah = 0;
                                if (isset($gk[$nama])) {
                                $goalKalah = array_sum($gk[$nama]);
                                }
                                // dd($gm);
                                @endphp



                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4e">
                                        {{ $nama }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{count($main[$nama])}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ count($me) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ count($se) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ count($ke) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$goalMenang}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$goalKalah}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{array_sum($item)}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </main>
</x-app-layout>