<button {{ $attributes->merge(['type' => 'submit', 'class' =>
     'inline-flex items-center px-4 py-2 
     bg-gray-800 bg-gray-200 border border-transparent 
     rounded-md font-semibold text-xs text-white text-gray-800 
     uppercase tracking-widest hover:bg-red-500 
    hover:bg-red focus:bg-gray-700 focus:bg-red 
     ctive:bg-gray-900 active:bg-gray-300 focus:outline-none
      focus:ring-2 focus:ring-red-300 focus:ring-offset-2
      focus:ring-offset-red-300 transition ease-in-out
       duration-150']) }}>
    {{ $slot }}
</button>
