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
                                <h5 class="mr-3 font-semibold dark:text-white">Tamba Data Klub</h5>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <form action="{{ route('klub-store') }}" method="POST" class="w-full p-5">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="mb-5">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" id="nama" name="name" value="{{$nama}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nama" required>
                    </div>
                    <div class="mb-5">
                        <label for="kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                        <input type="text" id="kota" name="kota" value="{{$kota}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Kota"  required>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </form>

            </div>
        </div>
    </main>
</x-app-layout>
