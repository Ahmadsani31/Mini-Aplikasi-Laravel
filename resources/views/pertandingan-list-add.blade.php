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
                                <h5 class="mr-3 font-semibold dark:text-white">Tambah Pertandingan</h5>

                            </div>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('errors'))
                    <div class="px-3">
                        <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">{{ $message }}</span>
                            </div>
                        </div>
                    </div>
                @endif
                <hr>
                <form action="{{ route('pertandingan-list-store') }}" method="POST" class="w-full p-5">
                    @csrf
                    <input type="hidden" name="pertandinganid" value="{{$pertandinganid}}">
                    <input type="hidden" name="babak" value="{{$babak}}">
                    <div class="mb-5">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Klub</label>
                        <select id="countries" name="klub_a" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Choose Klup</option>
                            @foreach ($klub as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Lawan
                            Klub</label>
                        <select id="countries" name="klub_b" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Choose Klup</option>
                            @foreach ($klub as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </form>

            </div>
        </div>
    </main>
</x-app-layout>
