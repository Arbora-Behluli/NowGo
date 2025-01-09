<x-app-layout>
    <div class="container px-6 py-8 mx-auto flex flex-col md:flex-row items-start md:items-center">
        <!-- Welcome Message -->
        <div class="text-left p-6 mb-6 md:w-1/2 bg-transparent">
            <div class=" p-6 ">
                <h1 class="text-4xl font-bold text-white">
                    {{ __('messages.Welcome') }}, {{ Auth::user()->name }}!
                </h1>
                <p class="text-lg text-white mt-2">
                    {{ __('messages.Start your journey, one trip at a time!') }}
                </p>
            </div>
        </div>

        <!-- Total Stats -->
        <div class="flex flex-col w-full md:w-1/2 space-y-6">
            <!-- Total Users -->
            <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="p-3 bg-blue-700 bg-opacity-75 rounded-full">
                    <img src="{{ asset('storage/icons/users.svg') }}" alt="Users" class="h-6 w-6" />
                </div>
                <div class="mx-5">
                    <a href="{{ route('superadmin.index') }}">
                        <h4 class="text-2xl font-semibold text-gray-700">{{$totalUsers}}</h4>
                        <div class="text-gray-500">{{ __('messages.Total Users') }}</div>
                    </a>
                </div>
            </div>

            <!-- Total Trips -->
            <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="p-3 bg-blue-700 bg-opacity-75 rounded-full">
                    <img src="{{ asset('storage/icons/road.svg') }}" alt="Trips" class="h-6 w-6" />
                </div>
                <div class="mx-5">
                    <a href="{{ route('superadmin.index', ['tab' => 'trips']) }}">
                        <h4 class="text-2xl font-semibold text-gray-700">{{$totalTrips}}</h4>
                        <div class="text-gray-500">{{ __('messages.Total Trips') }}</div>
                    </a>
                </div>
            </div>

            <!-- Total Bookings -->
            <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="p-3 bg-blue-700 bg-opacity-75 rounded-full">
                    <img src="{{ asset('storage/icons/cars.svg') }}" alt="Bookings" class="h-6 w-6" />
                </div>
                <div class="mx-5">
                    <a href="{{ route('superadmin.index', ['tab' => 'bookings']) }}">
                        <h4 class="text-2xl font-semibold text-gray-700">{{$totalBookings}}</h4>
                        <div class="text-gray-500">{{ __('messages.Total Bookings') }}</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

            <div class="mt-4">
                <div class="flex flex-wrap -mx-6">

                </div>
            </div>
            <div class="mt-8">
                <h3 class="text-2xl font-medium text-white mb-6">{{ __('messages.Analytics') }}</h3>
                <div class="flex flex-col md:flex-row md:space-x-6 space-y-6 md:space-y-0">
                    <!-- First Chart -->
                    <div class="flex-1 bg-white p-6 rounded-lg shadow-md">
                        <canvas id="myChart" class="w-full h-64 md:h-80"></canvas>
                    </div>
                    <!-- Second Chart -->
                    <div class="flex-1 bg-white p-6 rounded-lg shadow-md">
                        <canvas id="myChart1" class="w-full h-64 md:h-80"></canvas>
                    </div>
                </div>
            </div>
            <div class="flex mt-8 gap-4 ">
      

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx1 = document.getElementById('myChart').getContext('2d');
            const data1 = {
                labels: ['{{ __('messages.Verified Users with drivers license') }}', '{{ __('messages.Unverified Users') }}'],
                datasets: [{
                    label: 'Count',
                    data: [
                        {{ $verifiedUsers }}, 
                        {{ $nullStatusUsers }},
                    ],
                    backgroundColor: [
                        '#90DB89', 
                        '#FF6347', 
                    ],
                    borderWidth: 1
                }]
            };
            const config1 = {
                type: 'polarArea',
                data: data1,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    }
                }
            };
            new Chart(ctx1, config1);

            // Second Chart (Pie Chart)
            const ctx2 = document.getElementById('myChart1').getContext('2d');

            // Data for the chart
            const data2 = {
                labels: ['{{ __('messages.Users') }}','{{ __('messages.Trips') }}','{{ __('messages.Bookings') }}'],
                datasets: [{
                    label: 'Distribution',
                    data: [{{ $totalUsers }}, {{ $totalTrips }}, {{ $totalBookings }}], // Replace with dynamic data
                    backgroundColor: [
                        '#607ADB', // Teal Blue for Users
                        '#FFBF00', // Warm Amber for Trips
                        '#39CEDB', // Muted Coral for Bookings
                    ],
                    hoverOffset: 4
                }]
            };

            // Chart configuration
            const config2 = {
                type: 'doughnut',
                data: data2,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    }
                }
            };

            // Create chart
            new Chart(ctx2, config2);
        });
    </script>

</x-app-layout>
