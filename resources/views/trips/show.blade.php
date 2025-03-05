<x-app-layout>
    <div class="bg-showImage bg-no-repeat bg-cover bg-center min-h-screen p-[15px]">
        <div class="mt-1 p-1 md:mx-[76px] rounded-3xl ">
            <a href="/trips">
                            <img
                                src="{{ asset('storage/icons/back2.svg') }}"
                                alt="avatar"
                                class="relative inline-block h-7 w-7 !rounded-full object-cover object-center"
                            />
                            <span class="text-white">{{ __('messages.Back to rides') }}</span>
                        </a>
            <form action="{{ route('bookings.store') }}" method="POST"  class="bg-white bg-opacity-80  m-4 rounded-3xl shadow-md">
                @csrf
                <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                <input type="hidden" name="passenger_id" value="{{ auth()->user()->id }}">
                    <div class="relative ">
                        <div id="map" class=" h-[300px] w-full rounded-t-3xl md:rounded-l-none md:h-[541px] md:w-1/2 md:float-end lg:block md:rounded-r-3xl opacity-80"></div>
                    </div>
                    <div class="p-10 ">
                        <div class="flex my-2 text-black text-xl capitalize space-x-6 justify-between">
                            <div class="flex items-center space-x-2">
                                <p>{{$trip->origincity->name}}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20px" viewBox="0 -5 24 24" id="meteor-icon-kit__regular-long-arrow-right" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5858 8H1C0.447715 8 0 7.5523 0 7C0 6.4477 0.447715 6 1 6H20.5858L16.2929 1.70711C15.9024 1.31658 15.9024 0.68342 16.2929 0.29289C16.6834 -0.09763 17.3166 -0.09763 17.7071 0.29289L23.7071 6.2929C24.0976 6.6834 24.0976 7.3166 23.7071 7.7071L17.7071 13.7071C17.3166 14.0976 16.6834 14.0976 16.2929 13.7071C15.9024 13.3166 15.9024 12.6834 16.2929 12.2929L20.5858 8z" fill="#758CA3"/>
                                </svg>
                                <p>{{$trip->destinationcity->name}}</p>
                            </div>
                        </div>
                            <div class="flex-col space-y-5 pb-5">
                                <img
                                    src="{{ asset('storage/icons/time.svg') }}"
                                    alt="avatar"
                                    class="relative inline-block h-7 w-7 !rounded-full object-cover object-center"
                                />
                                <p class="relative inline-block  object-cover object-center">{{$trip->departure_time->format('H:i - d M')}}</p>
                            </div>
                            <div class="flex flex-row  items-center self-center rounded-lg">
                                <img
                                    src="{{ asset('storage/icons/talk.svg') }}"
                                    alt="avatar"
                                    class="relative inline-block h-6 w-6 mx-1 object-cover object-center"
                                />
                                @if ($trip->driver_comments)
                                    <p class="relative inline-block px-1 object-cover object-center">{{$trip->driver_comments}}</p>
                                @else
                                    <p class="relative inline-block px-1  object-cover object-center">{{ __('messages.Talk in chat') }}</p>
                                @endif
                            </div>
                            <div class="flex-col pb-4 space-y-5">
                                &nbsp;<img
                                    src="{{ asset('storage/icons/eu.svg') }}"
                                    alt="avatar"
                                    class="relative inline-block h-4 w-4 !rounded-full object-cover object-center"
                                />
                                <p class="relative inline-block  object-cover object-center">&nbsp;&nbsp;{{$trip->price}}</p>
                            </div>
                            <div class="text-black  space-y-1 justify-between ">
                                <h1 class="text-lg">{{ __('messages.Driver') }}:</h1>
                                <a href="#" id="showDriverDetails">
                                @if ($trip->users->image)
                                    <img
                                        src="{{ asset('storage/' . $trip->users->image) }}" alt="{{ $trip->users->name }}"
                                        class="rounded-full relative inline-block h-10 w-10 object-cover object-center"
                                    />
                                @else
                                    <img class="relative rounded-full inline-block h-10 w-10  object-cover object-center" src="{{ asset('https://eu.ui-avatars.com/api/' . $trip->users->name  . '+' . $trip->users->lastname) }}" alt="Default Image">
                                @endif
                                <p class="relative inline-block px-2 object-cover object-center">{{$trip->users->name}}</p>
                                <p class="relative text-xs italic underline hover:text-blue-400 text-blue-600 inline-block object-cover object-center">view details</p>
                             </a>
                            </div>
             <div id="driverModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
             <div class="bg-white  p-3 sm:p-4 lg:p-5 xl:p-6  rounded-xl shadow-lg w-full  max-w-xs sm:max-w-sm lg:max-w-md xl:max-w-lg  relative mx-2 sm:mx-auto">
            <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-900 text-xl font-bold">×</button>
            <div class="text-center">
            @if ($trip->users->image)
                <img src="{{ asset('storage/' . $trip->users->image) }}"
                     alt="Driver Image"
                     class="w-28 h-28 mx-auto rounded-full border-4 border-gray-300 shadow-lg object-cover mb-4">
            @else
                <img src="{{ asset('https://ui-avatars.com/api/?name=' . $trip->users->name . '+' . $trip->users->lastname) }}"
                     alt="Default Image"
                     class="w-28 h-28 mx-auto rounded-full border-4 border-gray-300 shadow-lg object-cover mb-4">
            @endif

            <h2 class="text-xl font-semibold text-gray-800 mt-2 flex justify-center items-center">
                {{ $trip->users->name }} {{ $trip->users->lastname }}
                @if($trip->users->verification_status === 'verified')
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#3b82f6" class="w-5 h-5 text-blue inline ml-2 mb-1.5" viewBox="0 0 24 24">
                        <path d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0zm-1.7 18.3l-4.6-4.6 1.4-1.4 3.2 3.2 7.2-7.2 1.4 1.4z" />
                    </svg>
                @endif
            </h2>
            <div class="flex justify-center items-center space-x-6 mt-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="30px" height="30px" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                    </svg>
                    <span class="text-gray-700 text-sm ml-2">{{ __('Joined') }}: {{ $trip->users->created_at->format('F, Y') }}</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="30px" height="30px" viewBox="0 0 50 50">
                        <path d="M12 6L12 24L19 24L19 12L24 12L24 6L12 6 z M 15 8L17 8L17 10L15 10L15 8 z M 19 8L21 8L21 10L19 10L19 8 z M 15 12L17 12L17 14L15 14L15 12 z M 21 14L21 39L28 39L28 20L34 20L34 14L21 14 z M 15 16L17 16L17 18L15 18L15 16 z M 24 16L26 16L26 18L24 18L24 16 z M 29 16L31 16L31 18L29 18L29 16 z M 15 20L17 20L17 22L15 22L15 20 z M 24 20L26 20L26 22L24 22L24 20 z M 30 22L30 39L42 39L42 22L30 22 z M 24 24L26 24L26 26L24 26L24 24 z M 33 24L35 24L35 26L33 26L33 24 z M 37 24L39 24L39 26L37 26L37 24 z M 8 26L8 39L19 39L19 26L8 26 z M 11 28L13 28L13 30L11 30L11 28 z M 15 28L17 28L17 30L15 30L15 28 z M 24 28L26 28L26 30L24 30L24 28 z M 33 28L35 28L35 30L33 30L33 28 z M 37 28L39 28L39 30L37 30L37 28 z M 6 30.919922L-0.029296875 45L50.140625 45L44 31.839844L44 41L6 41L6 30.919922 z M 11 32L13 32L13 34L11 34L11 32 z M 15 32L17 32L17 34L15 34L15 32 z M 24 32L26 32L26 34L24 34L24 32 z M 33 32L35 32L35 34L33 34L33 32 z M 37 32L39 32L39 34L37 34L37 32 z" />
                    </svg>
                    <span class="text-gray-700 ml-2">{{ __('City') }}: {{ $trip->users->city }}</span>
                </div>
            </div>
            <div class="flex items-center justify-center space-x-6 mt-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#f59e0b" class="w-6 h-6" viewBox="0 0 24 24">
                        <path d="M12 .587l3.668 7.573 8.332 1.151-6.064 5.944 1.448 8.28L12 18.896l-7.384 4.639 1.448-8.28L.587 9.311l8.332-1.151z" />
                    </svg>
                                     <span class="ml-1 -mb-1 text-gray-800 font-semibold text-lg">{{ $trip->users->average_rating ? round($trip->users->average_rating, 1) : 'N/A' }}</span>
                                 </div>
                                 <div class="flex items-center justify-center  -mt-2">
                         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" viewBox="0 0 36 36" aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet">
                             <path fill="#CCD6DD" d="M21.377 15.449c.089.816-.83 1.495-2.053 1.515c-1.223.02-2.095-.635-1.947-1.463l.356-2c.147-.829.938-1.5 1.767-1.5c.828 0 1.572.662 1.661 1.478l.216 1.97z"/>
                             <path fill="#FFCC4D" d="M32.246 21h-.135l-.444-3c-.327-2.209-1.864-4-3.433-4H16.162c-1.569 0-3.574 1.791-4.478 4l-1.228 3H6.911c-2.073 0-4.104 1.791-4.538 4l-.588 3c-.001.008 0 .015-.002.021A1.995 1.995 0 0 0 0 30a2 2 0 0 0 2 2h30a4 4 0 0 0 4-4v-3c0-2.209-1.681-4-3.754-4z"/>
                             <circle fill="#292F33" cx="10" cy="31" r="4"/>
                             <circle fill="#CCD6DD" cx="10" cy="31" r="2"/>
                             <circle fill="#292F33" cx="27" cy="31" r="4"/>
                             <circle fill="#CCD6DD" cx="27" cy="31" r="2"/>
                             <path fill="#F4900C" d="M2.373 25l-.196 1H36v-1c0-.348-.055-.679-.133-1H2.702a4.764 4.764 0 0 0-.329 1z"/>
                             <path d="M24 21h5.92a12.673 12.673 0 0 0-.156-1.5c-.395-2.5-.552-3.5-3.437-3.5H24v5zm-2-5h-5c-1.594 0-3.236 1.567-3.847 3.5c-.194.599-.353 1.088-.472 1.5H22v-5z" fill="#55ACEE"/>
                         </svg>
                         <span class="mt-3 ml-2 text-gray-800 font-semibold text-lg">{{ $countTrips }}</span>
                              </div>
                          </div>
                                  <div class="mt-6 flex justify-center">
                           <button id="reportButton" class="w-48 bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg text-sm font-semibold">
                                                      {{ __('Report') }}
                           </button>
                              </div>
                         </div>
                     </div>
                  </div>
                            <div class="flex-col mt-1 space-t-5 ">
                                <h1 class="text-lg">{{ __('messages.Seats:') }}</h1>
                                <p class="relative inline-block  object-cover object-center" > {{$available_seats}} {{ __('messages.free seats') }}</p>

                            </div>
                            {{-- @if ($available_seats > 0)
                            <div class="flex-col  pb-6">
                                <h1 class="text-lg pt-3">{{ __('messages.Choose the number of seats:') }}</h1>
                                <input class="  border border-gray-700 rounded-lg bg-gray-200 bg-opacity-25 shadow-sm focus:outline-none focus:ring-2 focus:border-transparent text-gray-700"
                                type="number" name="seats_booked" min="1" max="{{ $available_seats }}" value="1" required>
                            </div>
                            @else
                            <div class="flex-col  pb-6">
                                <p class="text-red-500 py-2">{{ __('messages.There are no seats available for this trip.') }}</p>
                                <input class="  border border-gray-700 rounded-lg bg-gray-200 bg-opacity-25 shadow-sm focus:outline-none focus:ring-2 focus:border-transparent text-gray-700"
                                type="number" name="seats_booked" min="1" max="{{ $available_seats }}" value="0" required disabled>
                            </div>
                            @endif
                     @if ($available_seats>0)
                              <div>
                                <button class="rounded-md bg-blue-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none md:w-40"
                                type="submit">
                                {{ __('messages.Book Now') }}
                                </button>
                            </div>
                            @else --}}
                            {{-- <div>
                                <div class="rounded-md bg-red-500 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md  focus:bg-red-700 focus:shadow-none  active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:bg-red-500 md:w-40 cursor-not-allowed opacity-50">
                                    @lang('messages.All Booked Up')
                                </div>

                            </div>
                        @endif --}}
                    </div>
            </form>
        </div>

        <form action="{{ route('bookings.reserve') }}" method="POST"  class="bg-gray-200  bg-opacity-80 rounded-2xl m-5  p-2  md:mb-5 md:mx-24 ">
            @csrf
            <input type="hidden" name="trip_id" value="{{ $trip->id }}">
            <input type="hidden" name="passenger_id" value="{{ auth()->user()->id }}">
            <div class="flex flex-col md:flex-row justify-between items-center space-x-4">
                <p class="w-full px-2 pt-1 md:pt-0 md:w-4/5 text-sm md:text-md  ">  {{ __('messages.If you want to reserve your seat and pay in person, choose the "Reserve Your Seat" option. This allows you to secure your seat now and handle payment conveniently when you arrive.') }}</p>
                @if ($available_seats > 0)
                <div class="flex items-center space-x-2 pb-2 pt-2">
                    <input
                        class=" border border-gray-700 rounded-lg  bg-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-800 text-gray-700 p-2"
                        type="number" name="seats_booked" min="1" max="{{ $available_seats }}" value="1" required
                        placeholder="Seats to book">
                    <button
                        class=" whitespace-nowrap px-[20px] rounded-md bg-blue-800 py-2  md:px-6 text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700  disabled:pointer-events-none disabled:opacity-50"
                        type="submit">
                        {{ __('messages.Reserve Seat') }}
                    </button>
                </div>
                @else
                <p class="text-red-500 py-4">{{ __('messages.There are no seats available for this trip.') }}</p>
                @endif
            </div>

        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var latitude = {{ $trip->latitude }};
            var longitude = {{ $trip->longitude }};
            var map = L.map('map').setView([latitude, longitude], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                minZoom: 8,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            var customIcon = L.icon({
                iconUrl: "{{ asset('storage/icons/icon.png') }}",
                iconSize: [25, 36],
                iconAnchor: [12, 36],
                popupAnchor: [0, -36]
            });
            L.marker([latitude, longitude], { icon: customIcon }).addTo(map)
                .bindPopup(`
                    <div class="font-medium p-2 rounded-lg text-center">
                        <span class="italic text-indigo-500 text-sm">Meeting Location</span>
                    </div>
                `);
        });
        document.addEventListener('DOMContentLoaded', function () {
         const modal = document.getElementById('driverModal');
         const showModalButton = document.getElementById('showDriverDetails');
         const closeModalButton = document.getElementById('closeModal');
         showModalButton.addEventListener('click', function (e) {
         e.preventDefault();
         modal.classList.remove('hidden');
            });
        closeModalButton.addEventListener('click', function (e) {
        e.preventDefault();
        modal.classList.add('hidden');
            });
        modal.addEventListener('click', function (e) {
              if (e.target === modal) {
            modal.classList.add('hidden');
              }
              });
        document.getElementById('reportButton').addEventListener('click', function(event) {
        event.preventDefault();
             });
             });
    </script>
</x-app-layout>
