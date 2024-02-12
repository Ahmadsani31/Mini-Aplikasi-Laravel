<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">

        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-base font-medium {{ request()->routeIs('dashboard') ?? false ? ' bg-blue-700 text-white hover:bg-blue-800' : 'text-gray-900 hover:bg-gray-100'  }}  rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 {{ request()->routeIs('dashboard') ?? false ? ' text-gray-100' : ' text-gray-500' }} transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('klub') }}"
                    class="flex items-center p-2 text-base font-medium {{ request()->segments()[0] =='klub' ?? false ? ' bg-blue-700 text-white hover:bg-blue-800' : 'text-gray-900 hover:bg-gray-100' }}  rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M5 3a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V7c0-.6-.4-1-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4c0-.6.4-1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3c0 .6.4 1 1 1h3c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H7Zm1 3V8h1v1H8Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="ml-3">Klup</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pertandingan') }}"
                    class="flex items-center p-2 text-base font-medium {{ request()->segments()[0] == 'pertandingan' ?? false ? ' bg-blue-700 text-white hover:bg-blue-800' : 'text-gray-900 hover:bg-gray-100' }}  rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M5 3a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V7c0-.6-.4-1-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4c0-.6.4-1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3c0 .6.4 1 1 1h3c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H7Zm1 3V8h1v1H8Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="ml-3">Pertandingan</span>
                </a>
            </li>

        </ul>

    </div>

</aside>