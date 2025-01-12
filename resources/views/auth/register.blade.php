    <x-app-layout>
        <svg class="absolute top-0 left-0 w-full h-full z-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 1440" preserveAspectRatio="none">
            <path d="M0 0C150 400 50 800 300 1100C500 1350 200 1440 0 1440L0 1440H800V0Z" fill="#85a98f" />
            <path d="M0 0C100 300 200 700 150 1100C100 1350 50 1440 0 1440L0 1440H800V0Z" fill="#00674F" opacity="0.1" />
        </svg>

    <div class="relative min-h-screen sm:flex sm:flex-row justify-center bg-transparent rounded-3xl shadow-xl">
        <div class="flex-col flex self-center lg:px-14 sm:max-w-4xl xl:max-w-md z-10" style="transform: translateY(-40px);">
            <div class="self-start hidden lg:flex flex-col text-gray-300">
                <h1 class="text-black my-3 font-semibold font-sans text-4xl">Create your account</h1>
                <p class="text-black pr-3 text-sm opacity-75">NowGo – Udhëto larg, ndjehu afër.</p>
            </div>
        </div>
            <div class="flex justify-center self-center pl-4 pr-4 z-10">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="p-1 bg-white mx-auto border-4 border-transparent mt-8 shadow-md transition duration-300 hover:shadow-lg mb-20 sm:mb-0">
                    @csrf
                    <div class="mb-7 font-sans ml-4">
                        <h3 class="text-2xl text-gray-800 mb-2 mt-4">Sign Up</h3>
                        <p class="text-gray-400">Already have an account? <a href="{{ route('login') }}" class="text-sm text-blue-900 hover:text-blue-900">Sign In</a></p>
                    </div>
                    <div class="space-y-6 font-sans">
                <!-- Profile Image -->
                <div class="flex justify-between w-full px-2 align-end">
                    <div >
                        <label for="image" class="block mb-5 text-md font-medium text-gray-700">Profile Picture</label>
                        <label for="image" class="mx-auto px-3 flex items-center justify-center border border-gray-400 bg-gray-200  hover:bg-gray-400 text-gray-700 hover:text-white py-2 rounded-xl tracking-wide text-sm cursor-pointer transition ease-in duration-200">
                            Choose Image
                        </label>
                    </div>
                    <div class="pr-4" >
                        <input id="image" class="hidden" type="file" name="image" accept="image/*" onchange="previewImage(event)">
                    <img id="profileImage"
                        src=""
                        alt=""
                        class="border-2 border-gray-400 w-28 h-28 rounded-full hidden">
                    </div>
                </div>
        
        <div class="flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0 mx-2">
            <div class="w-full md:w-1/2">
                <input id="name" class="w-full text-sm px-3 py-2 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="text" name="name" placeholder="First Name" value="{{ old('name') }}" required autofocus />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2">
                <input id="lastname" class="w-full text-sm px-3 py-2 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="text" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}" required />
                @error('lastname')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
                        <!-- email -->
                        <div class="mx-2">
                            <input id="email" class="w-full text-sm px-3 py-2 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="email" name="email" placeholder="Email" value="{{old('email')}}" required />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
        <!-- Birthday and City Row -->
        <div class="flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0 mt-4 mx-2">
            <div class="w-full md:w-1/2">
                <input id="birthday"
                    class="w-full text-sm px-3 py-2 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none"
                    type="text" name="birthday" value="{{ old('birthday') }}" required
                    placeholder="Select your birthday" />
                @error('birthday')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 max-h-96 relative">
                <div x-data="{ open: false, selected: { id: null, name: null } }">
                    <input type="hidden" name="city" x-model="selected.id">
                    <button
                        type="button"
                        @click="open = !open"
                        class="w-full text-sm px-3 py-2 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg flex justify-between items-center"
                        aria-haspopup="listbox"
                        :aria-expanded="open">
                        <span x-text="selected.name ? selected.name : 'City'"></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.29a1 1 0 011.41 0L10 10.58l3.36-3.29a1 1 0 111.36 1.42l-4 3.93a1 1 0 01-1.36 0l-4-3.93a1 1 0 010-1.42z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul
                        x-show="open"
                        @click.away="open = false"
                        class="absolute mt-1 w-full bg-white shadow-md max-h-60 rounded-md overflow-auto z-10 border border-gray-200 focus:outline-none"
                        role="listbox">
                        @foreach ($cities as $city)
                            <li
                                @click="selected = { id: '{{ $city->id }}', name: '{{ $city->name }}' }; open = false;"
                                :class="selected && selected.id == '{{ $city->id }}' ? 'bg-indigo-600 text-white' : 'text-gray-900'"
                                class="cursor-pointer select-none relative py-2 px-3 hover:bg-indigo-100">
                                <span class="block truncate">{{ $city->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @error('city')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0 mt-4 mx-2">
            <div class="w-full md:w-1/2">
                <input id="phone" class="w-full text-sm px-3 py-2 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="text" name="phone" placeholder="Phone Number" value="{{old('phone')}}" required />        @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 max-h-96 relative">
                <div x-data="{
                    open: false,
                    selected: @json(old('gender') ? ['value' => old('gender'), 'label' => ucfirst(old('gender'))] : null)
                }" class="relative">
                    <input type="hidden" name="gender" x-model="selected.value" />
                    <button
                        type="button"
                        @click="open = !open"
                        class="w-full text-sm px-3 py-2 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg flex justify-between items-center"
                        aria-haspopup="listbox"
                        :aria-expanded="open">
                        <span x-text="selected ? selected.label : 'Gender'"></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.29a1 1 0 011.41 0L10 10.58l3.36-3.29a1 1 0 111.36 1.42l-4 3.93a1 1 0 01-1.36 0l-4-3.93a1 1 0 010-1.42z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul
                        x-show="open"
                        @click.away="open = false"
                        class="absolute mt-1 w-full bg-white shadow-md max-h-60 rounded-md overflow-auto z-10 border border-gray-200 focus:outline-none"
                        role="listbox">
                        <li
                            @click="selected = { value: 'male', label: 'Male' }; open = false;"
                            :class="selected && selected.value == 'male' ? 'bg-indigo-600 text-white' : 'text-gray-900'"
                            class="cursor-pointer select-none relative py-2 px-3 hover:bg-indigo-100">
                            <span class="block truncate">Male</span>
                        </li>
                        <li
                            @click="selected = { value: 'female', label: 'Female' }; open = false;"
                            :class="selected && selected.value == 'female' ? 'bg-indigo-600 text-white' : 'text-gray-900'"
                            class="cursor-pointer select-none relative py-2 px-3 hover:bg-indigo-100">
                            <span class="block truncate">Female</span>
                        </li>
                    </ul>
                </div>
                @error('gender')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- Password and Confirm Password Row -->
        <div class="flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0 mt-4 mx-2">
            <div class="w-full md:w-1/2">
                <input id="password" class="w-full text-sm px-3 py-2 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="password" name="password" placeholder="Password" required />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2">
                <input id="password_confirmation" class="w-full text-sm px-3 py-2 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" type="password" name="password_confirmation" placeholder="Confirm Password" required />
            </div>
        </div>
        
        
                <div class="px-2 form-group">
                        {!! app('captcha')->display() !!}
                </div>
        
                @if ($errors->has('g-recaptcha-response'))
            <div class="alert alert-danger">
                {{ $errors->first('g-recaptcha-response') }}
            </div>
        @endif
        
                        <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="mx-auto px-14 flex items-center justify-center mb-6 border bg-blue-700 hover:border-blue-900 hover:bg-blue-800 text-white text-base py-2.5 tracking-wide font-medium cursor-pointer transition ease-in duration-500">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <svg class="absolute bottom-0 left-0 sm:mb-0 mb-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            </svg>
        </div>
        <script>
            function updateFileName(input) {
                const fileName = input.files[0] ? input.files[0].name : 'No file chosen';
                document.getElementById('file-name').textContent = fileName;
            }
            document.addEventListener('DOMContentLoaded', function() {
                flatpickr("#birthday", {
                    dateFormat: "Y-m-d", // Specify the desired date format
                    maxDate: new Date(), // Prevent future dates
                });
            });
        
                function previewImage(event) {
                const image = document.getElementById('profileImage');
                const file = event.target.files[0];
        
                if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                image.src = e.target.result; // Update the image preview
                image.classList.remove('hidden'); // Show image
            };
                reader.readAsDataURL(file);
            }else{
                    image.src = "";
                    image.classList.add('hidden'); // Hide image if no file
                }
            }
        
        </script>
        </x-app-layout>