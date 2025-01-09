<x-app-layout>
    <div class=" min-h-screen ">
    <div class="container mx-auto px-4 py-6   bg-[#85a98f]  ">

  <h1 class="text-3xl font-bold text-white p-6"> {{ __('messages.Drives Of') . ' ' . auth()->user()->name }}</h1>
        

        {{-- Butonat --}}
        <div class="w-full flex justify-center items-center mb-3 mt-5">
            <button onclick="filterBookings('all')"
              class="min-w-16 sm:min-w-24 px-2 sm:px-4 py-1 sm:py-1 relative overflow-hidden rounded-full bg-[#a5b8bd] text-white border-none cursor-pointer before:absolute before:top-0 before:left-0 before:w-full before:h-full before:rounded-full before:bg-gradient-to-r before:from-orange-300 before:to-orange-500 before:scale-x-0 before:origin-left before:transition-transform before:duration-500 hover:before:scale-x-100 mr-2">
              <span class="relative z-10">{{ __('messages.All') }}</span>
            </button>
          
            <button onclick="filterBookings('paid')"
              class="min-w-16 sm:min-w-24 px-2 sm:px-4 py-1 sm:py-1 relative overflow-hidden rounded-full bg-[#a5b8bd] text-white border-none cursor-pointer before:absolute before:top-0 before:left-0 before:w-full before:h-full before:rounded-full before:bg-gradient-to-r before:from-emerald-500 before:to-emerald-700 before:scale-x-0 before:origin-left before:transition-transform before:duration-500 hover:before:scale-x-100 mr-2">
              <span class="relative z-10">{{ __('messages.Paid') }}</span>
            </button>
          
            <button onclick="filterBookings('refunded')"
              class="min-w-16 sm:min-w-24 px-2 sm:px-4 py-1 sm:py-1 relative overflow-hidden rounded-full bg-[#a5b8bd] text-white border-none cursor-pointer before:absolute before:top-0 before:left-0 before:w-full before:h-full before:rounded-full before:bg-gradient-to-r before:from-red-500 before:to-red-700 before:scale-x-0 before:origin-left before:transition-transform before:duration-500 hover:before:scale-x-100">
              <span class="relative z-10">{{ __('messages.Refunded') }}</span>
            </button>
          </div>
          

       

        {{-- pjesa e pare qe shfaqet --}}
    
        <div id="bookings-container" class="space-y-4">
            @forelse ($bookings->filter(fn($booking) => $booking->trip) as $booking)
                <div class="bg-white shadow-md rounded-lg border border-gray-200 overflow-hidden max-w-4xl mx-auto" data-status="{{ $booking->status }}">
                    <div class="flex justify-between items-center p-4 cursor-pointer bg-gray-50 " onclick="toggleDetails(this)">


                        <!-- Date Section -->
                        <div class="flex flex-col items-center justify-center p-2 border-r border-gray-300">
                            <span class="text-2xl font-bold text-gray-800">{{ $booking->trip->departure_time->format('d') }}</span>
                            <span class="text-sm text-gray-500">{{ $booking->trip->departure_time->format('M') }}</span>
                        </div>
                    
                       <!-- Destination -->
                       <div class="flex flex-col flex-grow pl-4">
                        <div class="flex items-center gap-2">
                            <h3 class="text-lg sm:text-xl font-medium text-gray-900 flex items-center gap-2 mb-1">
                                {{ $booking->trip->origincity->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-indigo-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                                {{ $booking->trip->destinationcity->name }}
                            </h3>
                        </div>
                        
                        
                         <!-- Status -->
                         <p class="text-sm text-gray-500 flex items-center">
                            @if ($booking->status === 'reserved')
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 119.75" class="w-5 h-5 text-gray-600">
                                <defs>
                                    <style>.cls-1{fill-rule:evenodd;}</style>
                                </defs>
                                
                                <path class="cls-1" d="M91.89,57.78a31,31,0,1,1-31,31,31,31,0,0,1,31-31Zm-22-53.72c0-2.23,2.2-4.06,5-4.06s5,1.82,5,4.06V21.83c0,2.23-2.2,4.06-5,4.06s-5-1.82-5-4.06V4.06ZM13.49,57.51c-.29,0-.54-1.23-.54-2.75s.22-2.73.54-2.73H27c.28,0,.53,1.23.53,2.73s-.22,2.75-.53,2.75Zm21.54,0c-.28,0-.53-1.23-.53-2.75S34.72,52,35,52H48.55c.28,0,.53,1.23.53,2.73s-.22,2.75-.53,2.75Zm21.55,0c-.28,0-.53-1.23-.53-2.75s.22-2.73.53-2.73H70.1c.28,0,.53,1.22.53,2.72a41.48,41.48,0,0,0-3.9,2.76ZM13.52,73.23c-.28,0-.54-1.23-.54-2.75s.22-2.74.54-2.74H27c.28,0,.53,1.23.53,2.74s-.22,2.75-.53,2.75Zm21.54,0c-.28,0-.53-1.23-.53-2.75s.22-2.74.53-2.74H48.58c.28,0,.53,1.23.53,2.74s-.22,2.75-.53,2.75ZM13.55,89c-.28,0-.54-1.23-.54-2.74s.23-2.75.54-2.75H27.06c.28,0,.53,1.23.53,2.75S27.37,89,27.06,89Zm21.54,0c-.28,0-.53-1.23-.53-2.74s.22-2.75.53-2.75H48.61c.28,0,.53,1.23.53,2.75S48.92,89,48.61,89ZM25.36,4.06c0-2.23,2.2-4.06,4.95-4.06s4.95,1.82,4.95,4.06V21.83c0,2.23-2.21,4.06-4.95,4.06s-4.95-1.82-4.95-4.06V4.06ZM5.45,38.84H99.79V18.39a2.51,2.51,0,0,0-2.5-2.5h-9a2.75,2.75,0,1,1,0-5.49h9a8,8,0,0,1,8,8V50.87a41.1,41.1,0,0,0-5.57-1.49V44.31H5.45v53A2.47,2.47,0,0,0,6.19,99,2.51,2.51,0,0,0,8,99.77H52.78a39.14,39.14,0,0,0,1.93,5.55H8A8,8,0,0,1,2.35,103,7.88,7.88,0,0,1,0,97.32V18.41a8,8,0,0,1,8-8h9.66a2.75,2.75,0,0,1,0,5.49H8a2.46,2.46,0,0,0-1.76.73,2.54,2.54,0,0,0-.73,1.77V38.85H5.45Zm37.74-23a2.75,2.75,0,1,1,0-5.49h18.4a2.75,2.75,0,1,1,0,5.49ZM82.58,83.5l5.83,5.55L100.5,76.8c1-1,1.62-1.82,2.85-.56l4,4.08c1.3,1.29,1.23,2,0,3.25L90.68,100c-2.59,2.54-2.14,2.7-4.78.09l-10-10A1.16,1.16,0,0,1,76,88.28l4.62-4.78c.69-.73,1.25-.69,2,0Z"/>
                            </svg>
                            @elseif ($booking->status === 'paid')
                            <svg class="svg-icon w-6 h-6 text-gray-900"  stroke="currentColor" stroke-width="8" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M447.146667 853.333333c-10.24 0-17.066667 0-23.893334-3.413333l-273.066666-51.2c-10.24 0-13.653333-6.826667-13.653334-17.066667l34.133334-187.733333v-3.413333c30.72-58.026667 95.573333-78.506667 146.773333-78.506667l116.053333-116.053333c20.48-17.066667 51.2-20.48 75.093334 0l6.826666 6.826666c23.893333 23.893333 30.72 58.026667 13.653334 81.92l-68.266667 85.333334c-3.413333 3.413333-6.826667 10.24-13.653333 13.653333-6.826667 6.826667-17.066667 17.066667-17.066667 23.893333v17.066667c0 10.24 3.413333 20.48 13.653333 30.72 20.48 17.066667 54.613333 23.893333 85.333334 20.48h208.213333c6.826667 0 13.653333 3.413333 17.066667 13.653333 3.413333 6.826667 0 13.653333-6.826667 20.48l-153.6 102.4c-23.893333 23.893333-102.4 40.96-146.773333 40.96z m-273.066667-81.92l256 47.786667c27.306667 6.826667 122.88-13.653333 139.946667-30.72l109.226666-71.68h-150.186666c-37.546667 6.826667-81.92-6.826667-109.226667-27.306667-17.066667-13.653333-27.306667-34.133333-27.306667-58.026666V614.4c0-20.48 13.653333-37.546667 27.306667-47.786667 3.413333-3.413333 6.826667-6.826667 10.24-13.653333l68.266667-85.333333c6.826667-10.24 0-27.306667-10.24-40.96l-6.826667-6.826667c-10.24-6.826667-23.893333-3.413333-27.306667 3.413333l-119.466666 119.466667s-6.826667 3.413333-10.24 3.413333c-44.373333 0-98.986667 17.066667-119.466667 58.026667l-30.72 167.253333z" fill="" />
                                <path d="M17.066667 853.333333c-10.24 0-17.066667-10.24-17.066667-17.066666v-307.2c0-3.413333 3.413333-10.24 3.413333-13.653334 3.413333-3.413333 10.24-3.413333 13.653334-3.413333 23.893333 0 146.773333 3.413333 180.906666 37.546667 6.826667 3.413333 6.826667 10.24 6.826667 13.653333-10.24 109.226667-34.133333 221.866667-34.133333 225.28 0 3.413333-3.413333 6.826667-6.826667 10.24-3.413333 3.413333-88.746667 54.613333-146.773333 54.613333z m17.066666-307.2v269.653334c34.133333-6.826667 81.92-30.72 105.813334-44.373334 6.826667-23.893333 23.893333-116.053333 30.72-204.8-27.306667-10.24-88.746667-17.066667-136.533334-20.48zM665.6 512c-44.373333 0-81.92-23.893333-85.333333-54.613333 0-10.24 6.826667-17.066667 13.653333-17.066667 10.24 0 17.066667 6.826667 17.066667 13.653333 0 10.24 23.893333 23.893333 51.2 23.893334s51.2-13.653333 51.2-27.306667c0-6.826667-10.24-20.48-51.2-23.893333h-3.413334c-23.893333-3.413333-81.92-13.653333-81.92-58.026667 0-34.133333 37.546667-61.44 85.333334-61.44 44.373333 0 81.92 23.893333 85.333333 54.613333 0 10.24-6.826667 17.066667-13.653333 17.066667-10.24 0-17.066667-6.826667-17.066667-13.653333 0-10.24-23.893333-23.893333-51.2-23.893334s-51.2 13.653333-51.2 27.306667c0 6.826667 10.24 20.48 51.2 23.893333h3.413333c23.893333 3.413333 81.92 13.653333 81.92 58.026667 0 34.133333-37.546667 61.44-85.333333 61.44z" fill="" />
                                <path d="M665.6 546.133333c-10.24 0-17.066667-6.826667-17.066667-17.066666v-238.933334c0-10.24 6.826667-17.066667 17.066667-17.066666s17.066667 6.826667 17.066667 17.066666v238.933334c0 6.826667-6.826667 17.066667-17.066667 17.066666zM904.533333 273.066667h-68.266666c-10.24 0-17.066667-10.24-17.066667-17.066667s6.826667-17.066667 17.066667-17.066667h68.266666c10.24 0 17.066667 6.826667 17.066667 17.066667s-6.826667 17.066667-17.066667 17.066667z" fill="" />
                                <path d="M1006.933333 648.533333h-477.866666c-10.24 0-17.066667-6.826667-17.066667-17.066666s6.826667-17.066667 17.066667-17.066667H989.866667V204.8H341.333333v187.733333c0 10.24-6.826667 17.066667-17.066666 17.066667s-17.066667-10.24-17.066667-17.066667v-204.8c0-10.24 6.826667-17.066667 17.066667-17.066666h682.666666c10.24 0 17.066667 6.826667 17.066667 17.066666v443.733334c0 6.826667-6.826667 17.066667-17.066667 17.066666z" fill="" />
                            
                            </svg>
                            @elseif ($booking->status === 'refunded')
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 80.23" width="27" height="27" >
                                <defs>
                                <style>.cls-1{fill-rule:evenodd;}</style>
                            </defs>
                            <path class="cls-1 " d="M32.72,34.72,27.64,46.06c12.92,9.33,32.17,15,45.57,8-11.46,21.62-38,21.61-55.7,14.55L12.33,80.23,0,47.39,32.72,34.72ZM49,0l73.92,17.59L112.28,60,38.36,42.42,49,0Zm34.8,17.53a12.86,12.86,0,1,1-15.6,9.37,12.86,12.86,0,0,1,15.6-9.37ZM61,9.86l46.57,10.76a6.47,6.47,0,0,0,4.71,7.83l-4.18,16.78a6.46,6.46,0,0,0-7.83,4.7L53.67,39.17A6.47,6.47,0,0,0,49,31.34l4.18-16.77A6.47,6.47,0,0,0,61,9.86Z"/>
                        </svg>

                        @elseif ($booking->status === 'unpaid')
                        <svg height="24" preserveAspectRatio="xMinYMin" viewBox="-2 -2 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m10 20c-5.523 0-10-4.477-10-10s4.477-10 10-10 10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-10a1 1 0 0 1 1 1v5a1 1 0 0 1 -2 0v-5a1 1 0 0 1 1-1zm0-1a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>

                        @endif
                            &nbsp;&nbsp;{{ ucfirst($booking->status) }}
                        </p>

                        <div class="flex  justify-center -mb-3">
                           
                            <!-- SVG content --> <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 transition-transform duration-300 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9l6 6 6-6" />
                       
                        </svg>
                    </div>

                        
                        </div>
                    </div>
                    




                    <div class="details hidden px-4 py-2 text-gray-800 bg-[#c9dde2] ">
                       
                       
                          
                       
                        <div class="flex flex-wrap justify-between ">
                           
                            <div class="w-full md:w-1/2 ">
                                <ol class="relative border-s border-teal-900 dark:border-teal-700 ml-16 mt-4 ">
                                    <li class="mb-5 ms-6">
                                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100  rounded-full -start-4 ring-4 ring-customgreen-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ml-0" width="24px" height="24px" viewBox="0 0 24 24" fill="none">
                                                <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12 6V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <h3 class="flex items-center mb-1 text-sm text-gray-500  ml-3">{{ __('messages.Arrival Time:') }}</h3>
                                        <p class="mb-4 text-sm text-gray-900 ml-3">{{ $booking->trip->departure_time->format('H:i') }} → {{ $booking->trip->arrival_time->format('H:i') }}</p>
                                    </li>
                                    <li class="mb-5 ms-6">
                                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100  rounded-full -start-4 ring-4 ring-customgreen-500 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ml-0" width="20px" height="20px" viewBox="0 0 16 16" fill="none">
                                                <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z" fill="#000000" />
                                                <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z" fill="#000000" />
                                            </svg>
                                        </span>
                                        <h3 class="mb-1 text-sm text-gray-500  ml-3">{{ __('messages.Passenger') }}</h3>
                                        <p class="text-sm  text-gray-900  ml-3">{{ $booking->passenger->name }} {{ $booking->passenger->lastname }}</p>
                                    </li>
                                    <li class="mb-5 ms-6">
                                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100  rounded-full -start-4 ring-4 ring-customgreen-500 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ml-0" width="25px" height="25px" viewBox="0 0 24 24" fill="none">
                                                <path d="M16 8.94444C15.1834 7.76165 13.9037 7 12.4653 7C9.99917 7 8 9.23858 8 12C8 14.7614 9.99917 17 12.4653 17C13.9037 17 15.1834 16.2384 16 15.0556M7 10.5H11M7 13.5H11M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <h3 class="mb-1 text-sm text-gray-500  ml-3">{{ __('messages.Price:') }}</h3>
                                        <p class="text-sm font-normal text-gray-900  ml-3">{{ $booking->trip->price }} €</p>
                                    </li>
                                </ol>
                            </div>
                        
                         
                            <div class="w-full md:w-1/2">
                                <ol class="relative border-s border-teal-900 dark:border-teal-700 ml-16 mt-4">
                                    <li class="mb-5 ms-6">
                                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4  ring-customgreen-500 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ml-0" width="24px" height="24px" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.4" d="M17.9981 7.16C17.9381 7.15 17.8681 7.15 17.8081 7.16C16.4281 7.11 15.3281 5.98 15.3281 4.58C15.3281 3.15 16.4781 2 17.9081 2C19.3381 2 20.4881 3.16 20.4881 4.58C20.4781 5.98 19.3781 7.11 17.9981 7.16Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path opacity="0.4" d="M16.9675 14.4402C18.3375 14.6702 19.8475 14.4302 20.9075 13.7202C22.3175 12.7802 22.3175 11.2402 20.9075 10.3002C19.8375 9.59016 18.3075 9.35016 16.9375 9.59016" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path opacity="0.4" d="M5.96656 7.16C6.02656 7.15 6.09656 7.15 6.15656 7.16C7.53656 7.11 8.63656 5.98 8.63656 4.58C8.63656 3.15 7.48656 2 6.05656 2C4.62656 2 3.47656 3.16 3.47656 4.58C3.48656 5.98 4.58656 7.11 5.96656 7.16Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path opacity="0.4" d="M6.9975 14.4402C5.6275 14.6702 4.1175 14.4302 3.0575 13.7202C1.6475 12.7802 1.6475 11.2402 3.0575 10.3002C4.1275 9.59016 5.6575 9.35016 7.0275 9.59016" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.0001 14.6302C11.9401 14.6202 11.8701 14.6202 11.8101 14.6302C10.4301 14.5802 9.33008 13.4502 9.33008 12.0502C9.33008 10.6202 10.4801 9.47021 11.9101 9.47021C13.3401 9.47021 14.4901 10.6302 14.4901 12.0502C14.4801 13.4502 13.3801 14.5902 12.0001 14.6302Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.0907 17.7804C7.6807 18.7204 7.6807 20.2603 9.0907 21.2003C10.6907 22.2703 13.3107 22.2703 14.9107 21.2003C16.3207 20.2603 16.3207 18.7204 14.9107 17.7804C13.3207 16.7204 10.6907 16.7204 9.0907 17.7804Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <h3 class="mb-1 text-sm text-gray-500  ml-3">{{ __('messages.Seats Booked:') }}</h3>
                                        <p class="text-sm font-normal text-gray-900  ml-3">{{ $booking->seats_booked }}</p>
                                    </li>
                                    <li class="mb-5 ms-6">
                                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4 ring-customgreen-500 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ml-0" width="24px" height="24px" viewBox="0 0 24 24" fill="none">
                                                <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12 6V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <h3 class="mb-1 text-sm text-gray-500  ml-3">{{ __('messages.Booking Time:') }}</h3>
                                        <p class="text-sm  text-gray-900  ml-3">{{ $booking->created_at->format('H:i') }}</p>
                                    </li>
                                    <li class="mb-5 ms-6">
                                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100  rounded-full -start-4 ring-4 ring-customgreen-500 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ml-0" width="24px" height="24px" viewBox="0 0 24 24" fill="none">
                                                <rect x="3" y="6" width="18" height="15" rx="2" stroke="#33363F" stroke-width="2" />
                                                <path d="M3 10C3 8.11438 3 7.17157 3.58579 6.58579C4.17157 6 5.11438 6 7 6H17C18.8856 6 19.8284 6 20.4142 6.58579C21 7.17157 21 8.11438 21 10H3Z" fill="#33363F"/>
                                                <path d="M7 3L7 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                <path d="M17 3L17 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                <rect x="7" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                                <rect x="7" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                                <rect x="13" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                                <rect x="13" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                            </svg>
                                        </span>
                                        <h3 class="mb-1 text-sm text-gray-500  ml-3">{{ __('messages.Booking Date:') }}</h3>
                                        <p class="text-sm  text-gray-900  ml-3">{{ $booking->created_at->format('d/m/Y') }}</p>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        


                        @if ($booking->status == 'paid' && now()->lessThan($booking->trip->departure_time))
                        <form action="{{ route('bookings.refund', $booking->id) }}" method="POST"
                            onsubmit="return confirmSubmission()">
                            @csrf
                         
                            <button type="submit"
                            class="min-w-16 sm:min-w-24 px-2 sm:px-4 py-1 sm:py-1 relative overflow-hidden rounded-full bg-customgreen-400 text-white border-none cursor-pointer before:absolute before:top-0 before:left-0 before:w-full before:h-full before:rounded-full before:bg-gradient-to-r before:from-red-500 before:to-red-700 before:scale-x-0 before:origin-left before:transition-transform before:duration-500 hover:before:scale-x-100 mr-2">
                            <span class="relative z-10">{{ __('messages.Cancel & Refund') }}</span>
                          </button>
                           
                            
                        </form>
                           @else
                        <p class="mt-4 text-center text-sm text-gray-500 ">
                            {{ __('messages.This booking cannot be modified at this time.') }}
                        </p>
                         @endif
                          </div>
                     </div>
                     @empty
                      <p class="text-center text-white"> {{ __('messages.No bookings available for your trips.') }}</p>
                        @endforelse
    
    
    
    
    
    
    
    
                    </div>
    </div>

    
    </div>






<script >
                function confirmSubmission(event) {
                return confirm('Are you sure you want to cancel and refund this booking?');
        }
    function filterBookings(status) {
        const bookings = document.querySelectorAll('#bookings-container .bg-white');
            bookings.forEach(booking => {
            const bookingStatus = booking.getAttribute('data-status');
                if (status === 'all' || bookingStatus === status) {
                    booking.style.display = 'block';
                } else {
                    booking.style.display = 'none';
                }
            });
        }
    function toggleDetails(element) {
        const details = element.nextElementSibling;
            if (details.style.display === 'block') {
                details.style.display = 'none';
            } else {
                details.style.display = 'block';
            }
        }
</script>
</x-app-layout>
