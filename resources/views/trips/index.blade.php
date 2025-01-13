    <x-app-layout>
        @auth
        <div class="container mx-auto bg-[#85a98f] ">
            <div class="flex flex-col sm:justify-between md:flex-row items-center md:items-end mb-6 mt-1 w-full space-y-4 md:space-y-0">

                <h1 class="text-3xl font-bold text-white p-6 ">{{ __('messages.Available Rides') }}</h1>


                <div class="flex gap-2 md:flex-row md:mr-[20px] md:space-y-0 md:space-x-2 mt-4 md:mt-0">
                    <a href="{{ route('trips.index') }}"
    class="w-28 px-4 py-1 text-sm rounded-md transition duration-200 
            {{ request()->routeIs('trips.index') ? 'bg-white text-[#033f63]' : 'bg-white text-orange-500' }}
            hover:bg-orange-400 hover:text-white font-semibold text-center">
    {{ __('messages.Passenger') }}
    </a>

                    @if(!auth()->user()->email_verified_at && !auth()->user()->google_id)

                    @else
                    <a href="{{ route('trips.create') }}"
                    class="w-28 px-4 py-1 text-sm rounded-md transition duration-200 
                        {{ request()->routeIs('trips.create') ? 'bg-blue-100 text-[#033f63]' : 'bg-[#033f63] text-white font-semibold' }}
                        hover:bg-white hover:text-[#033f63] text-center">
                    {{ __('messages.Driver') }}
                </a>
                
                    @endif


                </div>
            </div>


            <form action="{{ route('trips.index') }}" method="GET" class="mb-8 flex flex-wrap items-center justify-center w-full max-w-full px-4 ">
                <!-- Origin City Select -->
                <div class="flex flex-wrap items-center gap-4 mb-2">
                    <!-- Origin City Select -->
                    <div class="w-full md:w-32">
                        <select name="origin_city_id" id="origin-city"
                                class="border border-gray-300 rounded px-2 py-1 text-sm w-full focus:outline-none focus:ring-1 focus:ring-orange-300 transition duration-200">
                            <option value="" class="text-gray-800">{{ __('messages.From:') }}</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ request('origin_city_id') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                
                <!-- Swap Cities Button -->
                <div class="flex items-center justify-center mb-2 md:mb-0">
                    <button type="button" class="swap-button p-1" id="swap-cities">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="20px" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M16 3.93a.75.75 0 0 1 1.177-.617l4.432 3.069a.75.75 0 0 1 0 1.233l-4.432 3.069A.75.75 0 0 1 16 10.067V8H4a1 1 0 0 1 0-2h12V3.93zm-9.177 9.383A.75.75 0 0 1 8 13.93V16h12a1 1 0 1 1 0 2H8v2.067a.75.75 0 0 1-1.177.617l-4.432-3.069a.75.75 0 0 1 0-1.233l4.432-3.069z"
                                fill="#ffffff" />
                        </svg>
                    </button>
                </div>
                    <!-- Destination City Select -->
                    <div class="w-full md:w-32">
                        <select name="destination_city_id" id="destination-city"
                                class="border border-gray-300 rounded px-2 py-1 text-sm w-full focus:outline-none focus:ring-1 focus:ring-orange-300 transition duration-200">
                            <option value="" class="text-gray-800">{{ __('messages.To:') }}</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ request('destination_city_id') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                
                    <!-- Date Picker -->
                    <div class="w-full md:w-32">
                        <input type="text" id="filter-date" name="date"
                            class="text-gray-900 border border-gray-300 rounded px-2 py-1 text-sm w-full focus:outline-none focus:ring-1 focus:ring-orange-300 transition duration-200 text-center"
                            placeholder="{{ __('messages.Select a date') }}" readonly
                            value="{{ request('date') }}">
                    </div>
                </div>
                
                
            
                <!-- Filter and Reset Buttons -->
                <div class="w-full flex items-center justify-center mt-4 space-x-4 mb-2">
                    <button type="submit"
                            class="w-24 px-4 py-1 text-sm rounded-md transition duration-200 bg-white text-[#033f63] font-semibold hover:bg-orange-400 hover:text-white">
                        {{ __('messages.Filter') }}
                    </button>
            
                    <a href="{{ route('trips.index') }}"
                    class="w-24 px-4 py-1 text-sm rounded-md transition duration-200 bg-[#033f63] text-white hover:bg-white hover:text-[#033f63] font-semibold text-center">
                        {{ __('messages.Reset') }}
                    </a>
                </div>
            </form>
            






    <div id="rides-list" class="grid grid-cols-1 gap-6 mb-4 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 px-4 sm:px-6 lg:px-8 mt-10 justify-items-center">
        @foreach ($trips as $trip)
        

        <div class="ride-card max-w-sm rounded-xl shadow-md bg-white p-3 relative"  data-departure="{{ $trip->departure_time }}">
            {{-- <div class="ride-card bg-white p-6 rounded-lg transition-transform duration-300 transform hover:scale-105 shadow-md flex flex-col justify-between" data-departure="{{ $trip->departure_time }}"> --}}
            <div class="max-w-sm rounded-xl ">

            <!-- Book and Edit -->
            <div class="absolute top-2 right-6">
                <button class="mt-3 ">
                    @if ($trip->driver_id === auth()->id())
            @if ($trip->status !== 'Failed')
                <a href="{{ route('trips.edit', $trip->id) }}" class="text-blue-900 text-base hover:text-blue-800 font-semibold ">
                    {{ __('messages.Edit') }}
                </a>
            
            @endif
        @else
            @if ($trip->status === 'Failed')
                <span class="text-red-600 text-sm font-semibold">{{ __('messages.Trip Cancelled') }}</span>
            @elseif ($trip->status !== 'In Progress')
                <a href="{{ route('trips.show', $trip->id) }}" class="text-blue-900 text-base hover:text-blue-800 font-semibold w-22 h-8">
                    {{ __('messages.Book Now') }}
                </a>
            @else
                <span class="text-gray-500 text-sm font-semibold">{{ __('messages.Trip Started') }}</span>
            @endif
        @endif
                </button>
            </div>

            <!-- Date -->
            <p class="text-gray-500 text-base  mb-4">{{ \Carbon\Carbon::parse($trip->departure_time)->format('j F') }}</p>


            <div class="flex items-center space-x-3 mb-4">
                <!-- User Image -->
                @if($trip->users->image)
                    <img src="{{ asset('storage/' . $trip->users->image) }}" alt="{{ $trip->users->name }}" class="w-12 h-12 rounded-full">
                @else
                    <img class="relative inline-block h-12 w-12 object-cover object-center rounded-full" src="{{ asset('https://eu.ui-avatars.com/api/' . $trip->users->name  . '+' . $trip->users->lastname) }}" alt="Default Image">
                @endif
            
                <!-- User Info -->
                <div>
                    <h2 class="text-gray-800 font-semibold text-sm">
                        {{ $trip->users->name ?? 'N/A' }} {{ $trip->users->lastname ?? '' }}

                        {{-- verify profile icon --}}
                        <div class="relative inline-block group">
                            @if($trip->users->verification_status === 'verified')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="orange"
                                    class="w-4 h-4 mb-1 text-orange inline ml-1" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0zm-1.7 18.3l-4.6-4.6 1.4-1.4 3.2 3.2 7.2-7.2 1.4 1.4z"/>
                                </svg>
                                <span
                                    class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2
                                        hidden group-hover:inline-block bg-black text-white text-sm
                                        px-2 py-1 rounded shadow-lg whitespace-nowrap">
                                    Verified
                                </span>
                            @endif

                        </div>

                        {{-- verify background icon --}}
                        <div class="relative inline-block group">
                            @if($trip->users->background_status === 'verified')
                                <svg class="w-5 h-5 mb-1.5 text-orange inline ml-1"
                                    viewBox="-9.63 0 337.39 337.39" xmlns="http://www.w3.org/2000/svg"
                                    fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <defs>
                                            <style>.cls-1 {
                                                    fill: #e7e7e7;
                                                }

                                                .cls-2 {
                                                    fill: #ced0d0;
                                                }

                                                .cls-3 {
                                                    fill: #000000;
                                                }

                                                .cls-4, .cls-8 {
                                                    fill: #ffffff;
                                                }

                                                .cls-5 {
                                                    fill: none;
                                                    stroke: #ffffff;
                                                    stroke-miterlimit: 10;
                                                    stroke-width: 2px;
                                                }

                                                .cls-6 {
                                                    fill: orange;
                                                }

                                                .cls-7 {
                                                    fill: orange;
                                                }

                                                .cls-8 {
                                                    font-size: 155.97px;
                                                    font-family: Dosis-ExtraBold, Dosis;
                                                    font-weight: 700;
                                                }</style>
                                        </defs>
                                        <title></title>
                                        <g data-name="Layer 2" id="Layer_2">
                                            <g data-name="Layer 1" id="Layer_1-2">
                                                <path class="cls-1"
                                                    d="M295.38,133.12s-14.83-10-39.7-15.78a62.18,62.18,0,1,0-68.88,0c-12,2.87-21,6.22-27.74,9.57-3.35-31.57-29.66-56.44-62.18-56.44A62.11,62.11,0,0,0,62.44,184.3c-24.87,5.74-39.7,15.78-39.7,15.78C13.65,205.34,6,217.78,6,228.3v62.18a19.19,19.19,0,0,0,19.13,19.13h143.5a19.19,19.19,0,0,0,19.13-19.13V242.65H293a19.19,19.19,0,0,0,19.13-19.13V161.34C312.13,150.81,305,137.9,295.38,133.12Z"></path>
                                                <path class="cls-2"
                                                    d="M309.62,161.34v62.18a19.19,19.19,0,0,1-19.13,19.13H185.26v47.84a19.2,19.2,0,0,1-19.15,19.13H22.62A19.18,19.18,0,0,1,3.49,290.49V264.34c8,3.11,16.67,4.74,25.19,6.29,32.42,5.83,70.1,9.46,94.27-12.91,11.37-10.51,18.3-25.81,31.62-33.69s29.66-6.59,44.92-8.51c37.25-4.67,69.84-29.66,90.44-61a178.23,178.23,0,0,0,9.59-16.45C305.58,144.2,309.62,153.43,309.62,161.34Z"></path>
                                                <path class="cls-3"
                                                    d="M168.63,318.13H25.13A25.16,25.16,0,0,1,0,293V230.81C0,218.54,8.58,204,19.56,197.5c1.6-1.06,12.31-7.87,29.91-13.38A68.16,68.16,0,0,1,96.88,67a68.55,68.55,0,0,1,66.83,53.79q4.73-1.9,10.15-3.59a68.18,68.18,0,1,1,94.79,0c17.11,5.36,27.71,12,29.76,13.28,11.08,5.75,19.72,20.34,19.72,33.41V226A25.16,25.16,0,0,1,293,251.16H193.76V293A25.16,25.16,0,0,1,168.63,318.13ZM96.88,79A56.25,56.25,0,0,0,40.7,135.15a55.6,55.6,0,0,0,25,46.64l11.73,7.71-13.67,3.16C40.45,198,26.24,207.47,26.1,207.56l-.35.22C18.3,212.1,12,222.64,12,230.81V293a13.15,13.15,0,0,0,13.13,13.13h143.5A13.15,13.15,0,0,0,181.76,293V239.16H293A13.15,13.15,0,0,0,306.13,226V163.85c0-8.6-6.27-19.28-13.42-22.85l-.35-.18-.32-.22c-.22-.14-14.41-9.54-37.69-14.91l-13.67-3.16,11.73-7.71a55.59,55.59,0,0,0,25-46.64,56.18,56.18,0,1,0-112.36,0,55.59,55.59,0,0,0,25,46.64l11.59,7.61-13.48,3.24a125.57,125.57,0,0,0-26.46,9.1L154,138.64l-.91-8.6A56.67,56.67,0,0,0,96.88,79Z"></path>
                                                <path class="cls-4"
                                                    d="M86.85,96.87a42.57,42.57,0,0,1,17-2.25c3.85.28,3.84-5.72,0-6a47,47,0,0,0-18.59,2.46c-3.64,1.23-2.08,7,1.6,5.79Z"></path>
                                                <path class="cls-4"
                                                    d="M76.75,168.75a42.23,42.23,0,0,1-17.17-30.13c-1.28-13.05,3.87-25,13.49-33.67,2.87-2.6-1.39-6.83-4.24-4.24-22.26,20.17-19.35,55.92,4.89,73.22,3.15,2.25,6.15-3,3-5.18Z"></path>
                                                <path class="cls-5" d="M73.75,100.17"></path>
                                                <path class="cls-6"
                                                    d="M168.33,336.34s86.83-43.41,86.83-108.54V141l-86.83-21.71L81.51,141v86.83C81.51,292.93,168.33,336.34,168.33,336.34Z"></path>
                                                <path class="cls-7"
                                                    d="M255.16,186.56v36.29c0,65.13-86.83,108.54-86.83,108.54S81.51,288,81.51,222.86V186.56c0,65.13,86.82,108.54,86.82,108.54S255.16,251.69,255.16,186.56Z"></path>
                                                <path class="cls-3"
                                                    d="M168.33,337.39,165.65,336A234.93,234.93,0,0,1,121,305.35c-29.74-26-45.46-54.8-45.46-83.21V130.63l92.83-23.21,92.83,23.21v91.51c0,28.41-15.72,57.18-45.46,83.21A234.93,234.93,0,0,1,171,336ZM87.51,140v82.14c0,54.45,66.51,93.89,80.83,101.74,14.3-7.86,80.83-47.37,80.83-101.74V140l-80.83-20.21Z"></path>
                                                <text class="cls-8" transform="translate(150.15 274.66)"></text>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span
                                    class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2
                                        hidden group-hover:inline-block bg-black text-white text-sm
                                        px-2 py-1 rounded shadow-lg whitespace-nowrap">
                                    Background Check
                                </span>
                            @endif
                    
                        </div>
                    </h2>
                    
                    {{-- driver comments  --}}
                    <p class="text-gray-800 text-xs flex items-center sm:break-words break-all">
                        {{ \Illuminate\Support\Str::limit($trip->driver_comments, 40) }}
                    </p>
                    
                    

                    <!-- Females Only -->
                    @if ($trip->passenger_gender_preference == 'female')
                        <p class="text-gray-800 text-xs flex items-center">
                            Females only
                            <img
                                src="{{ asset('storage/icons/female.svg') }}"
                                alt="Female Only"
                                title="Female Only"
                                class="inline-block h-4 w-4 ml-1 object-cover"
                            />
                        </p>
                    @endif
                </div>
            </div>
            
            


            <h1 class="text-gray-700 font-bold text-2xl mt-1 mb-6 flex items-center px-1">
                <span>{{ $trip->origincity->name }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 -5 24 24" id="meteor-icon-kit__regular-long-arrow-right" fill="none" class="mx-2 align-middle">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5858 8H1C0.447715 8 0 7.5523 0 7C0 6.4477 0.447715 6 1 6H20.5858L16.2929 1.70711C15.9024 1.31658 15.9024 0.68342 16.2929 0.29289C16.6834 -0.09763 17.3166 -0.09763 17.7071 0.29289L23.7071 6.2929C24.0976 6.6834 24.0976 7.3166 23.7071 7.7071L17.7071 13.7071C17.3166 14.0976 16.6834 14.0976 16.2929 13.7071C15.9024 13.3166 15.9024 12.6834 16.2929 12.2929L20.5858 8z" fill="#033f63"/>
                </svg>
                <span>{{ $trip->destinationcity->name }}</span>
            </h1>
            
            

        

            <div class="flex flex-wrap items-center justify-center gap-4 mb-2">
                <!-- Departure Time -->
                <div class="flex flex-col items-center sm:items-center w-full sm:w-auto">
                    <p class="text-gray-500 text-xs text-center  mb-1">
                        {{ __('messages.Departure Time:') }}
                    </p>
                    <span class="flex items-center justify-center w-24 h-6 px-3 text-sm rounded-full bg-white text-gray-800 text-center border border-gray-200">
                        {{ \Carbon\Carbon::parse($trip->departure_time)->format('H:i') }}
                    </span>
                </div>
            
                <!-- Seats Booked -->
                <div class="flex flex-col items-center sm:items-center w-full sm:w-auto">
                    <p class="text-gray-500 text-xs text-center
                    mb-1">
                        {{ __('messages.Available Seats:') }}
                    </p>
                    <span class="flex items-center justify-center w-24 h-6 px-3 text-sm bg-white rounded-full text-gray-800 text-center border border-gray-200">
                        {{ $trip->available_seats }}
                    </span>
                </div>
            
                <!-- Price -->
                <div class="flex flex-col items-center sm:items-center w-full sm:w-auto">
                    <p class="text-gray-500 text-xs text-center  mb-1">
                        {{ __('messages.Price:') }}
                    </p>
                    <span class="flex items-center justify-center w-24 h-6 px-3 bg-white rounded-full text-sm text-gray-800 text-center border border-gray-200">
                        {{ $trip->price }}€
                    </span>
                </div>
            </div>
            
            
            
        </div>
            
            

        

            <!-- Details Button -->
            <div class=" mt-3 flex justify-center sm:ml-2 sm:justify-start ">
                @if (auth()->id() === $trip->driver_id)
                    @if ($trip->status === 'Failed')
                        <span class="text-red-600 font-semibold">{{ __('messages.Trip Cancelled') }}!</span>
                    @elseif($trip->status === 'Waiting')
                        <form action="{{ route('trips.start', $trip->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="min-w-16 sm:min-w-24 px-2 sm:px-4 py-1 sm:py-1 relative overflow-hidden rounded-full bg-[#033f63] text-white border-none cursor-pointer before:absolute before:top-0 before:left-0 before:w-full before:h-full before:rounded-full before:bg-gradient-to-r before:from-emerald-500 before:to-emerald-700 before:scale-x-0 before:origin-left before:transition-transform before:duration-500 hover:before:scale-x-100 mr-2">
                                <span class="relative z-10">{{ __('messages.Start Trip') }}</span>
                            </button>
                        </form>
                    @elseif ($trip->status === 'In Progress')
                        <form action="{{ route('trips.end', $trip->id) }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="min-w-16 sm:min-w-24 px-2 sm:px-4 py-1 sm:py-1 relative overflow-hidden rounded-full bg-[#033f63] text-white border-none cursor-pointer before:absolute before:top-0 before:left-0 before:w-full before:h-full before:rounded-full before:bg-gradient-to-r before:from-red-500 before:to-red-700 before:scale-x-0 before:origin-left before:transition-transform before:duration-500 hover:before:scale-x-100 mr-2">
                                <span class="relative z-10">{{ __('messages.End Trip') }}</span>
                            </button>
                        </form>
                    @endif
                @endif
            </div>
            
        </div>
        


        
        

    

        
                    
            @endforeach
        
        
            
    </div>

    <div id="no-rides" class="hidden text-center mt-6 text-gray-500 bg-[#85a98f]">
        <p>No available rides for the selected date.</p>
    </div>



        

        </div>
        @endauth

    </x-app-layout>
