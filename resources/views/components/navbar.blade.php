    <nav x-data="{ open: false }" 
        @click.outside="open = false" 
        @scroll.window="open = false" 
        class="fixed top-0 left-0 right-0 lg:left-0 lg:right-0 text-white flex justify-between md:bg-black md:bg-opacity-50 bg-black items-center lg:px-5 py-3  bg-opacity-50 backdrop-blur-lg shadow-lg rounded-b-lg mx-auto z-50">
        <div :class="{'h-fit': open, 'h-0': ! open}" class="absolute w-full  lg:backdrop-blur-none bg-gray-500 bg-opacity-50 md:bg-opacity-0  rounded-xl mt-4 md:mt-1 top-14 overflow-hidden   md:relative md:h-fit md:top-0">
            <ul class=" flex text-md lg:text-lg flex-col gap-4 py-4 px-4 md:py-0  md:flex-row md:justify-center md:gap-0 ">
                    <li class="mx-3">
                        <a id="section1" class=" hover:text-white font-medium" href="/home">Home</a>
                    </li>
                    <li class="mx-2">
                        <a id="section2" class=" hover:text-white font-medium" href="#cars">Features</a>
                    </li>
                    <li class="mx-2">
                        <a id="section4" class=" hover:text-white font-medium" href="#partners">Partners</a>
                    </li>
                    <li class="mx-2">
                        <a id="section5" class=" hover:text-white font-medium" href="#contact">Contact Us</a>
                    </li>
                    <li class=" md:hidden">
                        <button
                            onclick="location.href='{{ route('login') }}'"
                            class="mx-3 whitespace-nowrap w-1/3 bg-opacity-30 bg-blue-400 hover:bg-blue-300 border-solid hover:font-bold text-white border-2 shadow-md hover:shadow-gray-600  focus:outline-none focus:ring-2  focus:ring-opacity-50 font-medium py-1 px-3 rounded-full transition duration-200 ease-in-out">
                            Log In
                        </button>
                    </li>
                    <li class=" md:hidden">
                        <button
                            onclick="location.href='{{ route('register') }}'"
                            class="mx-3 whitespace-nowrap w-1/2 bg-opacity-30 bg-green-400 hover:bg-green-300 border-solid hover:font-bold text-white border-2 shadow-md hover:shadow-gray-600  focus:outline-none focus:ring-2 focus:ring-opacity-50 font-medium py-1 px-3 rounded-full transition duration-200 ease-in-out">
                            Register
                        </button>
                    </li>
            </ul>
        </div>
        <div class="flex  md:justify-end">
            <div class="hidden md:flex">
                <button
                    onclick="location.href='{{ route('login') }}'"
                    class="mx-3 whitespace-nowrap border-solid hover:font-bold text-white border-2 shadow-md hover:shadow-gray-600  focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 font-medium py-2 px-4 rounded-lg transition duration-200 ease-in-out">
                    Log In
                </button>
                <button
                    onclick="location.href='{{ route('register') }}'"
                    class="mx-3 whitespace-nowrap border-solid hover:font-bold bg-green-500 text-white  shadow-md hover:shadow-gray-600  focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50 font-medium py-2 px-4 rounded-lg transition duration-200 ease-in-out">
                    Register
                </button>
            </div>
            <img @click="open = ! open" src="{{asset('storage/icons/hamburger-icon.svg') }}" class="text-3xl pr-5 cursor-pointer md:hidden"></img>
        </div>
    </nav>
