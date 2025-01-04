
<footer class="relative bg-gradient-to-r from-indigo-400 via-teal-500 to-red-300 bg-[length:200%] animate-gradient-background overflow-hidden text-white py-14">
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 text-sm mt-14 text-center md:text-left">

        <!-- Logo Section -->
        <div class="flex items-start justify-center md:col-span-1">
            <img  src="{{ asset('storage/landing/nowgo.png') }}" class="w-[240px] h-[80px]">
        </div>

        <div>
            <h4 class="uppercase font-bold text-xs sm:text-sm mb-3 tracking-wide text-gray-100">CONTACT</h4>
            <ul class="space-y-2 mb-16 sm:text-center md:text-left">
                <li>
                    <a href="#" class="footer-link mb-2 text-center sm:text-left transition-transform duration-200 transform hover:scale-110 hover:translate-x-2 hover:text-white">
                        <span class="arrow">></span> Email
                    </a>
                </li>
                <li>
                    <a href="#" class="footer-link mb-2 text-center sm:text-left transition-transform duration-200 transform hover:scale-110 hover:translate-x-2 hover:text-white">
                        <span class="arrow">></span> Phone number
                    </a>
                </li>
                <li>
                    <a href="#" class="footer-link mb-2 text-center sm:text-left transition-transform duration-200 transform hover:scale-110 hover:translate-x-2 hover:text-white">
                        <span class="arrow">></span> City
                    </a>
                </li>
            </ul>
        </div>

        <!-- Social Media Section -->
        <div>
            <h4 class="uppercase font-bold text-xs sm:text-sm mb-3 tracking-wide text-gray-100">SOCIAL MEDIA</h4>
            <ul class="space-y-2 mb-16 sm:text-center md:text-left">
                <li>
                    <a href="https://www.facebook.com" class="footer-link mb-2 text-center sm:text-left transition-transform duration-200 transform hover:scale-110 hover:translate-x-2 hover:text-white">
                        <span class="arrow">></span> Facebook
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com" class="footer-link mb-2 text-center sm:text-left transition-transform duration-200 transform hover:scale-110 hover:translate-x-2 hover:text-white">
                        <span class="arrow">></span> Instagram
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com" class="footer-link mb-2 text-center sm:text-left transition-transform duration-200 transform hover:scale-110 hover:translate-x-2 hover:text-white">
                        <span class="arrow">></span> LinkedIn
                    </a>
                </li>
            </ul>
        </div>

        <!-- Learn More Section -->
        <div>
            <h4 class="uppercase font-bold text-xs sm:text-sm mb-3 tracking-wide text-gray-100">LEARN MORE</h4>
            <ul class="space-y-2 mb-16 sm:text-center md:text-left">
                <li>
                    <a href="#" class="footer-link mb-2 text-center sm:text-left transition-transform duration-200 transform hover:scale-110 hover:translate-x-2 hover:text-white">
                        <span class="arrow">></span> Community
                    </a>
                </li>
                <li>
                    <a href="#" class="footer-link mb-2 text-center sm:text-left transition-transform duration-200 transform hover:scale-110 hover:translate-x-2 hover:text-white">
                        <span class="arrow">></span> Privacy Policy
                    </a>
                </li>
                <li>
                    <a href="#" class="footer-link mb-2 text-center sm:text-left transition-transform duration-200 transform hover:scale-110 hover:translate-x-2 hover:text-white">
                        <span class="arrow">></span> Terms Of Use
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="container mx-auto flex justify-center items-center w-full mb-3 text-xs border-t border-white-500 pt-8 footer-bottom">
        <div class="text-center w-full">
            <p>Copyright TRIP MATE. {{ date('Y') }}. All Rights Reserved.</p>
        </div>
    </div>

</footer>

