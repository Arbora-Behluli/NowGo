<div class=" flex flex-col sm:flex-row justify-center">

    <div class="flex items-center justify-center py-8 px-5 ">
        <div class="container mx-auto max-w-lg mt-30 mb-30 px-10 py-8 bg-white shadow-md rounded-lg border border-gray-200 lg:h-[624px] md:h-[720px]">
            <h2 class="text-3xl font-medium mb-4 text-center text-gray-800">For questions, please contact us</h2>
            <p class="text-md mb-6 text-gray-400 text-center">
                By submitting, you give permission to Trip Mate to store and process your personal information so we can provide you with the content you have requested.
                For more information see our <a href="#" class="text-aquamarine underline">Privacy Policy</a>.
            </p>


                <form id="myForm" action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <!-- Name and Email Input -->
                <div class="mb-5 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-2">
                        <div class="flex-1">
                        <input type="text" id="name" name="name" placeholder="name" class="w-full h-10 bg-gray-200 border border-gray-300 rounded-lg shadow-sm p-2 mt-1 text-sm placeholder-gray-700" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <input type="email" id="email" name="email" placeholder="email address" class="w-full h-10 bg-gray-200 border border-gray-300 rounded-lg shadow-sm p-2 mt-1 text-sm placeholder-gray-700" required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Subject Input -->
                <div class="mb-5">
                    <select id="subject" name="subject" class="w-full h-10 bg-gray-200 border border-gray-300 rounded-lg shadow-sm p-2 mt-1 text-sm placeholder-gray-700" required>
                        <option value="" disabled selected>select subject</option>
                        <option value="Info Request">Info Request</option>
                        <option value="Customer Support">Customer Support</option>
                        <option value="Feedback">Feedback</option>
                        <option value="Technical Issue">Technical Issue</option>
                        <option value="Other">Other</option>
                    </select>
                    @error('subject')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message Input -->
                <div class="mb-5">
                    <textarea id="message" name="message" rows="4" placeholder="message" class="w-full h-32 bg-gray-200 border border-gray-300 rounded-lg shadow-sm p-2 mt-1 text-sm placeholder-gray-700" required></textarea>
                    @error('message')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Robot Checkbox -->
                <div class="flex items-center mb-5">
                    <input type="checkbox" id="captcha" name="captcha" class="h-4 w-4 text-aquamarine border-gray-300 rounded accent-aquamarine-500" required>
                    <label for="captcha" class="ml-2 text-sm text-gray-700">I'm not a robot</label>
                </div>

                <!-- Submit Button and Loading Spinner -->
                <form id="myForm" action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <!-- Other form fields -->
                    <div class="flex justify-start mb-5">
                        <button id="submitButton" type="submit" class="bg-black text-white font-semibold text-sm py-2 px-4 rounded-lg border border-transparent hover:bg-white hover:text-black hover:border-black transition duration-300 inline-flex items-center">
                            <span class="button-text">Submit</span>
                            <svg aria-hidden="true" role="status" class="hidden inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                            </svg>
                        </button>
                    </div>
                </form>
                



                <!-- Success Message -->
                @if(session('status'))
                    <p class="mt-4 text-aquamarine text-center">{{ session('status') }}</p>
                @endif
            </form>
        </div>
    </div>
    <div>
        <x-faq/>
    </div>

</div>
