<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-[#00674F] ">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class=" fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-[100] inset-y-0 left-0 w-64 overflow-y-auto transition duration-300 transform bg-[#12372A] lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
            </div>
            <nav class="mt-10 ">
                @if(Auth::user()->isSuperAdmin())
                <a class="flex items-center rounded-full px-6 py-2 mt-4 {{ Request::routeIs('dashboard') ? 'bg-[#436850] text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('dashboard') }}">
                    <img src="{{ asset('storage/icons/dashboard.svg') }}" alt="avatar" class="relative inline-block h-6 w-6 object-cover object-center " />
                    <span class="mx-3 text-white">{{ __('messages.Dashboard') }}</span>


                </a>
                @endif
                <a class="flex items-center px-6 py-2 mt-4 {{ Request::routeIs('profile.index') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('profile.index') }}">
                    <img src="{{ asset('storage/icons/profil.svg') }}" alt="avatar" class="relative inline-block h-6 w-6 object-cover object-center" />
                    <span class="mx-3 text-white">{{ __('messages.Profile') }}</span>
                </a>

                <a class="flex items-center px-6 py-2 mt-4 {{ Request::routeIs('trips.index') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('trips.index') }}">
                    <img src="{{ asset('storage/icons/car.svg') }}" alt="avatar" class="relative inline-block h-6 w-6 object-cover object-center" />
                    <span class="mx-3 text-white">{{ __('messages.Available Rides') }}</span>
                </a>
                <div x-data="{ openTab: null }">
                    <div  class="mt-4">
                        <div @click="openTab = (openTab === 1 ? null : 1)" class="flex items-center px-6 py-2 cursor-pointer text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                            <img src="{{ asset('storage/icons/book.svg') }}" alt="menu" class="relative inline-block h-6 w-6 object-cover object-center" />
                            <span class="mx-3 text-white">{{ __('messages.Bookings') }}</span>
                            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 ml-auto" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06 0L10 10.94l3.71-3.73a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z" clip-rule="evenodd" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 ml-auto transition-transform duration-300" :class="openTab === 1 ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06 0L10 10.94l3.71-3.73a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div x-show="openTab === 1" class="pl-12" x-transition>
                            <a class="flex items-center px-4 py-2 mt-2 {{ Request::routeIs('bookings.index') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('bookings.index') }}">
                                <img src="{{ asset('storage/icons/booking.svg') }}" alt="avatar" class="relative inline-block h-5 w-5 object-cover object-center" />
                                <span class="mx-3 text-sm text-white">{{ __('messages.My Bookings') }}</span>
                            </a>
                            <a class="flex items-center px-4 py-2 mt-2 {{ Request::routeIs('bookings.myTrips') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('bookings.myTrips') }}">
                                <img src="{{ asset('storage/icons/trips.svg') }}" alt="avatar" class="relative inline-block h-5 w-5 object-cover object-center" />
                                <span class="mx-3 text-sm text-white ">{{ __('messages.My Trips Bookings') }}</span>
                            </a>
                            <a class="flex items-center px-4 py-2 mt-2 {{ Request::routeIs('bookings.myTransactions') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('bookings.transactions') }}">
                                <img src="{{ asset('storage/icons/credit-card.svg') }}" alt="avatar" class="relative inline-block h-6 w-6 object-cover object-center" />
                                <span class="mx-3 text-sm text-white">{{ __('messages.My Transactions') }}</span>
                            </a>
                            <a class="flex items-center px-4 py-2 mt-2 {{ Request::routeIs('user.qr-code') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('user.qr-code', ['id' => auth()->user()->id]) }}">
                                <img src="{{ asset('storage/icons/qr-code.svg') }}" alt="avatar" class="relative inline-block h-5 w-5 object-cover object-center" />
                                <span class="mx-3 text-sm text-white">{{ __('messages.My QR-Code') }}</span>
                            </a>
                            <a class="flex items-center px-4 py-2 mt-2 {{ Request::routeIs('scan.qr') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('scan.qr', auth()->user()->id) }}">
                                <img src="{{ asset('storage/icons/qr-code-scanning.svg') }}" alt="avatar" class="relative inline-block h-5 w-5 object-cover object-center" />
                                <span class="mx-3 text-sm text-white">{{ __('messages.Scan QR-Code') }}</span>
                            </a>
                        </div>
                    </div>
                        @if(Auth::user()->isSuperAdmin())
                    <div x-data="{ open: false }" class="mt-4">
                        <div @click="openTab = (openTab === 2 ? null : 2)" class="flex items-center px-6 py-2 cursor-pointer text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                            <img src="{{ asset('storage/icons/table.svg') }}" alt="menu" class="relative inline-block h-6 w-6 object-cover object-center" />
                            <span class="mx-3 text-white">{{ __('messages.Admin Panel') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 ml-auto transition-transform duration-300" :class="openTab === 2 ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06 0L10 10.94l3.71-3.73a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z" clip-rule="evenodd" />
                            </svg>
                            <svg x-show="open" :class="open ? 'rotate-180' : 'rotate-0'" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 ml-auto" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M14.77 12.79a.75.75 0 00-1.06 0L10 16.52 6.29 12.8a.75.75 0 10-1.06 1.06l4.25 4.25a.75.75 0 001.06 0l4.25-4.25a.75.75 0 000-1.06z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div x-show="openTab === 2" class="pl-12" x-transition>
                            <a class="flex items-center px-4 py-2 mt-2 {{ Request::routeIs('superadmin.index') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('superadmin.index') }}">
                                <img src="{{ asset('storage/icons/table.svg') }}" alt="avatar" class="relative inline-block h-5 w-5 object-cover object-center" />
                                <span class="mx-3 text-sm text-white">{{ __('messages.Users, Booking, Trips') }}</span>
                            </a>
                            <a class="flex items-center px-4 py-2 mt-2 {{ Request::routeIs('superadmin.users.index-users') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('superadmin.users.index-users') }}">
                                <img src="{{ asset('storage/icons/verify.svg') }}" alt="avatar" class="relative inline-block h-5 w-5  object-cover object-center" />
                                <span class="mx-3 text-sm text-white">{{ __('messages.Verifications') }}</span>
                            </a>
                            <a class="flex items-center px-4 py-2 mt-2 {{ Request::routeIs('superadmin.bg-check') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route('superadmin.bg-check') }}">
                                <img src="{{ asset('storage/icons/secure.svg') }}" alt="avatar" class="relative inline-block h-5 w-5  object-cover object-center" />
                                <span class="mx-3 text-sm text-white">{{ __('messages.Background Check') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                    @endif
                    @if( Auth::user()->isSuperAdmin())
                        <a class="flex items-center px-6 py-2 mt-4 {{ Request::routeIs('superadmin.transactions') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}"
                           href="{{ route('superadmin.transactions') }}">
                            <img
                                src="{{ asset('storage/icons/transactions.svg') }}"
                                alt="avatar"
                                class="relative inline-block h-6 w-6  object-cover object-center"
                            />
                            </svg>

                            <span class="mx-3 text-white">{{ __('messages.Transactions') }}</span>
                        </a>
                    @endif
                <a class="flex items-center px-6 py-2 mt-4 {{ Request::routeIs(config('chatify.routes.prefix')) ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' }}" href="{{ route(config('chatify.routes.prefix')) }}">
                    <img src="{{ asset('storage/icons/chat.svg') }}" alt="avatar" class="relative inline-block h-5 w-5 object-cover object-center" />
                    <span class="mx-3 text-white">{{ __('messages.Chat') }}</span>
                </a>
            </nav>
        </div>
        <div class="flex flex-col flex-1 overflow-hidden ">
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b-2 border-gray-800">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex-none h-full text-center flex items-center space-x-4 sm:space-x-4 ">
                    <div class="relative flex items-center">
                        <!-- Notification Button -->
                        <button id="notificationButton" aria-label="Notifications" class="relative inline-block h-7 w-7 object-cover object-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell w-5 h-5" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                            </svg>
                            <span id="notificationBadge" class="absolute top-0 right-0 block w-4 h-4 rounded-full text-white text-xs font-bold flex items-center justify-center hidden">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                            <span id="number" class="relative inline-flex rounded-full h-4 w-4 bg-indigo-500 text-white text-xs font-bold flex items-center justify-center"></span></span>
                        </button>

                        <!-- Modal -->
                        <div id="notificationModal" class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 w-72 sm:w-96 bg-white rounded-lg shadow-lg hidden z-10">
                            <!-- Modal Header -->
                            <div class="flex justify-between items-center border-b p-2 bg-indigo-950 text-gray-100 rounded-t-lg">
                                <h2 class="text-md font-semibold">{{ __('messages.Notifications') }}</h2>
                                <button id="closeModalButton" aria-label="Close Modal" class="text-gray-100 hover:text-gray-500 focus:outline-none">
                                    &times;
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="p-4 max-h-44 overflow-y-auto">
                                @php
                                    $displayedIds = [];
                                @endphp
                                <ul id="notificationList" class="space-y-2">
                                    @forelse ($notifications as $notification)
                                        @if (!in_array($notification->id, $displayedIds))
                                            @php
                                                $displayedIds[] = $notification->id; // Add the ID to the array to track it.
                                            @endphp

                                            <li id="notification-{{ $notification->id }}" class="p-2 bg-gray-100 rounded space-x-4">
                                                <div class="flex justify-between space-x-4 divide-x divide-gray-800">
                                                    <div class="mx-auto">
                                                        <div>
                                                            <span class="text-sm">{!! $notification->message !!}</span>
                                                        </div>
                                                        <div class=" mx-auto">
                                                            <span class=" text-xs text-end italic">{{ $notification->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center p-4">
                                                        <form action="{{route('notifications.read', $notification)}}" method="POST" >
                                                            @csrf
                                                            @method('Patch')
                                                            <button class="text-center">
                                                                <svg class="w-5 h-5" viewBox="-2 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>open-envelope</title> <desc>Created with Sketch.</desc> <g id="icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="ui-gambling-website-lined-icnos-casinoshunter" transform="translate(-864.000000, -282.000000)" fill="#252528" fill-rule="nonzero"> <g id="square-filled" transform="translate(50.000000, 120.000000)"> <path d="M843,176 C844.656854,176 846,177.343146 846,179 L846,195 C846,196.656854 844.656854,198 843,198 L817,198 C815.343146,198 814,196.656854 814,195 L814,179 C814,177.343146 815.343146,176 817,176 L817,165 C817,163.343146 818.2934,162 819.888889,162 L837.23926,162 C837.707727,162 838.160134,162.177317 838.511777,162.498753 L842.346591,166.004143 C842.761968,166.383838 843,166.930731 843,167.505391 L843,176 Z M839.649,194 L820.35,194 L817.850781,196 L842.149219,196 L839.649,194 Z M816.019661,178.805377 L816.006728,178.883379 C816.002284,178.921636 816,178.960551 816,179 L816,195 C816,195.068076 816.006802,195.134562 816.019764,195.198818 C816.147085,194.904701 816.345372,194.643077 816.601391,194.438262 L825.899,186.999 L816.601391,179.561738 C816.340238,179.352815 816.145336,179.09177 816.019661,178.805377 Z M843.980236,178.801182 L843.951824,178.866378 C843.823474,179.133425 843.63582,179.371969 843.3986,179.561745 L834.1,186.999 L843.398609,194.438262 C843.659762,194.647185 843.854664,194.90823 843.980339,195.194623 C843.993474,195.131834 844,195.066679 844,195 L844,179 C844,178.931924 843.993198,178.865438 843.980236,178.801182 Z M829.999694,186.28087 L820.351,193.999 L839.648,193.999 L829.999694,186.28087 Z M836.259,164 L819.888889,164 C819.357059,164 818.925926,164.447715 818.925926,165 L818.925,178.86 L827.499,185.719 L828.75061,184.718887 L828.789,184.69 L828.800725,184.681308 L828.822,184.666 L828.89102,184.616169 C828.902176,184.608728 828.913388,184.601409 828.924656,184.594215 L828.956509,184.574359 L829.075294,184.507032 L829.133981,184.477696 C829.165658,184.462402 829.197378,184.448177 829.229368,184.434819 C829.25279,184.425084 829.276449,184.415727 829.300234,184.406841 C829.323759,184.398025 829.347472,184.389681 829.371301,184.381798 C829.403471,184.371161 829.435809,184.361364 829.468314,184.352407 C829.488042,184.346986 829.507775,184.341877 829.527565,184.337076 C829.566212,184.327667 829.605242,184.319422 829.644425,184.312357 C829.656845,184.310156 829.669199,184.30805 829.681567,184.30606 C829.717,184.30032 829.752615,184.295571 829.7883,184.291785 C829.813988,184.289099 829.839703,184.286871 829.865445,184.285141 C829.884107,184.283851 829.903161,184.282842 829.922221,184.282105 C829.958404,184.280737 829.994188,184.280314 830.02996,184.280849 C830.048798,184.28112 830.0678,184.281676 830.08679,184.282502 C830.121175,184.283992 830.155456,184.28636 830.18967,184.28961 L830.291716,184.301992 C830.306524,184.304124 830.321472,184.306494 830.336398,184.309034 C830.378546,184.316276 830.420173,184.324743 830.461541,184.334542 C830.475151,184.337686 830.488783,184.341064 830.502386,184.344588 C830.534555,184.353007 830.56672,184.362206 830.598679,184.372223 C830.621858,184.379394 830.64481,184.387048 830.667646,184.39513 C830.682081,184.400335 830.69651,184.405629 830.710887,184.411094 C830.799858,184.444815 830.886979,184.485234 830.971474,184.532239 C831.020348,184.559497 831.067809,184.588541 831.114246,184.619719 L831.24939,184.718887 L832.5,185.719 L841.074,178.86 L841.074,170 L838.81978,170 C837.413359,170 836.341236,168.710688 836.263748,167.160652 L836.259259,166.980703 L836.259,164 Z M829.044348,184.523611 L828.956509,184.574359 L828.998992,184.548999 L829.036967,184.52757 L829.044348,184.523611 Z M838.185,164.865 L838.185185,166.980703 C838.185185,167.535984 838.46679,167.934644 838.749297,167.992691 L838.81978,168 L841.074,168 L841.074074,167.505391 L838.185,164.865 Z" id="open-envelope"> </path> </g> </g> </g> </g></svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                    @empty
                                        <li id="noNew" class="text-gray-500">{{__('messages.No new notifications.')}}</li>
                                    @endforelse
                                </ul>
                            </div>

                            <!-- Modal Footer -->
                            <div id="markAllRead" class="bg-indigo-950 p-2 rounded-b-lg flex items-center hidden">
                                <form action="{{ route('notifications.allRead') }}" method="POST" class="mx-auto">
                                    @csrf
                                    @method('PATCH')
                                    <button class="text-gray-100 hover:text-gray-500 underline text-sm">
                                       {{__('messages.Mark All As Read')}}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @include('partials.languageSwitcher')
                    
                    <div class="text-sm md:text-md text-black dark:text-white flex items-center">

                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex  items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white dark:bg-[#0F172A] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div class="w-8 h-8 flex mr-4 hidden sm:block">
                                        @if(auth()->user()->image)
                                            <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="User Image" class="rounded-full w-8 h-8">
                                        @else
                                            <img src="{{ 'https://eu.ui-avatars.com/api/?name=' . urlencode(auth()->user()->name . ' ' . auth()->user()->lastname) . '&size=250' }}" alt="Default Image" class="rounded-full w-8 h-8">
                                        @endif
                                    </div>
                                    <div class="flex items-center space-x-2 mx-2 ">
                                        <div class="text-black dark:text-white">{{ Auth::user()->name }}</div>
                                        <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.index')">
                                    {{ __('messages.Profile') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('messages.Change Preferences') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('messages.Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>

            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#85a98f]">
                {{ $slot }}
            </main>
        </div>
    </div>
<script>
    // Modal functionality
    const notificationButton = document.getElementById('notificationButton');
    const notificationModal = document.getElementById('notificationModal');
    const closeModalButton = document.getElementById('closeModalButton');

    notificationButton.addEventListener('click', () => {
        notificationModal.classList.toggle('hidden');
    });

    closeModalButton.addEventListener('click', () => {
        notificationModal.classList.add('hidden');
    });


    window.addEventListener('click', (event) => {
        if (!notificationModal.contains(event.target) && !notificationButton.contains(event.target)) {
            notificationModal.classList.add('hidden');
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const displayedNotifications = new Set();
        let notificationCount = 0;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const notificationList = document.getElementById('notificationList');
        const notificationBadge = document.getElementById('notificationBadge');
        const markAllReadButton = document.getElementById('markAllRead');
        const number = document.getElementById('number');
        const noNew = document.getElementById('noNew');

        // Initialize notifications from server-rendered HTML
        const initializeNotifications = () => {
            document.querySelectorAll('#notificationList li').forEach(notification => {
                if (notification.id !== 'noNew') {
                    const notificationId = notification.id.replace('notification-', '');
                    displayedNotifications.add(notificationId);
                }
            });
            updateUI();
        };

        const addNotification = (data) => {

            const notificationId = String(data.id);

            if (!data.id || displayedNotifications.has(notificationId)) {
                return;
            }
            const notificationReadRoute = "{{ route('notifications.read', ':id') }}";
            const actionUrl = notificationReadRoute.replace(':id', notificationId);

            displayedNotifications.add(notificationId);

            const notificationItem = document.createElement('li');
            notificationItem.id = `notification-${notificationId}`;
            notificationItem.className = 'p-2 bg-gray-100 rounded space-x-4';
            notificationItem.innerHTML = `
            <div class="flex justify-between space-x-4 divide-x divide-gray-800">
        <div class="mx-auto">
            <div>
                <span class="text-sm">${data.message}</span>
            </div>
            <div>
                <span class="text-xs text-end italic">Just now</span>
            </div>
        </div>
        <div class="flex items-center p-4">
            <form action="${actionUrl}" method="POST">
                <input type="hidden" name="_token" value="${csrfToken}">
                <input type="hidden" name="_method" value="PATCH">
                <button class="text-center">
                    <svg class="w-5 h-5" viewBox="-2 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>open-envelope</title> <desc>Created with Sketch.</desc> <g id="icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="ui-gambling-website-lined-icnos-casinoshunter" transform="translate(-864.000000, -282.000000)" fill="#252528" fill-rule="nonzero"> <g id="square-filled" transform="translate(50.000000, 120.000000)"> <path d="M843,176 C844.656854,176 846,177.343146 846,179 L846,195 C846,196.656854 844.656854,198 843,198 L817,198 C815.343146,198 814,196.656854 814,195 L814,179 C814,177.343146 815.343146,176 817,176 L817,165 C817,163.343146 818.2934,162 819.888889,162 L837.23926,162 C837.707727,162 838.160134,162.177317 838.511777,162.498753 L842.346591,166.004143 C842.761968,166.383838 843,166.930731 843,167.505391 L843,176 Z M839.649,194 L820.35,194 L817.850781,196 L842.149219,196 L839.649,194 Z M816.019661,178.805377 L816.006728,178.883379 C816.002284,178.921636 816,178.960551 816,179 L816,195 C816,195.068076 816.006802,195.134562 816.019764,195.198818 C816.147085,194.904701 816.345372,194.643077 816.601391,194.438262 L825.899,186.999 L816.601391,179.561738 C816.340238,179.352815 816.145336,179.09177 816.019661,178.805377 Z M843.980236,178.801182 L843.951824,178.866378 C843.823474,179.133425 843.63582,179.371969 843.3986,179.561745 L834.1,186.999 L843.398609,194.438262 C843.659762,194.647185 843.854664,194.90823 843.980339,195.194623 C843.993474,195.131834 844,195.066679 844,195 L844,179 C844,178.931924 843.993198,178.865438 843.980236,178.801182 Z M829.999694,186.28087 L820.351,193.999 L839.648,193.999 L829.999694,186.28087 Z M836.259,164 L819.888889,164 C819.357059,164 818.925926,164.447715 818.925926,165 L818.925,178.86 L827.499,185.719 L828.75061,184.718887 L828.789,184.69 L828.800725,184.681308 L828.822,184.666 L828.89102,184.616169 C828.902176,184.608728 828.913388,184.601409 828.924656,184.594215 L828.956509,184.574359 L829.075294,184.507032 L829.133981,184.477696 C829.165658,184.462402 829.197378,184.448177 829.229368,184.434819 C829.25279,184.425084 829.276449,184.415727 829.300234,184.406841 C829.323759,184.398025 829.347472,184.389681 829.371301,184.381798 C829.403471,184.371161 829.435809,184.361364 829.468314,184.352407 C829.488042,184.346986 829.507775,184.341877 829.527565,184.337076 C829.566212,184.327667 829.605242,184.319422 829.644425,184.312357 C829.656845,184.310156 829.669199,184.30805 829.681567,184.30606 C829.717,184.30032 829.752615,184.295571 829.7883,184.291785 C829.813988,184.289099 829.839703,184.286871 829.865445,184.285141 C829.884107,184.283851 829.903161,184.282842 829.922221,184.282105 C829.958404,184.280737 829.994188,184.280314 830.02996,184.280849 C830.048798,184.28112 830.0678,184.281676 830.08679,184.282502 C830.121175,184.283992 830.155456,184.28636 830.18967,184.28961 L830.291716,184.301992 C830.306524,184.304124 830.321472,184.306494 830.336398,184.309034 C830.378546,184.316276 830.420173,184.324743 830.461541,184.334542 C830.475151,184.337686 830.488783,184.341064 830.502386,184.344588 C830.534555,184.353007 830.56672,184.362206 830.598679,184.372223 C830.621858,184.379394 830.64481,184.387048 830.667646,184.39513 C830.682081,184.400335 830.69651,184.405629 830.710887,184.411094 C830.799858,184.444815 830.886979,184.485234 830.971474,184.532239 C831.020348,184.559497 831.067809,184.588541 831.114246,184.619719 L831.24939,184.718887 L832.5,185.719 L841.074,178.86 L841.074,170 L838.81978,170 C837.413359,170 836.341236,168.710688 836.263748,167.160652 L836.259259,166.980703 L836.259,164 Z M829.044348,184.523611 L828.956509,184.574359 L828.998992,184.548999 L829.036967,184.52757 L829.044348,184.523611 Z M838.185,164.865 L838.185185,166.980703 C838.185185,167.535984 838.46679,167.934644 838.749297,167.992691 L838.81978,168 L841.074,168 L841.074074,167.505391 L838.185,164.865 Z" id="open-envelope"> </path> </g> </g> </g> </g></svg>
                </button>
            </form>
        </div>
    </div>
        `;

            notificationList.prepend(notificationItem);

            if (noNew) noNew.classList.add('hidden');
            updateUI();
        };


        const updateUI = () => {
            notificationCount = displayedNotifications.size;
            if (number) number.textContent = notificationCount;
            if (notificationBadge) notificationBadge.classList.toggle('hidden', notificationCount === 0);
            if (markAllReadButton) markAllReadButton.classList.toggle('hidden', notificationCount === 0);
        };

        const markAllAsRead = async () => {
            try {
                const response = await fetch('/notifications/mark-all-read', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': csrfToken }
                });
                if (response.ok) {
                    displayedNotifications.clear();
                    notificationList.innerHTML = '<li id="noNew" class="text-gray-500">No new notifications.</li>';
                    updateUI();
                } else {
                    console.error('Failed to mark notifications as read.');
                }
            } catch (error) {
                console.error('Error marking notifications as read:', error);
            }
        };

        const setupRealTimeNotifications = () => {
            if (window.Echo) {
                window.Echo.channel(`notifications${window.auth_user.id}`)
                    .listen('.notifications', (data) => {
                        if (data.user_id === window.auth_user.id) {
                            addNotification(data);
                        }
                    });
            } else {
                console.error('Echo is not initialized!');
            }
        };


        if (markAllReadButton) {
            markAllReadButton.addEventListener('click', markAllAsRead);
        }

        initializeNotifications();
        setupRealTimeNotifications();
    });


</script>
