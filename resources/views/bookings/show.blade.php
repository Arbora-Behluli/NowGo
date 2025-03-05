<x-app-layout>
    <div class="bg-showImage bg-no-repeat bg-cover bg-center h-screen overflow-hidden p-[15px]">
        <div class="mt-1 p-1 md:mx-[80px]">
            <a href="/trips">
                <img
                    src="{{ asset('storage/icons/back2.svg') }}"
                    alt="avatar"
                    class="relative inline-block h-7 w-7 !rounded-full object-cover object-center"
                />
                <span class="text-white">{{ __('messages.Back to rides') }}</span>
            </a>
            <div class="bg-white bg-opacity-80  m-4  shadow-md  rounded-3xl">
                <form action="{{ route('bookings.store') }}" method="POST"  class="">
                    @csrf
                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                    <input type="hidden" name="passenger_id" value="{{ auth()->user()->id }}">
                        <div class="relative ">
                            <div id="map" class=" h-[300px] w-full rounded-t-3xl md:rounded-l-none md:h-[451px] md:w-1/2 md:float-end lg:block md:rounded-r-3xl opacity-80"></div>
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
                                    <h1 class="text-lg">{{ __('messages.Driver') }}</h1>
                                    @if ($trip->users->image)
                                        <img
                                            src="{{ asset('storage/' . $trip->users->image) }}" alt="{{ $trip->users->name }}"
                                            class="rounded-full relative inline-block h-10 w-10 object-cover object-center"
                                        />
                                    @else
                                        <img class="relative rounded-full inline-block h-10 w-10  object-cover object-center" src="{{ asset('https://eu.ui-avatars.com/api/' . $trip->users->name  . '+' . $trip->users->lastname) }}" alt="Default Image">
                                    @endif
                                    <p class="relative inline-block px-2 object-cover object-center">{{$trip->users->name}}</p>
                                </div>
                                <div class="mt-3">
                                    <p class="text-green-500">{{ __('messages.You have successfully reserved') }}</p>
                                </div>
                        </div>
                </form>
                <div class="flex flex-col md:flex-row items-center mx-4 pb-4 space-x-2">
                    {{-- <a  href="{{route('chat')}}"
                        class="w-full rounded-lg my-2 bg-white py-2 px-4 border border-transparent text-center text-sm text-black transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-green-300 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none md:w-40">
                        Chat
                    </a> --}}
                    @if(!empty($booking->stripe_charge_id))
                        <form action="{{ route('bookings.refund', $booking->id) }}" method="POST">
                        @csrf
                        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="w-full  rounded-lg my-2 bg-red-500 hover:bg-red-700 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700  active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none md:w-40">
                            {{ __('messages.Cancel & Refund') }}
                        </button>
                        @include('bookings.bookingModal')
                        </form>
                    @else
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                class="w-full rounded-lg my-2 bg-red-500 hover:bg-red-700 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none md:w-40">
                                {{ __('messages.Cancel') }}
                            </button>
                            @include('bookings.bookingModal')
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal(modalId, overlayId) {
            const modal = document.getElementById(modalId);
            const overlay = document.getElementById(overlayId);

            if (modal && overlay) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                overlay.classList.remove('hidden');
            }
                function confirmSubmission(event) {
                return confirm('Are you sure you want to cancel and refund this booking?');
            }
        }
        function closeModal(modalId, overlayId) {
            const modal = document.getElementById(modalId);
            const overlay = document.getElementById(overlayId);

            if (modal && overlay) {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
                overlay.classList.add('hidden');
            }
        }
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const target = button.getAttribute('data-modal-target');
                openModal(target, 'popup-modal-overlay');
            });
        });

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
    </script>
</x-app-layout>
