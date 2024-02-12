<div>
    @props(['active', 'icon','href'])

    @php
        $classes = $active ?? false
         ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 dark:border-indigo-600 text-start text-base font-medium text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/50 focus:outline-none focus:text-indigo-800 dark:focus:text-indigo-200 focus:bg-indigo-100 dark:focus:bg-indigo-900 focus:border-indigo-700 dark:focus:border-indigo-300 transition duration-150 ease-in-out'
         : 'flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 transition duration-150 ease-in-out';
    @endphp
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    <a href="{{$href}}" {{ $attributes->merge(['class' => $classes]) }}>
        <i class="{{ $icon }}"></i>
        <span class="ml-3">{{ $slot }}</span>
    </a>
</div>
