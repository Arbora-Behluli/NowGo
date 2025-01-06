@guest
<x-app-layout>
    <x-banner
        title="Welcome to Our Platform"
        description="Discover new experiences with us."
        button-text="Learn More"
        button-link="/about"
    />
    <x-cars />
    <x-partners />
    <x-safety />
    <x-contact />
    <x-swiper />
</x-app-layout>
@if (!Auth::check() && request()->is('/') || request()->is('home'))
<x-footer />
@endif
@endguest
