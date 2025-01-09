<section x-cloak>
    <div x-data="{
            open: false,
            selectedCountry: {
                name: '{{ config('localization.locales.' . app()->getLocale()) }}',
                flag: '{{ asset('images/flags/' . app()->getLocale() . '.png') }}',
            },
        }"
        class="relative w-34 mx-auto">
        <button class="w-full flex justify-between items-center px-4 py-2 bg-white text-black font-semibold rounded-lg shadow-lg border border-green-500 transform transition duration-300 sm:px-4 sm:py-2 text-sm">
            <div class="flex items-center space-x-2">
                <img :src="selectedCountry.flag" alt="" class="w-5 h-auto">
                <span class="block sm:hidden" x-text="selectedCountry.name.slice(0, 2)"></span>
                <span class="hidden sm:block" x-text="selectedCountry.name"></span>
            </div>
            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>

        <!-- Dropdown -->
        <div x-show="open" x-cloak @click.outside="open = false" 
            class="absolute min-w-[115px] mt-1 bg-white border border-gray-300 rounded-lg shadow-lg z-10 max-h-60 overflow-auto">
            @foreach ($available_locales as $locale_name => $available_locale)
                @if ($available_locale !== $current_locale)
                    <div @click="open = false; window.location.href = '{{ route('localization', $available_locale) }}';"
                        class="cursor-pointer px-2 py-1 hover:bg-orange-400 hover:text-white flex items-center space-x-2 transition duration-150 ease-in-out">
                        <img src="{{ asset('images/flags/' . $available_locale . '.png') }}" alt="{{ $locale_name }}" class="w-5 h-auto">
                        <span class="hidden sm:block text-base">{{ $locale_name }}</span>
                        <span class="block sm:hidden text-sm">{{ substr($locale_name, 0, 2) }}</span>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
