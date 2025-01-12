<x-app-layout>
    <div class="h-full bg-[#85a98f] p-2">
        <div class="bg-white rounded-lg shadow-xl pb-8">
            <div class="w-full h-[250px]">
                <img src="{{ asset('images/profile/pin.png') }}"
                     alt="Profile Background"
                     class="w-full h-full object-cover rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-col items-center -mt-20">
                <div class="w-32 h-32">
                    @if(auth()->user()->image)
                        <img src="{{ asset('storage/' . auth()->user()->image) }}"
                             alt="User Image"
                             class="w-full h-full rounded-full object-cover border-2 border-[#76A8B2]">
                    @else
                        <img
                            src="{{ asset('https://eu.ui-avatars.com/api/?name=' . urlencode(auth()->user()->name . ' ' . auth()->user()->lastname) . '&size=250') }}"
                            alt="Default Image"
                            class="w-full h-full rounded-full object-cover border-2 border-[#76A8B2]">
                    @endif
                </div>
                <div class="flex items-center space-x-2 mt-2">
                    <p class="text-2xl font-semibold">
                    {{ auth()->user()->name }} {{ auth()->user()->lastname }}
                    <div class="relative inline-block group">
                        @if($user->verification_status === 'verified')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="orange"
                                 class="w-6 h-6 mb-2 text-orange inline ml-1" viewBox="0 0 24 24">
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
                    <div class="relative inline-block group">
                        @if($user->background_status === 'verified')
                            <svg class="w-7 h-7 mb-2.5 text-orange inline ml-1"
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
                    </p>

                </div>
                <p class="text-sm text-gray-500">{{ auth()->user()->city }}</p>
                <div class="flex justify-center gap-x-3 py-3 mx-8 text-gray-800 text-sm">
                    <div class="text-center w-20 flex flex-col items-center">
                        <h2 class="text-xl font-bold">{{ $tripCount }}</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 -4.5 32 32"
                             fill="none" class="mt-2">
                            <path
                                d="M27.0766 14.7692H24.615C23.9353 14.7692 23.3843 15.3202 23.3843 15.9999V20.923C23.3843 21.6027 23.9353 22.1538 24.615 22.1538H27.0766C27.7563 22.1538 28.3074 21.6027 28.3074 20.923V15.9999C28.3074 15.3202 27.7563 14.7692 27.0766 14.7692Z"
                                fill="#28666e"/>
                            <path
                                d="M7.38469 14.7693H4.92315C4.24342 14.7693 3.69238 15.3203 3.69238 16.0001V20.9231C3.69238 21.6029 4.24342 22.1539 4.92315 22.1539H7.38469C8.06443 22.1539 8.61546 21.6029 8.61546 20.9231V16.0001C8.61546 15.3203 8.06443 14.7693 7.38469 14.7693Z"
                                fill="#28666e"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M28.3078 9.84615H3.69238L7.16378 1.51479C7.54598 0.597508 8.44225 0 9.43598 0H22.5641C23.5579 0 24.4541 0.597508 24.8364 1.51479L28.3078 9.84615ZM24.6155 7.38462H7.38469L9.43598 2.46154H22.5641L24.6155 7.38462Z"
                                  fill="#28666e"/>
                            <path
                                d="M3.07692 6.15381H1.84615C0.826551 6.15381 0 6.98036 0 7.99996C0 9.01957 0.826551 9.84612 1.84615 9.84612H3.07692C4.09653 9.84612 4.92308 9.01957 4.92308 7.99996C4.92308 6.98036 4.09653 6.15381 3.07692 6.15381Z"
                                fill="#28666e"/>
                            <path
                                d="M30.1536 6.15393H28.9228C27.9032 6.15393 27.0767 6.98048 27.0767 8.00008C27.0767 9.01969 27.9032 9.84624 28.9228 9.84624H30.1536C31.1732 9.84624 31.9997 9.01969 31.9997 8.00008C31.9997 6.98048 31.1732 6.15393 30.1536 6.15393Z"
                                fill="#28666e"/>
                            <path
                                d="M24.6153 7.38464H7.3845C4.66556 7.38464 2.46143 9.58878 2.46143 12.3077V14.7693C2.46143 17.4882 4.66556 19.6923 7.3845 19.6923H24.6153C27.3342 19.6923 29.5383 17.4882 29.5383 14.7693V12.3077C29.5383 9.58878 27.3342 7.38464 24.6153 7.38464Z"
                                fill="#2d7c3e"/>
                            <path
                                d="M7.38488 16C8.74435 16 9.84642 14.8979 9.84642 13.5384C9.84642 12.179 8.74435 11.0769 7.38488 11.0769C6.02541 11.0769 4.92334 12.179 4.92334 13.5384C4.92334 14.8979 6.02541 16 7.38488 16Z"
                                fill="white"/>
                            <path
                                d="M24.6153 16C25.9748 16 27.0769 14.8979 27.0769 13.5384C27.0769 12.179 25.9748 11.0769 24.6153 11.0769C23.2559 11.0769 22.1538 12.179 22.1538 13.5384C22.1538 14.8979 23.2559 16 24.6153 16Z"
                                fill="white"/>
                            <path
                                d="M14.7692 12.3077C14.7692 11.6279 14.2181 11.0769 13.5384 11.0769C12.8587 11.0769 12.3076 11.6279 12.3076 12.3077V14.7692C12.3076 15.4489 12.8587 16 13.5384 16C14.2181 16 14.7692 15.4489 14.7692 14.7692V12.3077Z"
                                fill="#a0dcae" fill-opacity="0.4"/>
                            <path
                                d="M19.692 12.3077C19.692 11.6279 19.141 11.0769 18.4612 11.0769C17.7815 11.0769 17.2305 11.6279 17.2305 12.3077V14.7692C17.2305 15.4489 17.7815 16 18.4612 16C19.141 16 19.692 15.4489 19.692 14.7692V12.3077Z"
                                fill="#a0dcae" fill-opacity="0.4"/>
                            <defs>
                                <linearGradient id="paint0_linear_103_1486" x1="25.8458" y1="14.7692" x2="25.8458"
                                                y2="22.1538" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#3873E5"/>
                                    <stop offset="1" stop-color="#2A5CDD"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_103_1486" x1="6.15392" y1="14.7693" x2="6.15392"
                                                y2="22.1539" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#3873E5"/>
                                    <stop offset="1" stop-color="#2A5CDD"/>
                                </linearGradient>
                                <linearGradient id="paint2_linear_103_1486" x1="16.0001" y1="0" x2="16.0001"
                                                y2="9.84615" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#57A6F5"/>
                                    <stop offset="1" stop-color="#3C79E7"/>
                                </linearGradient>
                                <linearGradient id="paint3_linear_103_1486" x1="2.46154" y1="6.15381" x2="2.46154"
                                                y2="9.84612" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#58A8F6"/>
                                    <stop offset="1" stop-color="#3B78E7"/>
                                </linearGradient>
                                <linearGradient id="paint4_linear_103_1486" x1="29.5382" y1="6.15393" x2="29.5382"
                                                y2="9.84624" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#58A8F6"/>
                                    <stop offset="1" stop-color="#3B78E7"/>
                                </linearGradient>
                                <linearGradient id="paint5_linear_103_1486" x1="15.9999" y1="7.38464" x2="15.9999"
                                                y2="19.6923" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#58A8F6"/>
                                    <stop offset="1" stop-color="#3B78E7"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
        
                    <div class="text-center w-20 flex flex-col items-center">
                        <h2 class="text-xl font-bold">{{$feedback}}</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="30px"
                             width="30px" version="1.1" id="Layer_1" viewBox="0 0 511.999 511.999" xml:space="preserve"
                             class="mt-2">
                            <g>
                                <path style="fill:#a0dcae;"
                                      d="M65.656,171.198c0,0,48.611-21.542,111.193-28.371c10.021-1.094,51.499-30.663,51.763-30.857   c27.24-19.995,48.404,59.228,48.404,59.228c0.244-1.399,0.485-2.837,0.72-4.309c0.105-0.656,0.209-1.319,0.311-1.987   c2.367-15.383,11.792-34.016,11.725-49.606c-0.044-10.168-0.88-19.042-2.868-24.876c-18.093-53.145-61.589-35.634-61.589-35.634   s-30.338-40.747-53.387-39.498c-0.256-0.008-0.516-0.035-0.769-0.034v0.093c-2.219,0.214-4.368,0.821-6.409,1.919   C105.192,49.282,97.3,45.276,83.938,49.918C51.539,61.171,50.69,58.162,54.771,83.133   C61.593,124.859,64.381,155.241,65.656,171.198z"/>
                                <path style="fill:#a0dcae;"
                                      d="M297.221,228.58c0,0,40.042-17.745,91.593-23.371c8.255-0.901,42.422-25.259,42.638-25.418   c22.44-16.472,39.871,48.788,39.871,48.788c0.201-1.153,0.4-2.337,0.593-3.549c0.087-0.54,0.172-1.086,0.256-1.637   c1.949-12.672,9.715-28.02,9.658-40.863c-0.037-8.375-0.726-15.685-2.363-20.491c-14.904-43.776-50.733-29.353-50.733-29.353   s-24.989-33.566-43.974-32.536c-0.211-0.006-0.426-0.029-0.633-0.027v0.076c-1.829,0.175-3.598,0.676-5.279,1.58   c-49.058,26.374-55.559,23.075-66.566,26.897c-26.688,9.269-27.388,6.791-24.027,27.361   C293.875,190.409,296.172,215.436,297.221,228.58z"/>
                            </g>
                            <path style="fill:#2b6551;"
                                  d="M493.911,157.124c-12.896-37.878-40.501-41.966-51.77-41.966c-2.71,0-5.233,0.198-7.501,0.503  c-10.462-12.241-29.534-30.787-49.013-30.787c-0.262,0-0.523,0.003-0.782,0.009c-0.252-0.009-0.529,0.003-0.824-0.014  c-1.196,0.008-2.358,0.156-3.473,0.426c-3.144,0.529-6.135,1.551-8.922,3.049c-35.822,19.258-47.42,21.79-55.094,23.464  c-2.874,0.627-5.845,1.275-9.254,2.46c-0.776,0.27-1.525,0.528-2.256,0.778c-0.067-12.802-1.271-22.471-3.678-29.544  c-14.437-42.402-43.637-48.733-59.76-48.733c-3.851,0-7.39,0.357-10.454,0.854c-11.582-13.709-35.09-37.619-58.154-37.619  c-0.32,0-0.639,0.005-0.958,0.014c-0.323-0.014-0.668-0.021-0.993-0.018c-1.22,0.011-2.404,0.166-3.539,0.45  c-3.513,0.577-6.855,1.71-9.959,3.379c-43.891,23.595-58.239,26.726-67.734,28.799c-3.395,0.741-6.907,1.507-10.86,2.881  c-3.54,1.229-6.698,2.286-9.507,3.226c-13.85,4.634-22.21,7.431-27.579,15.589c-5.799,8.812-4.26,18.232-2.129,31.269  c4.91,30.032,8.511,59.139,10.708,86.523v18.9c0,31.09,11.797,59.472,31.138,80.925c-40.285,19.684-66.651,62.71-66.651,112.866  v111.939c0,8.424,6.829,15.253,15.253,15.253h362.238c8.423,0,15.253-6.829,15.253-15.253s-6.83-15.253-15.253-15.253H283.241  v-76.955c0-34.814,19.353-62.882,48.75-71.729c15.328,9.161,33.229,14.443,52.347,14.443c56.435,0,102.349-45.915,102.349-102.349  v-15.706c0.098-0.587,0.197-1.155,0.293-1.76l0.272-1.727c0.628-4.088,2.224-9.132,3.912-14.474  c2.796-8.842,5.965-18.863,5.923-28.776C497.038,171.544,495.999,163.255,493.911,157.124z M309.155,145.846  c2.402-0.804,5.104-1.708,8.13-2.759c1.687-0.586,3.392-0.958,5.752-1.473c9.869-2.154,23.374-5.101,62.722-26.231  c5.811,0.194,20.671,12.945,30.746,26.414c4.21,5.656,11.364,7.846,17.832,5.082c0.572-0.195,3.739-1.213,7.802-1.213  c3.868,0,15.644,0,22.893,21.293c0.311,0.915,1.251,4.304,1.493,12.335c-6.277-8.906-15.401-17.419-27.735-17.419  c-5.645,0-11.257,1.911-16.267,5.554c-11.524,8.263-30.5,20.64-36.195,22.712c-31.447,3.514-58.578,11.241-75.769,17.088  c-1.821-17.324-4.249-35.294-7.25-53.649c-0.276-1.689-0.604-3.694-0.851-5.436C304.419,147.429,306.871,146.61,309.155,145.846z   M78.803,147.694c-2.228-21.617-5.224-44.061-8.976-67.022c-0.484-2.962-1.091-6.672-1.371-9.269  c2.613-1.049,6.681-2.41,10.654-3.74c2.907-0.973,6.173-2.067,9.837-3.339c2.232-0.775,4.381-1.243,7.355-1.893  c11.824-2.581,28.018-6.115,75.673-31.735c0.079-0.043,0.243-0.13,0.647-0.169c0.034-0.003,0.067-0.006,0.101-0.011  c0.011,0,0.021,0,0.032-0.002l0.223-0.006c8.929,0,28.307,17.599,40.103,33.383c4.195,5.634,11.386,7.8,17.852,5.073  c0.612-0.217,4.98-1.692,10.651-1.692c14.352,0,24.452,9.179,30.881,28.061c0.598,1.757,1.997,7.228,2.053,20.026  c0.009,2.01-0.239,4.227-0.668,6.582c-10.705-19.123-22.658-28.462-36.331-28.462c-6.264,0-12.266,2.059-17.855,6.135  c-14.582,10.459-38.479,25.997-45.083,28.114c-40.112,4.44-74.378,14.573-94.866,21.731  C79.452,148.849,79.138,148.265,78.803,147.694z M80.932,191.016v-9.518c16.418-6.223,53.451-18.694,97.572-23.509  c15.349-1.676,56.618-31.874,59.073-33.682c1.917,1.318,7.753,6.524,15.454,24.47c4.643,10.819,7.805,21.312,8.859,24.983v17.254  c0,49.891-40.59,90.479-90.481,90.479C121.52,281.495,80.932,240.907,80.932,191.016z M252.734,404.538v76.955H45.418v-96.686  c0-44.304,25.041-79.923,62.916-90.597c18.38,11.277,39.98,17.791,63.077,17.791c49.27,0,91.729-29.621,110.575-71.978v4.881  c0,25.05,9.06,48.015,24.057,65.823C273.701,328.032,252.734,363.461,252.734,404.538z M384.338,316.748  c-39.615,0-71.845-32.228-71.845-71.843v-5.979c14.129-5.246,43.367-14.777,77.977-18.554c12.033-1.313,40.948-21.726,48.322-27.054  c5.133,5.07,12.913,21.804,17.388,37.742v13.845C456.181,284.52,423.953,316.748,384.338,316.748z"/>
                        </svg>
                    </div>
                </div>
                <div class="w-4/5 flex flex-col sm:flex-row sm:justify-center md:w-full gap-x-4">
                   
                    @if(auth()->user()->background_status==='none')
                        <a href="{{ route('profile.upload-file') }}"
                           class="w-full sm:w-1/3 bg-gray/20 backdrop-blur-md border border-[#3da688] rounded-md p-2 my-1 mx-1 flex items-center justify-between shadow-sm hover:shadow-lg cursor-pointer hover:scale-105 transition duration-300 hover:border-orange-300">
                            <div>
                                <h4 class="font-medium text-sm">{{__('messages.Verify Background Check')}}</h4>
                                <p class="text-xs text-gray-500">{{__('messages.Upload your certificate on criminal convictions.')}}</p>
                            </div>
                            <span class="text-gray-500 text-base">&#8594;</span>
                        </a>
                    @endif
                    @if(auth()->user()->background_status==='pending')
                        <div
                            class="w-full sm:w-1/3 bg-gray/20 backdrop-blur-md border border-[#ffbf00] rounded-md p-2 my-1 mx-1 flex items-center justify-between shadow-sm ">
                            <div>
                                <h4 class="font-medium text-sm">{{__('messages.Your file is being processed')}}</h4>
                                <p class="text-xs text-gray-500">{{__('messages.You will be notified when it the processing is done.')}}</p>
                            </div>
                            <span class="text-gray-500 text-base"><svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0303 10.0303C16.3232 9.73744 16.3232 9.26256 16.0303 8.96967C15.7374 8.67678 15.2626 8.67678 14.9697 8.96967L10.5 13.4393L9.03033 11.9697C8.73744 11.6768 8.26256 11.6768 7.96967 11.9697C7.67678 12.2626 7.67678 12.7374 7.96967 13.0303L9.96967 15.0303C10.2626 15.3232 10.7374 15.3232 11.0303 15.0303L16.0303 10.0303Z" fill="#ecbc36"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0574 1.25H11.9426C9.63424 1.24999 7.82519 1.24998 6.41371 1.43975C4.96897 1.63399 3.82895 2.03933 2.93414 2.93414C2.03933 3.82895 1.63399 4.96897 1.43975 6.41371C1.24998 7.82519 1.24999 9.63422 1.25 11.9426V12.0574C1.24999 14.3658 1.24998 16.1748 1.43975 17.5863C1.63399 19.031 2.03933 20.1711 2.93414 21.0659C3.82895 21.9607 4.96897 22.366 6.41371 22.5603C7.82519 22.75 9.63423 22.75 11.9426 22.75H12.0574C14.3658 22.75 16.1748 22.75 17.5863 22.5603C19.031 22.366 20.1711 21.9607 21.0659 21.0659C21.9607 20.1711 22.366 19.031 22.5603 17.5863C22.75 16.1748 22.75 14.3658 22.75 12.0574V11.9426C22.75 9.63423 22.75 7.82519 22.5603 6.41371C22.366 4.96897 21.9607 3.82895 21.0659 2.93414C20.1711 2.03933 19.031 1.63399 17.5863 1.43975C16.1748 1.24998 14.3658 1.24999 12.0574 1.25ZM3.9948 3.9948C4.56445 3.42514 5.33517 3.09825 6.61358 2.92637C7.91356 2.75159 9.62177 2.75 12 2.75C14.3782 2.75 16.0864 2.75159 17.3864 2.92637C18.6648 3.09825 19.4355 3.42514 20.0052 3.9948C20.5749 4.56445 20.9018 5.33517 21.0736 6.61358C21.2484 7.91356 21.25 9.62177 21.25 12C21.25 14.3782 21.2484 16.0864 21.0736 17.3864C20.9018 18.6648 20.5749 19.4355 20.0052 20.0052C19.4355 20.5749 18.6648 20.9018 17.3864 21.0736C16.0864 21.2484 14.3782 21.25 12 21.25C9.62177 21.25 7.91356 21.2484 6.61358 21.0736C5.33517 20.9018 4.56445 20.5749 3.9948 20.0052C3.42514 19.4355 3.09825 18.6648 2.92637 17.3864C2.75159 16.0864 2.75 14.3782 2.75 12C2.75 9.62177 2.75159 7.91356 2.92637 6.61358C3.09825 5.33517 3.42514 4.56445 3.9948 3.9948Z" fill="#ecbc36"></path> </g></svg></span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
            <!-- Personal Info Section -->
            <div class="mb-4 w-full flex flex-col 2xl:w-1/3">
                <div class="bg-white rounded-lg shadow-xl p-8 flex-1">
                    <h4 class="text-xl text-gray-900 font-bold">{{ __('messages.Personal Info') }}</h4>
                    <ul class="mt-2 text-gray-700">
                        <li class="flex flex-wrap sm:flex-nowrap border-b py-2">
                            <span class="font-bold w-24">{{ __('messages.Full Name:') }}</span>
                            <span>{{ auth()->user()->name }} {{ auth()->user()->lastname }}</span>
                        </li>
                        <li class="flex flex-wrap sm:flex-nowrap border-b py-2">
                            <span class="font-bold w-24">{{ __('messages.Birthday:') }}</span>
                            <span>{{ \Carbon\Carbon::parse(auth()->user()->birthday)->format('Y-m-d') }}</span>
                        </li>
                        <li class="flex flex-wrap sm:flex-nowrap border-b py-2">
                            <span class="font-bold w-24">{{ __('messages.Email:') }}</span>
                            <span>{{ auth()->user()->email }}</span>
                        </li>
                        <li class="flex flex-wrap sm:flex-nowrap border-b py-2">
                            <span class="font-bold w-24">{{ __('messages.Joined:') }}</span>
                            <span>{{ auth()->user()->created_at}}</span>
                        </li>
                        <li class="flex flex-wrap sm:flex-nowrap border-b py-2">
                            <span class="font-bold w-24">{{ __('messages.Phone Number:') }}</span>

                            <span>{{ auth()->user()->phone }}</span>
                        </li>
                        <li class="flex flex-wrap sm:flex-nowrap border-b py-2">
                            <span class="font-bold w-24">{{ __('messages.City:') }}</span>
                            <span>{{ auth()->user()->city }}</span>
                        </li>
                        <li class="flex flex-wrap sm:flex-nowrap border-b py-2">
                            <span class="font-bold w-24">{{ __('messages.Address:') }}</span>
                            <span>{{ auth()->user()->address }}</span>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- Ride History Section -->
            <div x-data="tabs()" class="flex flex-col w-full xl:w-2/3 max-h-[412px] overflow-y-auto">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4 bg-white rounded-lg shadow-xl flex-1 overflow-y-auto">
        <!-- Titulli -->
        <h2 class="text-lg sm:text-xl lg:text-xl font-bold mt-4 mb-4 text-gray-800">
            {{ __('messages.Completed Rides Of') . ' ' . auth()->user()->name }}
        </h2>

        <div class="flex flex-wrap justify-start lg:justify-start gap-4 mb-6 mt-6">
            <button @click="currentTab = 'driver'" 
                class="px-5 py-1.5 rounded-lg bg-customgreen-400 hover:bg-customgreen-500 text-white font-medium text-sm sm:text-base">
                {{ __('messages.Driver') }}
            </button>
            <button @click="currentTab = 'passenger'" 
                class="px-5 py-1.5 rounded-lg bg-customgreen-400 hover:bg-customgreen-500 text-white font-medium text-sm sm:text-base">
                {{ __('messages.Passenger') }}
            </button>
        </div>
        <div id="bookings" class="space-y-4">


@foreach ($bookings as $ride)
    @if($ride->trip && $ride->trip->status === 'Completed')
        <div
            id="passenger"
            x-show="currentTab === 'passenger'"
            class="bg-white shadow-md rounded-lg border border-customgreen-400 shadow-neon overflow-hidden max-w-4xl mx-auto">
            <div class="flex justify-between items-center p-4 cursor-pointer bg-white" onclick="toggleDetails(this)">
                <div>

                    <div class="flex items-center gap-5">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M17.197 5.46A.824.824 0 0 0 16.5 5h-9a.824.824 0 0 0-.697.46l-1.988 4.638L5.285 9H3v1.5a.501.501 0 0 0 .5.5 2.572 2.572 0 0 1 .367-.388A2.532 2.532 0 0 0 3 12.522V19.5a.501.501 0 0 0 .5.5h2a.501.501 0 0 0 .5-.5v-1.831A46.229 46.229 0 0 0 12 18a46.244 46.244 0 0 0 6.001-.331L18 19.5a.501.501 0 0 0 .5.5h2a.501.501 0 0 0 .5-.5v-6.978a2.534 2.534 0 0 0-.87-1.909 2.523 2.523 0 0 1 .359.387h.011a.501.501 0 0 0 .5-.5V9h-2.286zM7.66 6h8.68l1.715 4H5.945zM5 19H4v-1.79a1.983 1.983 0 0 0 .613.235c.118.024.254.048.387.071zm15 0h-1v-1.484c.133-.023.269-.047.387-.07A1.989 1.989 0 0 0 20 17.21zm-.525-7.632A1.53 1.53 0 0 1 20 12.522v2.946a1.015 1.015 0 0 1-.808.997A43.178 43.178 0 0 1 12 17a43.255 43.255 0 0 1-7.192-.535A1.015 1.015 0 0 1 4 15.468v-2.946a1.532 1.532 0 0 1 .524-1.156 1.49 1.49 0 0 1 .568-.307L5.296 11h13.406l.205.06a1.493 1.493 0 0 1 .568.308zM17 13h2v1a1 1 0 0 1-1 1h-2zM7 13l1 2H6a1 1 0 0 1-1-1v-1zm2 1h6v1H9z"></path><path fill="none" d="M0 0h24v24H0z"></path></g></svg>
                        <h3 class="text-sm md:text-lg font-medium text-gray-900 flex items-center gap-2">
                            {{ $ride->trip->origincity->name }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                            {{ $ride->trip->destinationcity->name }}
                        </h3>
                    </div>
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ml-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                        &nbsp;&nbsp;&nbsp;&nbsp;{{ $ride->trip->departure_time->format('d/m') }}
                    </p>
                </div>
                <svg class="w-5 h-5 text-gray-500 transform transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 15l-6-6h12l-6 6z"/>
                </svg>
            </div>
            <div class="details hidden px-4 py-2 bg-[#c9dde2]">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:p-6">

                    <!-- Driver Card  -->
                    <div class="flex items-center space-x-4 bg-white shadow-md rounded-xl p-4  border border-customgreen-400">
                        <div class="text-center">
                            <p class="text-sm md:text-lg font-bold text-gray-600"></p>
                            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" width="35" height="35"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M27 40C27 41.6569 25.6569 43 24 43C22.3431 43 21 41.6569 21 40C21 38.3431 22.3431 37 24 37C25.6569 37 27 38.3431 27 40Z" fill="#333333"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M30.6187 37.1037C30.1899 35.5033 31.1396 33.8583 32.74 33.4295L34.6719 32.9118C36.2723 32.483 37.9173 33.4328 38.3461 35.0332L39.3814 38.8969C39.8102 40.4973 38.8604 42.1423 37.26 42.5711L35.3282 43.0887C33.7278 43.5176 32.0828 42.5678 31.654 40.9674L30.6187 37.1037ZM33.2576 35.3613C32.7242 35.5043 32.4076 36.0526 32.5505 36.5861L33.5858 40.4498C33.7288 40.9832 34.2771 41.2998 34.8106 41.1569L36.7424 40.6392C37.2759 40.4963 37.5925 39.948 37.4495 39.4145L36.4142 35.5508C36.2713 35.0173 35.723 34.7007 35.1895 34.8437L33.2576 35.3613Z" fill="#333333"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.65396 35.0324C10.0828 33.432 11.7278 32.4823 13.3282 32.9111L15.26 33.4287C16.8604 33.8576 17.8102 35.5026 17.3814 37.103L16.3461 40.9667C15.9173 42.5671 14.2723 43.5168 12.6719 43.088L10.74 42.5704C9.13961 42.1415 8.18986 40.4965 8.61869 38.8961L9.65396 35.0324ZM12.8106 34.843C12.2771 34.7 11.7288 35.0166 11.5858 35.5501L10.5505 39.4138C10.4076 39.9472 10.7242 40.4956 11.2576 40.6385L13.1895 41.1561C13.723 41.2991 14.2713 40.9825 14.4142 40.449L15.4495 36.5853C15.5925 36.0519 15.2759 35.5035 14.7424 35.3606L12.8106 34.843Z" fill="#333333"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M15.8378 39H23V31.0549C20.1303 31.3722 17.6672 33.0387 16.2592 35.406C16.0095 34.9247 15.5662 34.546 15.0012 34.3947L14.5983 34.2867C16.5287 31.1168 20.0172 29 24 29C27.9832 29 31.4718 31.1171 33.4022 34.2874L32.9988 34.3954C32.434 34.5468 31.9908 34.9253 31.7411 35.4064C30.3331 33.0389 27.8699 31.3722 25 31.0549V39H32.1621L32.6199 40.7086C32.647 40.8098 32.6814 40.9071 32.7223 41H24H15.2773C15.3185 40.9068 15.353 40.8093 15.3802 40.7078L15.8378 39ZM15.0966 41.324C14.6828 41.9256 13.9602 42.2651 13.2156 42.1769C13.4542 43.3648 13.8842 44.4842 14.4722 45.5007L16.2034 44.4993C15.6481 43.5392 15.2649 42.4671 15.0966 41.324ZM31.7966 44.4993C32.3518 43.5394 32.7349 42.4675 32.9033 41.3246C33.3171 41.9262 34.0397 42.2658 34.7843 42.1777C34.5457 43.3653 34.1157 44.4844 33.5278 45.5007L31.7966 44.4993Z" fill="#333333"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M15 17V14H17V17C17 20.866 20.134 24 24 24C27.866 24 31 20.866 31 17V14H33V17C33 21.9706 28.9706 26 24 26C19.0294 26 15 21.9706 15 17Z" fill="#333333"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5989 6.25348C15.0904 6.66596 15 6.95645 15 7.09677C15 8.53676 15.2324 9.66613 15.4583 10.424C15.5256 10.6495 15.5922 10.8421 15.6519 11H32.3481C32.4078 10.8421 32.4745 10.6496 32.5417 10.4241C32.7676 9.66629 33 8.53693 33 7.09678C33 6.95645 32.9096 6.66596 32.4011 6.25348C31.9098 5.85504 31.1661 5.46148 30.2339 5.11465C28.3749 4.42299 25.9931 4 24 4C22.0069 4 19.6251 4.42299 17.7661 5.11465C16.8339 5.46148 16.0902 5.85504 15.5989 6.25348ZM31.7015 13H16.2985C16.3655 13.09 16.4474 13.1843 16.5475 13.2811C17.3021 14.0108 19.2284 15 24 15C28.7716 15 30.6979 14.0108 31.4525 13.2811C31.5526 13.1843 31.6345 13.09 31.7015 13ZM13.9878 12.2059C13.9684 12.1635 13.9475 12.1164 13.9253 12.0648C13.8174 11.8142 13.6787 11.455 13.5417 10.9953C13.2676 10.0758 13 8.75356 13 7.09678C13 6.07581 13.6321 5.27356 14.3391 4.70015C15.0634 4.1127 16.0284 3.62723 17.0687 3.24019C19.1546 2.46411 21.7728 2 24 2C26.2272 2 28.8454 2.46411 30.9313 3.24019C31.9716 3.62723 32.9366 4.1127 33.6609 4.70015C34.3679 5.27356 35 6.07581 35 7.09677C35 8.75371 34.7324 10.076 34.4583 10.9955C34.3213 11.4551 34.1826 11.8143 34.0747 12.0649C34.0525 12.1165 34.0316 12.1635 34.0122 12.2059C34.0109 12.3756 33.9934 12.5932 33.9375 12.8431C33.8141 13.3952 33.5101 14.0736 32.8428 14.7189C31.5291 15.9892 28.9555 17 24 17C19.0445 17 16.4709 15.9892 15.1572 14.7189C14.4899 14.0736 14.1859 13.3952 14.0625 12.8431C14.0066 12.5932 13.9891 12.3756 13.9878 12.2059Z" fill="#333333"></path> <path d="M20 8C20 7.44772 20.4477 7 21 7H27C27.5523 7 28 7.44772 28 8C28 8.55228 27.5523 9 27 9H21C20.4477 9 20 8.55228 20 8Z" fill="#333333"></path> </g></svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-gray-500"></div>
                            <div>
                                <h3 class="text-sm md:text-base font-semibold text-customgreen-400 flex items-center gap-2">
                                    {{ __('messages.Driver') }} @if ($ride->trip->users->verification_status === 'verified')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="orange"
                                             class="w-4 h-4 text-orange inline ml-2" viewBox="0 0 24 24">
                                            <path
                                                d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0zm-1.7 18.3l-4.6-4.6 1.4-1.4 3.2 3.2 7.2-7.2 1.4 1.4z"/>
                                        </svg>
                                    @endif

                                    @if ($ride->trip->start_time && $ride->trip->start_time->diffInMinutes($ride->trip->departure_time) <= 10)
                                        <span class="text-sm font-bold text-green-600 flex items-center gap-1">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                          </svg>
                                          {{ __('messages.On Time') }}
                                      </span>
                                    @endif
                                </h3>
                                <p class="text-sm md:text-base text-black">{{ $ride->trip->users->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Passengers Card  -->
                    <div class="flex items-center space-x-4 bg-white border shadow-md border-customgreen-400 rounded-xl p-4 ">
                        <div class="text-center">
                            <p class="text-3xl font-bold text-gray-600"></p>
                            <svg fill="#000000" height="35" width="35" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M270.948,302.936c-10.562-14.943-27.525-24.074-45.713-24.765c-0.385-0.043-0.775-0.067-1.171-0.067 c-23.135,0-42.252-17.484-44.859-39.93c6.661-4.851,12.807-11.007,18.254-18.381c11.015-14.913,18.165-33.547,20.816-53.698 c0.812-0.883,1.496-1.911,1.987-3.081c4.664-11.106,7.029-22.963,7.029-35.242c0-47.221-35.702-85.637-79.584-85.637 c-11.349,0-22.36,2.578-32.768,7.665c-3.891,0.328-7.704,1.028-11.365,2.088c-36.686,10.599-57.421,54.957-46.22,98.88 c1.127,4.419,2.56,8.765,4.262,12.916c0.464,1.134,1.114,2.13,1.88,3c4.225,31.022,18.908,56.833,38.989,71.434 c-2.581,22.474-21.712,39.988-44.867,39.988c-0.356,0-0.708,0.019-1.056,0.053C25.185,279.268,0,305.121,0,336.763v63.14 c0,5.891,4.775,10.666,10.666,10.666h188.451c5.89,0,10.666-4.775,10.666-10.666s-4.776-10.666-10.666-10.666H21.331v-52.475 c0-20.585,16.746-37.33,37.33-37.33c0.356,0,0.708-0.019,1.056-0.053c7.683-0.24,15.04-1.786,21.858-4.429l50.497,72.883 c1.992,2.875,5.268,4.592,8.767,4.592c3.499,0,6.775-1.716,8.767-4.592l50.498-72.883c6.819,2.643,14.175,4.189,21.858,4.429 c0.348,0.034,0.7,0.053,1.056,0.053c12.105,0,23.511,5.912,30.51,15.815c2.078,2.94,5.372,4.51,8.719,4.51 c2.128,0,4.277-0.636,6.147-1.957C273.205,314.402,274.347,307.746,270.948,302.936z M109.492,72.377 c2.798-0.808,5.757-1.288,8.796-1.425c1.566-0.07,3.094-0.484,4.482-1.213c7.926-4.164,16.314-6.276,24.933-6.276 c31.47,0,57.174,27.694,58.204,62.162c-6.414-4.85-14.393-7.733-23.035-7.733h-55.779c-2.778,0-5.416-0.872-7.625-2.521 c-1.891-1.411-3.351-3.305-4.224-5.482c-2.015-5.014-7-8.146-12.383-7.806c-5.416,0.347-9.973,4.111-11.338,9.361 c-2.721,10.453-7.801,20.188-14.708,28.455C71.283,108.973,85.213,79.392,109.492,72.377z M84.479,162.705 c9.316-8.54,16.855-18.89,22.119-30.32c0.036,0.027,0.073,0.054,0.11,0.081c5.925,4.422,12.973,6.758,20.384,6.758h55.779 c6.7,0,12.487,3.92,15.234,9.577c-0.071,22.157-6.384,42.854-17.806,58.315c-10.771,14.58-24.785,22.61-39.462,22.61 c-13.583,0-26.807-7.017-37.236-19.757C93.483,197.61,86.788,180.974,84.479,162.705z M140.838,343.031l-40.817-58.912 c10.95-9.086,18.932-21.616,22.307-35.908c5.943,1.86,12.141,2.848,18.509,2.848c6.334,0,12.537-0.961,18.52-2.817 c3.379,14.278,11.358,26.796,22.3,35.876L140.838,343.031z"></path> </g> </g> <g> <g> <path d="M455.441,337.455c-0.348-0.034-0.7-0.053-1.056-0.053c-23.167,0-42.305-17.531-44.871-40.023 c13.062-9.512,23.832-23.774,30.931-41.119c1.016,3.324,3.617,6.008,7.039,7.069c1.04,0.322,2.104,0.479,3.157,0.479 c3.232,0,6.36-1.473,8.417-4.114c14.881-19.112,22.616-43.986,21.784-70.041c-0.818-25.56-9.803-49.555-25.303-67.563 c-15.869-18.438-36.819-28.699-59.012-28.911c-1.177-0.048-4.104,0.053-4.577,0.082c-11.402-5.172-23.45-7.588-35.858-7.194 c-25.625,0.819-49.196,13.591-66.369,35.963c-16.688,21.741-25.355,50.098-24.404,79.85c0.161,5.041,0.559,9.683,1.203,14.103 c1.737,12.679,5.23,24.822,10.381,36.091c1.639,3.587,5.124,5.977,9.06,6.213c3.923,0.237,7.681-1.718,9.739-5.083 c0.858-1.403,1.961-3.152,3.178-4.866c4.755,14.445,12.024,27.423,21.253,37.669c3.937,4.371,8.189,8.173,12.667,11.416 c-2.586,22.469-21.715,39.977-44.866,39.977c-0.356,0-0.708,0.019-1.056,0.053c-31.374,1.112-56.558,26.967-56.558,58.607v63.14 c0,5.891,4.776,10.666,10.666,10.666h260.346c5.89,0,10.666-4.775,10.666-10.666v-63.14 C512,364.422,486.815,338.568,455.441,337.455z M290.112,225.625c-1.052-4.108-1.876-8.321-2.467-12.626 c-0.54-3.708-0.868-7.568-1.003-11.799c-0.794-24.837,6.31-48.341,20.004-66.18c13.208-17.208,31.01-27.02,50.128-27.631 c0.639-0.021,14.387-0.795,28.421,6.277c1.569,0.79,3.377,1.157,5.138,1.107c0.202-0.006,5.677-0.265,5.836-0.263 c16.02,0.106,31.362,7.741,43.203,21.497c12.331,14.328,19.487,33.622,20.149,54.329c0.359,11.247-1.221,22.18-4.567,32.239 c-1.008-2.686-2.132-5.331-3.369-7.932c-10.298-21.91-27.633-38.881-48.812-47.788c-2.683-1.128-5.709-1.111-8.378,0.047 c-2.67,1.157-4.75,3.355-5.759,6.085c-1.42,3.836-3.14,7.573-5.116,11.106c-5.584,9.986-16.842,15.927-29.361,15.489 c-1.879-0.064-3.786-0.067-5.666-0.007c-9.223,0.295-18.217,2.053-26.78,5.242C313.255,208.009,299.041,216.018,290.112,225.625z M316.351,231.43c4.044-2.709,8.347-4.94,12.853-6.643c6.344-2.362,13.063-3.672,19.97-3.893c1.41-0.046,2.838-0.044,4.246,0.005 c20.594,0.705,39.217-9.405,48.718-26.396c0.584-1.045,1.152-2.106,1.701-3.177c9.728,5.993,18.043,14.44,24.295,24.692 c-0.054,0.316-0.1,0.633-0.126,0.959c-1.636,20.237-8.617,38.809-19.658,52.295c-10.429,12.741-23.653,19.757-37.236,19.757 C346.004,289.027,323.666,265.158,316.351,231.43z M352.654,307.492c6.003,1.876,12.194,2.866,18.46,2.866 c6.384,0,12.597-0.994,18.555-2.864c4.284,18.163,16.029,33.466,31.818,42.495c-6.159,22.255-26.627,38.258-50.324,38.258 c-23.699,0-44.166-16.004-50.324-38.26C336.626,340.96,348.371,325.656,352.654,307.492z M490.669,448.537H251.654v-52.475 c0-20.583,16.746-37.33,37.33-37.33c0.356,0,0.708-0.019,1.056-0.053c3.673-0.115,7.274-0.519,10.775-1.209 c9.265,30.416,37.613,52.11,70.347,52.11c32.734,0,61.081-21.694,70.348-52.109c3.5,0.69,7.101,1.094,10.773,1.208 c0.348,0.034,0.7,0.053,1.056,0.053c20.584,0,37.33,16.746,37.33,37.33V448.537z"></path> </g> </g> </g></svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-sm md:text-lg text-gray-500"></div>
                            <div>
                                <h3 class="text-base font-semibold text-customgreen-400">{{ __('messages.Passengers') }}</h3>

                                <p class="text-sm md:text-base  text-black"> @if ($ride->trip->passengers->isNotEmpty())

                                        @foreach ($ride->trip->passengers as $passenger)
                                            {{ $passenger->name }}
                                        @endforeach

                                    @else
                                        <span>{{ __('messages.No passengers available.') }}</span>
                                    @endif</p>
                            </div>
                        </div>
                    </div>

                    <!-- Planned Time Card -->
                    <div class="flex items-center space-x-4 bg-white shadow-md border rounded-xl border-customgreen-400 p-4">
                        <div class="text-center">
                            <p class="text-sm md:text-lg font-bold text-gray-600"></p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256" fill="#000000">
                                <circle cx="128" cy="128" r="95.9" fill="none" stroke="#000" stroke-width="16" />
                                <path d="M80 211L64 240M176 211l16 29" fill="none" stroke="#000" stroke-width="16" stroke-linecap="round" />
                                <path d="M35.3 102.4A48 48 0 0 1 17.2 53.8 48 48 0 0 1 54 17.2 48 48 0 0 1 102.6 35.5" fill="none" stroke="#000" stroke-width="16" />
                                <path d="M128 32V16M128 80v48M128 128l34 34" fill="none" stroke="#000" stroke-width="16" stroke-linecap="round" />
                                <path d="M220.7 102.4A48 48 0 0 0 238.8 53.8 48 48 0 0 0 202 17.2 48 48 0 0 0 153.4 35.5" fill="none" stroke="#000" stroke-width="16" />
                            </svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-sm md:text-lg text-gray-500"></div>
                            <div>
                                <h3 class="text-base font-semibold text-customgreen-400">{{ __('messages.Planned Time') }}</h3>

                                <p class="text-sm md:text-base text-black">
                                    {{ $ride->trip->departure_time->format('H:i') }}
                                    →
                                    {{ $ride->trip->arrival_time->format('H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>


                    <!-- Price Card -->
                    <div class="bg-white flex items-center space-x-4 shadow-md border border-customgreen-400 rounded-xl p-4">
                        <div class="text-center">
                            <p class="text-sm md:text-lg font-bold text-gray-600"></p>
                            <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" width="30" height="30" stroke-width="3" stroke="#000000" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><circle cx="31.1" cy="31.05" r="25.29"></circle><path d="M41.19,40.91a12.43,12.43,0,1,1-2.34-21.14"></path><line x1="14.99" y1="28.04" x2="35.67" y2="28.04"></line><line x1="14.99" y1="34.34" x2="33.17" y2="34.34"></line></g></svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-gray-500"></div>
                            <div>
                                <h3 class="text-base font-semibold text-customgreen-400">{{ __('messages.Price:') }}</h3>
                                <p class="text-sm md:text-base text-black"> {{ $ride->trip->price }} €</p>
                            </div>
                        </div>
                    </div>


                    <!-- Started at Card -->
                    <div class="flex items-center space-x-4 bg-white shadow-md border border-customgreen-400 rounded-xl p-4">
                        <div class="text-center">
                            <p class="text-sm md:text-lg font-bold text-gray-600"></p>
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="39" height="39" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M18 11a5 5 0 1 0-4.95-5A5.006 5.006 0 0 0 18 11zm0-9a4 4 0 1 1-4 4 4.005 4.005 0 0 1 4-4zm2 5h-3V3h1v3h2zm-5 10a1.996 1.996 0 0 0-1.505-1.93l-.013-.07H15v-1h-1.702l-.296-1.605A1.829 1.829 0 0 0 11.394 11H4.606a1.829 1.829 0 0 0-1.608 1.395L2.702 14H1v1h1.518l-.013.07A1.996 1.996 0 0 0 1 17v6h22v-1h-8zM3.981 12.576c.075-.256.387-.576.625-.576h6.788c.238 0 .55.32.643.658l.43 2.342H3.534zM3 22H2v-1h1zm9 0H4v-1h8zm2 0h-1v-1h1zm-1-3a1 1 0 0 0 1-1v2H2v-2a1 1 0 0 0 1 1h1l-1-2H2a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1h-1l-1 2zm-8-1h6v1H5z"></path><path fill="none" d="M0 0h24v24H0z"></path></g></svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-sm md:text- text-gray-500"></div>
                            <div>
                                <h3 class="text-base font-semibold text-customgreen-400"> {{ __('messages.Started at:') }} </h3>

                                <p class="text-sm md:text-base text-black">
                                    {{ __('messages.Started at:') }} {{ \Carbon\Carbon::parse($ride->trip->start_time)->format('H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>


                    <!-- Ended at Card -->
                    <div class="flex items-center space-x-4 bg-white shadow-md border border-customgreen-400 rounded-xl p-4">
                        <div class="text-center">
                            <p class="text-sm md:text-base font-bold text-gray-600"></p>
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="39" height="39" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M18 11a5 5 0 1 0-4.95-5A5.006 5.006 0 0 0 18 11zm0-9a4 4 0 1 1-4 4 4.005 4.005 0 0 1 4-4zm2 5h-3V3h1v3h2zm-5 10a1.996 1.996 0 0 0-1.505-1.93l-.013-.07H15v-1h-1.702l-.296-1.605A1.829 1.829 0 0 0 11.394 11H4.606a1.829 1.829 0 0 0-1.608 1.395L2.702 14H1v1h1.518l-.013.07A1.996 1.996 0 0 0 1 17v6h22v-1h-8zM3.981 12.576c.075-.256.387-.576.625-.576h6.788c.238 0 .55.32.643.658l.43 2.342H3.534zM3 22H2v-1h1zm9 0H4v-1h8zm2 0h-1v-1h1zm-1-3a1 1 0 0 0 1-1v2H2v-2a1 1 0 0 0 1 1h1l-1-2H2a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1h-1l-1 2zm-8-1h6v1H5z"></path><path fill="none" d="M0 0h24v24H0z"></path></g></svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-sm md:text-base text-gray-500"></div>
                            <div>
                                <h3 class="text-base font-semibold text-customgreen-400">{{ __('messages.Ended at:') }}</h3>

                                <p class="text-sm md:text-base text-black">
                                    {{ __('messages.Ended at:') }} {{ \Carbon\Carbon::parse($ride->trip->end_time)->format('H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>

            </div>
            </div>
        </div>
    @endif
@endforeach


@foreach ($trips as $ride)
    @if( $ride->status === 'Completed')
        <div
            id="driver"
            x-show="currentTab === 'driver'"
            class="bg-white shadow-md rounded-lg border border-customgreen-400 shadow-neon overflow-hidden max-w-4xl mx-auto">
            <div  class="flex flex-wrap justify-between items-center p-4 px-2 sm:px-6 cursor-pointer bg-white" onclick="toggleDetails(this)">
                <div>

                    <div class="flex items-center gap-5">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M17.197 5.46A.824.824 0 0 0 16.5 5h-9a.824.824 0 0 0-.697.46l-1.988 4.638L5.285 9H3v1.5a.501.501 0 0 0 .5.5 2.572 2.572 0 0 1 .367-.388A2.532 2.532 0 0 0 3 12.522V19.5a.501.501 0 0 0 .5.5h2a.501.501 0 0 0 .5-.5v-1.831A46.229 46.229 0 0 0 12 18a46.244 46.244 0 0 0 6.001-.331L18 19.5a.501.501 0 0 0 .5.5h2a.501.501 0 0 0 .5-.5v-6.978a2.534 2.534 0 0 0-.87-1.909 2.523 2.523 0 0 1 .359.387h.011a.501.501 0 0 0 .5-.5V9h-2.286zM7.66 6h8.68l1.715 4H5.945zM5 19H4v-1.79a1.983 1.983 0 0 0 .613.235c.118.024.254.048.387.071zm15 0h-1v-1.484c.133-.023.269-.047.387-.07A1.989 1.989 0 0 0 20 17.21zm-.525-7.632A1.53 1.53 0 0 1 20 12.522v2.946a1.015 1.015 0 0 1-.808.997A43.178 43.178 0 0 1 12 17a43.255 43.255 0 0 1-7.192-.535A1.015 1.015 0 0 1 4 15.468v-2.946a1.532 1.532 0 0 1 .524-1.156 1.49 1.49 0 0 1 .568-.307L5.296 11h13.406l.205.06a1.493 1.493 0 0 1 .568.308zM17 13h2v1a1 1 0 0 1-1 1h-2zM7 13l1 2H6a1 1 0 0 1-1-1v-1zm2 1h6v1H9z"></path><path fill="none" d="M0 0h24v24H0z"></path></g></svg>
                        <h3 class="text-sm md:text-lg font-medium text-gray-900 flex items-center gap-1">
                            {{ $ride->origincity->name }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                            {{ $ride->destinationcity->name }}
                        </h3>
                    </div>
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ml-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                        &nbsp;&nbsp; &nbsp;{{ $ride->departure_time->format('d/m') }}
                    </p>
                </div>
                <svg class="w-5 h-5 text-gray-500 transform transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 15l-6-6h12l-6 6z"/>
                </svg>
            </div>
            <div class="details hidden px-0 py-2 bg-[#c9dde2] ">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:p-6  ">

                    <!-- Driver Card -->
                    <div class="flex items-center space-x-4 bg-white shadow-md rounded-xl p-4 border border-customgreen-400">
                        <div class="text-center">
                            <p class="text-sm md:text-base font-bold text-gray-600"></p>
                            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" width="35" height="35"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M27 40C27 41.6569 25.6569 43 24 43C22.3431 43 21 41.6569 21 40C21 38.3431 22.3431 37 24 37C25.6569 37 27 38.3431 27 40Z" fill="#333333"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M30.6187 37.1037C30.1899 35.5033 31.1396 33.8583 32.74 33.4295L34.6719 32.9118C36.2723 32.483 37.9173 33.4328 38.3461 35.0332L39.3814 38.8969C39.8102 40.4973 38.8604 42.1423 37.26 42.5711L35.3282 43.0887C33.7278 43.5176 32.0828 42.5678 31.654 40.9674L30.6187 37.1037ZM33.2576 35.3613C32.7242 35.5043 32.4076 36.0526 32.5505 36.5861L33.5858 40.4498C33.7288 40.9832 34.2771 41.2998 34.8106 41.1569L36.7424 40.6392C37.2759 40.4963 37.5925 39.948 37.4495 39.4145L36.4142 35.5508C36.2713 35.0173 35.723 34.7007 35.1895 34.8437L33.2576 35.3613Z" fill="#333333"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.65396 35.0324C10.0828 33.432 11.7278 32.4823 13.3282 32.9111L15.26 33.4287C16.8604 33.8576 17.8102 35.5026 17.3814 37.103L16.3461 40.9667C15.9173 42.5671 14.2723 43.5168 12.6719 43.088L10.74 42.5704C9.13961 42.1415 8.18986 40.4965 8.61869 38.8961L9.65396 35.0324ZM12.8106 34.843C12.2771 34.7 11.7288 35.0166 11.5858 35.5501L10.5505 39.4138C10.4076 39.9472 10.7242 40.4956 11.2576 40.6385L13.1895 41.1561C13.723 41.2991 14.2713 40.9825 14.4142 40.449L15.4495 36.5853C15.5925 36.0519 15.2759 35.5035 14.7424 35.3606L12.8106 34.843Z" fill="#333333"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M15.8378 39H23V31.0549C20.1303 31.3722 17.6672 33.0387 16.2592 35.406C16.0095 34.9247 15.5662 34.546 15.0012 34.3947L14.5983 34.2867C16.5287 31.1168 20.0172 29 24 29C27.9832 29 31.4718 31.1171 33.4022 34.2874L32.9988 34.3954C32.434 34.5468 31.9908 34.9253 31.7411 35.4064C30.3331 33.0389 27.8699 31.3722 25 31.0549V39H32.1621L32.6199 40.7086C32.647 40.8098 32.6814 40.9071 32.7223 41H24H15.2773C15.3185 40.9068 15.353 40.8093 15.3802 40.7078L15.8378 39ZM15.0966 41.324C14.6828 41.9256 13.9602 42.2651 13.2156 42.1769C13.4542 43.3648 13.8842 44.4842 14.4722 45.5007L16.2034 44.4993C15.6481 43.5392 15.2649 42.4671 15.0966 41.324ZM31.7966 44.4993C32.3518 43.5394 32.7349 42.4675 32.9033 41.3246C33.3171 41.9262 34.0397 42.2658 34.7843 42.1777C34.5457 43.3653 34.1157 44.4844 33.5278 45.5007L31.7966 44.4993Z" fill="#333333"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M15 17V14H17V17C17 20.866 20.134 24 24 24C27.866 24 31 20.866 31 17V14H33V17C33 21.9706 28.9706 26 24 26C19.0294 26 15 21.9706 15 17Z" fill="#333333"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5989 6.25348C15.0904 6.66596 15 6.95645 15 7.09677C15 8.53676 15.2324 9.66613 15.4583 10.424C15.5256 10.6495 15.5922 10.8421 15.6519 11H32.3481C32.4078 10.8421 32.4745 10.6496 32.5417 10.4241C32.7676 9.66629 33 8.53693 33 7.09678C33 6.95645 32.9096 6.66596 32.4011 6.25348C31.9098 5.85504 31.1661 5.46148 30.2339 5.11465C28.3749 4.42299 25.9931 4 24 4C22.0069 4 19.6251 4.42299 17.7661 5.11465C16.8339 5.46148 16.0902 5.85504 15.5989 6.25348ZM31.7015 13H16.2985C16.3655 13.09 16.4474 13.1843 16.5475 13.2811C17.3021 14.0108 19.2284 15 24 15C28.7716 15 30.6979 14.0108 31.4525 13.2811C31.5526 13.1843 31.6345 13.09 31.7015 13ZM13.9878 12.2059C13.9684 12.1635 13.9475 12.1164 13.9253 12.0648C13.8174 11.8142 13.6787 11.455 13.5417 10.9953C13.2676 10.0758 13 8.75356 13 7.09678C13 6.07581 13.6321 5.27356 14.3391 4.70015C15.0634 4.1127 16.0284 3.62723 17.0687 3.24019C19.1546 2.46411 21.7728 2 24 2C26.2272 2 28.8454 2.46411 30.9313 3.24019C31.9716 3.62723 32.9366 4.1127 33.6609 4.70015C34.3679 5.27356 35 6.07581 35 7.09677C35 8.75371 34.7324 10.076 34.4583 10.9955C34.3213 11.4551 34.1826 11.8143 34.0747 12.0649C34.0525 12.1165 34.0316 12.1635 34.0122 12.2059C34.0109 12.3756 33.9934 12.5932 33.9375 12.8431C33.8141 13.3952 33.5101 14.0736 32.8428 14.7189C31.5291 15.9892 28.9555 17 24 17C19.0445 17 16.4709 15.9892 15.1572 14.7189C14.4899 14.0736 14.1859 13.3952 14.0625 12.8431C14.0066 12.5932 13.9891 12.3756 13.9878 12.2059Z" fill="#333333"></path> <path d="M20 8C20 7.44772 20.4477 7 21 7H27C27.5523 7 28 7.44772 28 8C28 8.55228 27.5523 9 27 9H21C20.4477 9 20 8.55228 20 8Z" fill="#333333"></path> </g></svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-sm md:text-lg text-gray-500"></div>
                            <div>
                                <h3 class="text-sm md:text-base font-semibold text-customgreen-400 flex items-center gap-2">
                                    {{ __('messages.Driver') }} @if ($ride->users->verification_status === 'verified')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="orange"
                                             class="w-4 h-4 text-orange inline ml-2" viewBox="0 0 24 24">
                                            <path
                                                d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0zm-1.7 18.3l-4.6-4.6 1.4-1.4 3.2 3.2 7.2-7.2 1.4 1.4z"/>
                                        </svg>
                                    @endif

                                    @if ($ride->start_time && $ride->start_time->diffInMinutes($ride->departure_time) <= 10)
                                        <span class="text-sm md:text-sm font-bold text-green-600 flex items-center gap-1">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                          </svg>
                                           {{ __('messages.On Time') }}
                                      </span>
                                    @endif
                                </h3>
                                <p class="text-sm md:text-base text-black">{{ $ride->users->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Passengers Card -->
                    <div class="flex items-center space-x-4 bg-white border shadow-md border-customgreen-400  rounded-xl p-4">
                        <div class="text-center">
                            <p class="text-sm md:text-base font-bold text-gray-600"></p>
                            <svg fill="#000000" height="35" width="35" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M270.948,302.936c-10.562-14.943-27.525-24.074-45.713-24.765c-0.385-0.043-0.775-0.067-1.171-0.067 c-23.135,0-42.252-17.484-44.859-39.93c6.661-4.851,12.807-11.007,18.254-18.381c11.015-14.913,18.165-33.547,20.816-53.698 c0.812-0.883,1.496-1.911,1.987-3.081c4.664-11.106,7.029-22.963,7.029-35.242c0-47.221-35.702-85.637-79.584-85.637 c-11.349,0-22.36,2.578-32.768,7.665c-3.891,0.328-7.704,1.028-11.365,2.088c-36.686,10.599-57.421,54.957-46.22,98.88 c1.127,4.419,2.56,8.765,4.262,12.916c0.464,1.134,1.114,2.13,1.88,3c4.225,31.022,18.908,56.833,38.989,71.434 c-2.581,22.474-21.712,39.988-44.867,39.988c-0.356,0-0.708,0.019-1.056,0.053C25.185,279.268,0,305.121,0,336.763v63.14 c0,5.891,4.775,10.666,10.666,10.666h188.451c5.89,0,10.666-4.775,10.666-10.666s-4.776-10.666-10.666-10.666H21.331v-52.475 c0-20.585,16.746-37.33,37.33-37.33c0.356,0,0.708-0.019,1.056-0.053c7.683-0.24,15.04-1.786,21.858-4.429l50.497,72.883 c1.992,2.875,5.268,4.592,8.767,4.592c3.499,0,6.775-1.716,8.767-4.592l50.498-72.883c6.819,2.643,14.175,4.189,21.858,4.429 c0.348,0.034,0.7,0.053,1.056,0.053c12.105,0,23.511,5.912,30.51,15.815c2.078,2.94,5.372,4.51,8.719,4.51 c2.128,0,4.277-0.636,6.147-1.957C273.205,314.402,274.347,307.746,270.948,302.936z M109.492,72.377 c2.798-0.808,5.757-1.288,8.796-1.425c1.566-0.07,3.094-0.484,4.482-1.213c7.926-4.164,16.314-6.276,24.933-6.276 c31.47,0,57.174,27.694,58.204,62.162c-6.414-4.85-14.393-7.733-23.035-7.733h-55.779c-2.778,0-5.416-0.872-7.625-2.521 c-1.891-1.411-3.351-3.305-4.224-5.482c-2.015-5.014-7-8.146-12.383-7.806c-5.416,0.347-9.973,4.111-11.338,9.361 c-2.721,10.453-7.801,20.188-14.708,28.455C71.283,108.973,85.213,79.392,109.492,72.377z M84.479,162.705 c9.316-8.54,16.855-18.89,22.119-30.32c0.036,0.027,0.073,0.054,0.11,0.081c5.925,4.422,12.973,6.758,20.384,6.758h55.779 c6.7,0,12.487,3.92,15.234,9.577c-0.071,22.157-6.384,42.854-17.806,58.315c-10.771,14.58-24.785,22.61-39.462,22.61 c-13.583,0-26.807-7.017-37.236-19.757C93.483,197.61,86.788,180.974,84.479,162.705z M140.838,343.031l-40.817-58.912 c10.95-9.086,18.932-21.616,22.307-35.908c5.943,1.86,12.141,2.848,18.509,2.848c6.334,0,12.537-0.961,18.52-2.817 c3.379,14.278,11.358,26.796,22.3,35.876L140.838,343.031z"></path> </g> </g> <g> <g> <path d="M455.441,337.455c-0.348-0.034-0.7-0.053-1.056-0.053c-23.167,0-42.305-17.531-44.871-40.023 c13.062-9.512,23.832-23.774,30.931-41.119c1.016,3.324,3.617,6.008,7.039,7.069c1.04,0.322,2.104,0.479,3.157,0.479 c3.232,0,6.36-1.473,8.417-4.114c14.881-19.112,22.616-43.986,21.784-70.041c-0.818-25.56-9.803-49.555-25.303-67.563 c-15.869-18.438-36.819-28.699-59.012-28.911c-1.177-0.048-4.104,0.053-4.577,0.082c-11.402-5.172-23.45-7.588-35.858-7.194 c-25.625,0.819-49.196,13.591-66.369,35.963c-16.688,21.741-25.355,50.098-24.404,79.85c0.161,5.041,0.559,9.683,1.203,14.103 c1.737,12.679,5.23,24.822,10.381,36.091c1.639,3.587,5.124,5.977,9.06,6.213c3.923,0.237,7.681-1.718,9.739-5.083 c0.858-1.403,1.961-3.152,3.178-4.866c4.755,14.445,12.024,27.423,21.253,37.669c3.937,4.371,8.189,8.173,12.667,11.416 c-2.586,22.469-21.715,39.977-44.866,39.977c-0.356,0-0.708,0.019-1.056,0.053c-31.374,1.112-56.558,26.967-56.558,58.607v63.14 c0,5.891,4.776,10.666,10.666,10.666h260.346c5.89,0,10.666-4.775,10.666-10.666v-63.14 C512,364.422,486.815,338.568,455.441,337.455z M290.112,225.625c-1.052-4.108-1.876-8.321-2.467-12.626 c-0.54-3.708-0.868-7.568-1.003-11.799c-0.794-24.837,6.31-48.341,20.004-66.18c13.208-17.208,31.01-27.02,50.128-27.631 c0.639-0.021,14.387-0.795,28.421,6.277c1.569,0.79,3.377,1.157,5.138,1.107c0.202-0.006,5.677-0.265,5.836-0.263 c16.02,0.106,31.362,7.741,43.203,21.497c12.331,14.328,19.487,33.622,20.149,54.329c0.359,11.247-1.221,22.18-4.567,32.239 c-1.008-2.686-2.132-5.331-3.369-7.932c-10.298-21.91-27.633-38.881-48.812-47.788c-2.683-1.128-5.709-1.111-8.378,0.047 c-2.67,1.157-4.75,3.355-5.759,6.085c-1.42,3.836-3.14,7.573-5.116,11.106c-5.584,9.986-16.842,15.927-29.361,15.489 c-1.879-0.064-3.786-0.067-5.666-0.007c-9.223,0.295-18.217,2.053-26.78,5.242C313.255,208.009,299.041,216.018,290.112,225.625z M316.351,231.43c4.044-2.709,8.347-4.94,12.853-6.643c6.344-2.362,13.063-3.672,19.97-3.893c1.41-0.046,2.838-0.044,4.246,0.005 c20.594,0.705,39.217-9.405,48.718-26.396c0.584-1.045,1.152-2.106,1.701-3.177c9.728,5.993,18.043,14.44,24.295,24.692 c-0.054,0.316-0.1,0.633-0.126,0.959c-1.636,20.237-8.617,38.809-19.658,52.295c-10.429,12.741-23.653,19.757-37.236,19.757 C346.004,289.027,323.666,265.158,316.351,231.43z M352.654,307.492c6.003,1.876,12.194,2.866,18.46,2.866 c6.384,0,12.597-0.994,18.555-2.864c4.284,18.163,16.029,33.466,31.818,42.495c-6.159,22.255-26.627,38.258-50.324,38.258 c-23.699,0-44.166-16.004-50.324-38.26C336.626,340.96,348.371,325.656,352.654,307.492z M490.669,448.537H251.654v-52.475 c0-20.583,16.746-37.33,37.33-37.33c0.356,0,0.708-0.019,1.056-0.053c3.673-0.115,7.274-0.519,10.775-1.209 c9.265,30.416,37.613,52.11,70.347,52.11c32.734,0,61.081-21.694,70.348-52.109c3.5,0.69,7.101,1.094,10.773,1.208 c0.348,0.034,0.7,0.053,1.056,0.053c20.584,0,37.33,16.746,37.33,37.33V448.537z"></path> </g> </g> </g></svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-sm md:text-lg text-gray-500"></div>
                            <div>
                                <h3 class="text-sm md:text-base font-semibold text-customgreen-400">{{ __('messages.Passengers') }}</h3>
                                <p class="text-sm md:text-base text-black"> @if ($ride->passengers->isNotEmpty())

                                        @foreach ($ride->passengers as $passenger)
                                            {{ $passenger->name }}
                                        @endforeach

                                    @else
                                        <span>{{ __('messages.No passengers available.') }}</span>
                                    @endif</p>
                            </div>
                        </div>
                    </div>

                    <!-- Planned Time Card -->
                    <div class="flex items-center space-x-4 bg-white shadow-md border rounded-xl border-customgreen-400 p-4">
                        <div class="text-center">
                            <p class="text-sm md:text-lg  font-bold text-gray-600"></p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256" fill="#000000">
                                <circle cx="128" cy="128" r="95.9" fill="none" stroke="#000" stroke-width="16" />
                                <path d="M80 211L64 240M176 211l16 29" fill="none" stroke="#000" stroke-width="16" stroke-linecap="round" />
                                <path d="M35.3 102.4A48 48 0 0 1 17.2 53.8 48 48 0 0 1 54 17.2 48 48 0 0 1 102.6 35.5" fill="none" stroke="#000" stroke-width="16" />
                                <path d="M128 32V16M128 80v48M128 128l34 34" fill="none" stroke="#000" stroke-width="16" stroke-linecap="round" />
                                <path d="M220.7 102.4A48 48 0 0 0 238.8 53.8 48 48 0 0 0 202 17.2 48 48 0 0 0 153.4 35.5" fill="none" stroke="#000" stroke-width="16" />
                            </svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-sm md:text-lg text-gray-500"></div>
                            <div>
                                <h3 class="text-sm md:text-base font-semibold text-customgreen-400"> {{ __('messages.Planned Time') }}</h3>
                                <p class="text-sm md:text-base text-black">
                                    {{ $ride->departure_time->format('H:i') }}
                                    →
                                    {{ $ride->arrival_time->format('H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Price Card -->
                    <div class="flex items-center shadow-md border border-customgreen-400 rounded-xl p-4 space-x-4 bg-white">
                        <div class="text-center">
                            <p class="text-sm md:text-lg font-bold text-gray-600"></p>
                            <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" width="30" height="30" stroke-width="3" stroke="#000000" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><circle cx="31.1" cy="31.05" r="25.29"></circle><path d="M41.19,40.91a12.43,12.43,0,1,1-2.34-21.14"></path><line x1="14.99" y1="28.04" x2="35.67" y2="28.04"></line><line x1="14.99" y1="34.34" x2="33.17" y2="34.34"></line></g></svg>

                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-sm md:text-lg text-gray-500"></div>
                            <div>
                                <h3 class="text-sm md:text-base font-semibold text-customgreen-400">{{ __('messages.Price:') }}</h3>
                                <p class="text-sm md:text-base text-black"> {{ $ride->price }} €</p>
                            </div>
                        </div>
                    </div>


                    <!-- Started at Card -->
                    <div class="flex items-center space-x-4 bg-white shadow-md border border-customgreen-400 rounded-xl p-4">
                        <div class="text-center">
                            <p class="text-sm md:text-lg font-bold text-gray-600"></p>
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="39" height="39" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M18 11a5 5 0 1 0-4.95-5A5.006 5.006 0 0 0 18 11zm0-9a4 4 0 1 1-4 4 4.005 4.005 0 0 1 4-4zm2 5h-3V3h1v3h2zm-5 10a1.996 1.996 0 0 0-1.505-1.93l-.013-.07H15v-1h-1.702l-.296-1.605A1.829 1.829 0 0 0 11.394 11H4.606a1.829 1.829 0 0 0-1.608 1.395L2.702 14H1v1h1.518l-.013.07A1.996 1.996 0 0 0 1 17v6h22v-1h-8zM3.981 12.576c.075-.256.387-.576.625-.576h6.788c.238 0 .55.32.643.658l.43 2.342H3.534zM3 22H2v-1h1zm9 0H4v-1h8zm2 0h-1v-1h1zm-1-3a1 1 0 0 0 1-1v2H2v-2a1 1 0 0 0 1 1h1l-1-2H2a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1h-1l-1 2zm-8-1h6v1H5z"></path><path fill="none" d="M0 0h24v24H0z"></path></g></svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-sm md:text-lg text-gray-500"></div>
                            <div>
                                <h3 class="text-sm md:text-base font-semibold text-customgreen-400">{{ __('messages.Started at:') }}</h3>
                                <p class="text-sm md:text-base text-black">
                                    {{ __('messages.Started at:') }} {{ \Carbon\Carbon::parse($ride->start_time)->format('H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Ended at Card -->
                    <div class="flex items-center space-x-4 bg-white shadow-md border border-customgreen-400 rounded-xl p-4">
                        <div class="text-center">
                            <p class="text-3xl font-bold text-gray-600"></p>
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="39" height="39" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M18 11a5 5 0 1 0-4.95-5A5.006 5.006 0 0 0 18 11zm0-9a4 4 0 1 1-4 4 4.005 4.005 0 0 1 4-4zm2 5h-3V3h1v3h2zm-5 10a1.996 1.996 0 0 0-1.505-1.93l-.013-.07H15v-1h-1.702l-.296-1.605A1.829 1.829 0 0 0 11.394 11H4.606a1.829 1.829 0 0 0-1.608 1.395L2.702 14H1v1h1.518l-.013.07A1.996 1.996 0 0 0 1 17v6h22v-1h-8zM3.981 12.576c.075-.256.387-.576.625-.576h6.788c.238 0 .55.32.643.658l.43 2.342H3.534zM3 22H2v-1h1zm9 0H4v-1h8zm2 0h-1v-1h1zm-1-3a1 1 0 0 0 1-1v2H2v-2a1 1 0 0 0 1 1h1l-1-2H2a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1h-1l-1 2zm-8-1h6v1H5z"></path><path fill="none" d="M0 0h24v24H0z"></path></g></svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-gray-500"></div>
                            <div>
                                <h3 class="text-sm md:text-base font-semibold text-customgreen-400"> {{ __('messages.Ended at:') }}</h3>
                                <p class="text-sm md:text-base text-black">
                                    {{ __('messages.Ended at:') }} {{ \Carbon\Carbon::parse($ride->end_time)->format('H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach

        </div>
        </div>
        </div>
        </div>
        </div>

        <script>
            function tabs() {
                return {
                    currentTab: 'driver',
                };
            }
            function toggleDetails(element) {
                const details = element.nextElementSibling;
                details.style.display = details.style.display === 'block' ? 'none' : 'block';
            }
        </script>
        </x-app-layout>
