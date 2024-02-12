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
                                <h5 class="mr-3 font-semibold dark:text-white">Data Klub</h5>

                            </div>
                            <a href="{{ route('pertandingan-list-add', ['id' => $pertandinganid, 'babak' => $babak]) }}"
                                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                </svg>
                                Tambah
                            </a>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                            role="alert">
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Note!</span>
                                <hr>
                                <ul class="max-w-md space-y-1 text-gray-800 list-disc list-inside dark:text-gray-400">
                                    <li>Warna Background <span class="bg-green-600 text-white">Green / Hijau</span>
                                        Menang</li>
                                    <li>Warna Background <span class="bg-red-600 text-white">Red / Merah</span> Kalah
                                    </li>
                                    <li>Warna Background <span class="bg-gray-500 text-white">Grey / Abu-Abu</span> Seri
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <form class="w-full" action="{{ route('pertandingan-point-store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="babak" value="{{ $babak }}">
                        @if ($list->isNotEmpty())


                        @foreach ($list as $item)
                        @php
                        if ($item->score_a > $item->score_b) {
                        $bg1 = 'bg-green-600';
                        $bg2 = 'bg-red-600';
                        } elseif ($item->score_b > $item->score_a) {
                        $bg1 = 'bg-red-600';
                        $bg2 = 'bg-green-600';
                        } else {
                        $bg1 = 'bg-gray-500';
                        $bg2 = 'bg-gray-500';
                        }

                        @endphp


                        <input type="hidden" name="id_p[]" value="{{ $item->id }}">
                        <input type="hidden" name="id_klub_a_{{ $item->id }}" value="{{ $item->ida }}">
                        <input type="hidden" name="id_klub_b_{{ $item->id }}" value="{{ $item->idb }}">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="p-2 text-center">
                                <div class="flex flex-col rounded-lg {{ $bg1 }} justify-betweend p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white ">
                                        {{ $item->namaa }}</h5>
                                    <div class="">
                                        <input type="number" name="klub_a_{{ $item->id }}" value="{{ $item->score_a }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Point pertandingan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 text-center">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        VS</h5>
                                </div>
                            </div>
                            <div class="p-2 text-center">
                                <div class="flex flex-col rounded-lg {{ $bg2 }} justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $item->namab }}</h5>
                                    <div class="">
                                        <input type="number" name="klub_b_{{ $item->id }}" value="{{ $item->score_b }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Point pertandingan" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                        <div class="p-2">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>

                        </div>
                        @else
                        <div class="p-2">
                            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Tidak ada data</span>, Silahkan klik tombol tambah
                                    untuk pertandingan
                                </div>
                            </div>
                        </div>
                        @endif



                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>