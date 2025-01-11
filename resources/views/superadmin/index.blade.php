<x-app-layout>
    <div x-data="userSearch()" class="px-4 sm:px-10 lg:px-20 mx-auto">
        <!-- Top Section: Buttons and Search Bar -->
        <div class="w-full flex justify-between items-center py-4 mt-10 ">
            <!-- Left Side: Buttons -->
            <div class="flex items-center">
                <button 
                    @click="currentTab = 'users'" 
                    :class="currentTab === 'users' ? 'text-gray-900 underline' : ''" 
                    class="mr-3 font-semibold"
                >
                    Users
                </button>
                <button 
                    @click="currentTab = 'bookings'" 
                    :class="currentTab === 'bookings' ? 'text-gray-900 underline' : ''" 
                    class="mr-3 font-semibold"
                >
                    Bookings
                </button>
                <button 
                    @click="currentTab = 'trips'" 
                    :class="currentTab === 'trips' ? 'text-gray-900 underline' : ''"
                    class="font-semibold"
                >
                    Trips
                </button>
            </div>
    
            <!-- Right Side: Search Bar -->
            <div class="flex items-center">
                <div class="relative w-full max-w-sm">
                    <input
                        class="bg-white w-full pr-11 h-8 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-full transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                        id="search"
                        name="search"
                        type="search"
                        x-model="search"
                        placeholder="Search"
                    />
                    <button
                        class="absolute h-6 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded overflow-hidden"
                        type="button"
                        @click="filteredUsers()"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6 text-slate-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    
      <div id="users" x-show="currentTab === 'users'" 
    class="relative rounded-lg flex flex-col h-full overflow-y-auto max-h-[calc(80vh-100px)] text-gray-700 bg-white shadow-lg w-full">
   <table class="w-full text-left table-auto border-collapse">
       <thead>
           <tr class="border-b border-slate-300 bg-white-500">
               <th class="p-4 text-sm leading-none text-gray-400 text-left hidden sm:table-cell">Image</th>
               <th class="p-4 text-sm leading-none text-gray-400 text-left">Name</th>
               <th class="p-4 text-sm leading-none text-gray-400 text-left">Phone</th>
               <th class="p-4 text-sm leading-none text-gray-400 text-left">City</th>
               <th class="p-4 text-sm leading-none text-gray-400 text-left">Email</th>
               <th class="p-4 text-sm leading-none text-gray-400 text-left">Joined</th>
               <th class="p-4 text-sm leading-none text-gray-400 text-left">Super Admin</th>
               <th class="p-4 text-sm leading-none text-gray-400 text-left">Edit</th>
               <th class="p-4 text-sm leading-none text-gray-400 text-left">Delete</th>
           </tr>
       </thead>
       <tbody>
           <template x-for="user in filteredUsers()" :key="user.id">
               <tr class="bg-gray-100 hover:bg-gray-200">

                   <td class="border-b border-slate-200 lg:py-5 lg:px-2 xl:px-5 xl:px-2 sm:px-4 sm:py-2 md:py-4 md:px-4 hidden sm:table-cell">
                       <img class="lg:w-14 lg:h-14 md:w-10 xl:w-15 xl:h-15 md:h-10 sm:h-10 sm:w-10 object-cover rounded-full"
                            :src="user.image ? `{{ asset('storage/') }}/${user.image}` : `https://eu.ui-avatars.com/api/${user.name}+${user.lastname}`"
                            alt="User Image">
                   </td>
                   <td class="p-4 border-b border-slate-200 py-5" x-text="`${user.name || ''} ${user.lastname || ''}`"></td>
                   <td class="p-4 border-b border-slate-200 py-5" x-text="user.phone || ''"></td>
                   <td class="p-4 border-b border-slate-200 py-5" x-text="user.city || ''"></td>
                   <td class="p-4 border-b border-slate-200 py-5" x-text="user.email || ''"></td>
                   <td class="p-4 border-b border-slate-200 py-5" x-text="formatDate(user.created_at) || ''"></td>
                   <td class="p-4 border-b border-slate-200 py-5" x-text="user.is_super_admin == 1 ? 'Yes' : 'No'"></td>
                   <td class="p-4 border-b border-slate-200 py-5">
                       <a :href="`{{ route('superadmin.edit', '') }}/${user.id}`">
                           <button type="button" class="text-slate-500 hover:text-slate-700">
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                   <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                               </svg>
                           </button>
                       </a>
                   </td>
                   <td class="p-4 border-b border-slate-200 py-5">
                       <form :action="`{{ route('superadmin.users.destroy', '') }}/${user.id}`" method="POST" @submit.prevent="confirmDelete($event)">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="text-slate-500 hover:text-slate-700">
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                               </svg>
                           </button>
                       </form>
                   </td>
               </tr>
           </template>
       </tbody>
   </table>
</div>
        <div id="bookings" x-show="currentTab === 'bookings'" class="relative flex flex-col w-full h-full overflow-y-auto max-h-[calc(80vh-100px)] text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                <tr class="border-b border-slate-300 bg-white">
                    <th class="p-4 text-sm leading-none text-gray-400">Trip Id</th>
                    <th class="p-4 text-sm leading-none text-gray-400">Passenger</th>
                    <th class="p-4 text-sm leading-none text-gray-400">Seats Booked</th>
                    <th class="p-4 text-sm leading-none text-gray-400">Status</th>
                    <th class="p-4 text-sm leading-none text-gray-400">Delete</th>
                </tr>
                </thead>
                <tbody>
                <template x-for="booking in filteredBookings()" :key="booking.id">
                    <tr class="bg-gray-100 hover:bg-gray-200">
                        <td class="p-4 border-b border-slate-200 py-5" x-text="booking.trip_id"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="booking.passenger.name"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="booking.seats_booked"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="booking.status"></td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <form :action="`{{ route('superadmin.booking.delete', '') }}/${booking.id}`" method="POST" @submit.prevent="confirmDelete($event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-slate-500 hover:text-slate-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>

        <div id="trips" x-show="currentTab === 'trips'" class="relative flex flex-col w-full h-full overflow-y-auto max-h-[calc(80vh-100px)] text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                <tr class="border-b border-slate-300 bg-white">
                    <th class="p-4 text-sm leading-none text-gray-400">Driver</th>
                    <th class="p-4 text-sm leading-none text-gray-400">Origin City</th>
                    <th class="p-4 text-sm leading-none text-gray-400">Destination City</th>
                    <th class="p-4 text-sm leading-none text-gray-400">Departure Time</th>
                    <th class="p-4 text-sm leading-none text-gray-400">Arrival Time</th>
                    <th class="p-4 text-sm leading-none text-gray-400">Available Seats</th>
                    <th class="p-4 text-sm leading-none text-gray-400">Price</th>
                    <th class="p-4 text-sm leading-none text-gray-400">Edit</th>
                    <th class="p-4 text-sm leading-none text-gray-400">Delete</th>
                </tr>
                </thead>
                <tbody>
                <template x-for="trip in filteredTrips()" :key="trip.id">
                    <tr class="bg-gray-100 hover:bg-gray-200">
                        <td class="p-4 border-b border-slate-200 py-5" x-text="trip.users.name"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="trip.origincity.name"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="trip.destinationcity.name"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="new Date(trip.departure_time).toLocaleString('en-GB', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' })"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="new Date(trip.arrival_time).toLocaleString('en-GB', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' })"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="trip.available_seats"></td>
                        <td class="p-4 border-b border-slate-200 py-5" x-text="trip.price"></td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <a :href="`/superadmin/${trip.id}/edit-trip`">
                                <button type="button" class="text-slate-500 hover:text-slate-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                    </svg>
                                </button>
                            </a>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <form :action="`{{ route('superadmin.trip.delete', '') }}/${trip.id}`" method="POST" @submit.prevent="confirmDelete($event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-slate-500 hover:text-slate-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>

    </div>

        <script>
            function userSearch() {
                return {
                    search: '',
                    currentTab: new URLSearchParams(window.location.search).get('tab') || 'users',
                    users: @json($users),
                    authUser: @json(auth()->id()) ,
                    bookings: @json($bookings),
                    trips: @json($trips),
                    filteredUsers() {
                        if (this.search === '') {
                            return this.users.filter(user => user.id !== this.authUser);
                        }
                        return this.users.filter(user =>
                            user.id !== this.authUser &&(
                            (user.name && user.name.toLowerCase().includes(this.search.toLowerCase())) ||
                            (user.lastname && user.lastname.toLowerCase().includes(this.search.toLowerCase())) ||
                            (user.phone && user.phone.includes(this.search)) ||
                            (user.city && user.city.toLowerCase().includes(this.search.toLowerCase())) ||
                            (user.email && user.email.toLowerCase().includes(this.search.toLowerCase())) ||
                            (user.created_at && user.created_at.includes(this.search)) ||
                            (user.role && user.role.toLowerCase().includes(this.search.toLowerCase()))
                                )
                        );
                    },
                    filteredBookings() {
                        if (this.search === '') return this.bookings;
                        return this.bookings.filter(booking =>
                            (booking.trip_id && booking.trip_id.toString().includes(this.search)) ||
                            (booking.passenger && booking.passenger.name.toLowerCase().includes(this.search.toLowerCase())) ||
                            (booking.seats_booked && booking.seats_booked.toString().includes(this.search)) ||
                            (booking.status && booking.status.toLowerCase().includes(this.search.toLowerCase()))
                        );
                    },
                    filteredTrips() {
                        if (this.search === '') return this.trips;
                        return this.trips.filter(trip =>
                            (trip.users && trip.users.name.toLowerCase().includes(this.search.toLowerCase())) ||
                            (trip.origincity && trip.origincity.name.toLowerCase().includes(this.search.toLowerCase())) ||
                            (trip.destinationcity && trip.destinationcity.name.toLowerCase().includes(this.search.toLowerCase())) ||
                            (trip.departure_time && trip.departure_time.includes(this.search)) ||
                            (trip.arrival_time && trip.arrival_time.includes(this.search)) ||
                            (trip.available_seats && trip.available_seats.toString().includes(this.search)) ||
                            (trip.price && trip.price.toString().includes(this.search))
                        );
                    },
                    formatDate(dateString) {
                        const date = new Date(dateString);
                        const day = String(date.getDate()).padStart(2, '0');
                        const month = String(date.getMonth() + 1).padStart(2, '0');
                        const year = date.getFullYear();
                        return `${day}/${month}/${year}`;
                    }
                };
            }
                function confirmDelete(event) {
                    if (confirm('Are you sure you want to delete?')) {
                        event.target.submit();
                    } else {
                        event.preventDefault();
                    }
                }
        </script>




</x-app-layout>
