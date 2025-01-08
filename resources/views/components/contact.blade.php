<div id="contact" class="flex flex-col sm:flex-row justify-center scroll-mt-10">
    <div class="flex items-center justify-center py-8 px-5">
        <div class="container mx-auto max-w-lg mt-30 mb-30 px-10 py-4 bg-white shadow-md rounded-lg border border-gray-200 lg:h-[624px] md:h-[720px]">
          
            <h2 class="text-2xl font-medium mt-10 mb-16 text-center text-gray-800">For questions, please contact us</h2>
        
            <!-- Form Section -->
            <form id="myForm" action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <!-- Name and Email Inputs -->
                <div class="mb-5 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-2">
                    <div class="flex-1">
                        <input type="text" id="name" name="name" placeholder="name" class="w-full h-10 bg-gray-200 border border-gray-300 rounded-lg shadow-sm p-2 text-sm placeholder-gray-700" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <input type="email" id="email" name="email" placeholder="email address" class="w-full h-10 bg-gray-200 border border-gray-300 rounded-lg shadow-sm p-2 text-sm placeholder-gray-700" required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Subject Dropdown -->
                <div class="mb-5 mt-5">
                    <select id="subject" name="subject" class="w-full h-10 bg-gray-200 border border-gray-300 rounded-lg shadow-sm p-2 text-sm placeholder-gray-700" required>
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

                <!-- Message  -->
                <div class="mb-2 mt-5">
                    <textarea id="message" name="message" rows="4" placeholder="message" class="w-full h-32 bg-gray-200 border border-gray-300 rounded-lg shadow-sm p-2 text-sm placeholder-gray-700" required></textarea>
                    @error('message')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

      <!-- reCAPTCHA Section -->
                  <div class="mb-2 flex flex-col mt-5 sm:flex-row space-y-4 sm:space-y-0 sm:space-x-2">
                       <div class="flex-1">
                       <div class="w-full" style="transform: scale(0.85); transform-origin: left;">
                                       {!! NoCaptcha::display() !!}
                  </div>
                           @error('g-recaptcha-response')
                                 <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                           </div>
                     </div>



                <!-- Submit Button -->
                <div class="mb-5 flex  justify-start">
                    <button id="submitButton" type="submit" class="bg-blue-600 text-white font-semibold text-sm py-2 px-4 rounded-lg border border-transparent hover:bg-blue-700 hover:text-white transition duration-300 inline-flex items-center">
                        <span class="button-text">Submit</span>
                        <svg aria-hidden="true" role="status" class="hidden inline w-4 h-4 ms-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2" />
                        </svg>
                    </button>
                </div>

            </form>
        </div>
    </div>
    <div>
        <x-faq/>
    </div>
</div>
