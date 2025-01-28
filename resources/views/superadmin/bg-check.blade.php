    <x-app-layout>
        <div class="container mx-auto mt-5 px-5 sm:px-10 md:px-20">
            <div class="flex justify-center items-center mb-8">
                <h2 class="text-lg sm:text-xl md:text-2xl text-gray-700 text-center bg-white shadow-md py-1 px-6 sm:px-10 md:px-20 rounded-full inline-block">
                    Background Check
                </h2>
            </div>


            <!-- Verification Table -->
            <div class="relative rounded-lg flex flex-col h-full overflow-y-auto max-h-[calc(80vh-100px)] text-gray-700 bg-white shadow-lg w-full">
                <table class="w-full text-left table-auto border-collapse ">
                    <thead class="bg-white text-gray-400 px-4 py-3 tracking-wide">
                    <tr>
                        <th class="px-6 py-4 text-sm leading-none text-left">Name</th>
                        <th class="px-6 py-4 text-sm leading-none text-left">Verification Status</th>
                        <th class="px-6 py-4 text-sm leading-none text-left">Document</th>
                        <th class="px-6 py-4 text-sm leading-none text-left">Verify</th>
                        <th class="px-6 py-4 text-sm leading-none text-left">Flag</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="">
                    @foreach($users->where('id', '!=', auth()->id()) as $user)
                        <tr class="border-b border-gray-300 bg-gray-100 p-2.5 hover:bg-gray-200">
                            <td class="px-6 py-4 text-gray-700">{{ $user->name }} {{$user->lastname}}</td>
                            <td class="px-6 py-4 text-left">
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-md
                                    {{ $user->background_status === 'verified' ? ' text-green-800' : ' text-yellow-600' }}">
                                    {{ ucfirst($user->background_status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-left flex text-left">
                                    @if($user->background_document)
                                        <button onclick="openDocumentModalBg('{{ asset('storage/' . $user->background_document) }}')"
                                            class="underline flex text-left text-blue-500">
                                            <span>View Document</span>
                                            <svg class="h-4 w-4 mt-1" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill=""><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>open-external</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="icon" fill="#3B82F6" transform="translate(85.333333, 64.000000)"> <path d="M128,63.999444 L128,106.666444 L42.6666667,106.666667 L42.6666667,320 L256,320 L256,234.666444 L298.666,234.666444 L298.666667,362.666667 L4.26325641e-14,362.666667 L4.26325641e-14,64 L128,63.999444 Z M362.666667,1.42108547e-14 L362.666667,170.666667 L320,170.666667 L320,72.835 L143.084945,249.751611 L112.915055,219.581722 L289.83,42.666 L192,42.6666667 L192,1.42108547e-14 L362.666667,1.42108547e-14 Z" id="Combined-Shape"> </path> </g> </g> </g></svg>
                                        </button>
                                @else
                                    <span class="text-gray-700 italic">No Document</span>
                                @endif
                            </td>
                            <td class="text-left">
                                    <form action="{{ route('superadmin.bgverify', $user) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md shadow">
                                            Verify
                                        </button>
                                    </form>
                            </td>
                            <td class="px-6 py-4 flex text-left space-x-4">
                                <form action="{{ route('superadmin.bgflagged', $user) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="px-4 py-2 bg-red-700 text-white rounded-md shadow hover:bg-red-800">
                                        Flag
                                    </button>
                                </form>

                            </td>
                            <td>
                                @if(preg_match('/\.(png|jpg|jpeg)$/i', $user->background_document))
                                    <button onclick="toggleDropdownRow('{{ $user->id }}')"  class="focus:outline-none">
                                        <svg id="arrow-icon-{{ $user->id }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 transform transition-transform">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                @endif
                            </td>
                        </tr>
                        <tr id="dropdown-row-{{ $user->id }}" class="hidden">
                            <td colspan="5" class="px-6 py-4 border-b border-gray-600">
                                <div class="text-gray-700">
                                    <div id="ocr-result-{{ $user->id }}" class="text-sm text-gray-600 italic">
                                        <p><strong>Firstname:</strong>Not yet extracted</p>
                                        <p><strong>Lastname:</strong>Not yet extracted</p>
                                        <p><strong>Personal Number:</strong>Not yet extracted</p>
                                        <p><strong>Date Of Birth:</strong>Not yet extracted</p>
                                        <p><strong>Gender:</strong>Not yet extracted</p>
                                        <p><strong>Certificate:</strong>Not yet extracted</p>
                                        <p><strong>Convicted:</strong>Not yet extracted</p>
                                        <p><strong>Certificate Purpose:</strong>Not yet extracted</p>
                                    </div>
                                    <p class="text-sm text-yellow-600 mt-2 italic"> Note: The information above is automatically extracted and might require verification.</p>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Document Viewer Modal -->
        <div id="documentModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
            <div class="bg-white p-4 rounded-lg max-w-lg w-full relative " >
                <!-- Content for displaying PDF or Image -->
                <div id="pdfViewerContainer" class="hidden overflow-y-auto max-h-[80vh]">
                    <canvas id="pdfViewer" class="w-full h-auto rounded"></canvas>
                </div>
                <div id="imageViewerContainer" class="hidden">
                    <img id="documentImage" src="" alt="Document Preview" class="w-full h-auto rounded">
                </div>
                <!-- Close Button -->
                <button onclick="closeDocumentModal()"
                        class="absolute top-4 right-4 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                    Close
                </button>
            </div>
        </div>

        <!-- Include PDF.js Library -->


        <script>
            document.addEventListener('DOMContentLoaded', () => {
                @foreach($users->where('id', '!=', auth()->id()) as $user)
        @if($user->background_document)
            @php
                $imageUrl = app()->environment('local')
                    ? asset('storage/' . $user->background_document) 
                    : secure_asset('storage/' . $user->background_document); 
            @endphp
            extractTextFromImage('{{ $imageUrl }}', '{{ $user->id }}');
        @endif
    @endforeach
            });
            function extractTextFromImage(imageUrl, userId) {
                const resultElement = document.getElementById(`ocr-result-${userId}`);
                resultElement.innerHTML = "Extracting data...";

                Tesseract.recognize(
                    imageUrl,
                    'sqi',
                    {

                    }
                )
                    .then(({ data: { text } }) => {
                        if (text) {
                            // Post-process the text to extract specific fields
                            const extractedData = extractSpecificFields(text);

                            // Display the extracted data
                            resultElement.innerHTML = `
                    <p><strong>Name:</strong> ${extractedData.firstName || "Not found"}</p>
                    <p><strong>Name:</strong> ${extractedData.lastname || "Not found"}</p>
                    <p><strong>Personal Number:</strong> ${extractedData.personalNumber || "Not found"}</p>
                    <p><strong>Date Of Birth:</strong> ${extractedData.dateOfBirth || "Not found"}</p>
                    <p><strong>Gender:</strong> ${extractedData.gender || "Not found"}</p>
                    <p><strong>Certificate:</strong> ${extractedData.certificate || "Not found"}</p>
                    <p><strong>Convicted:</strong> <span class="underline"> ${extractedData.convicted || "Not found"}</span></p>
                    <p><strong>Certificate Purpose:</strong> ${extractedData.certificatePurpose || "Not found"}</p>
                `;
                        } else {
                            resultElement.innerHTML = "No text found.";
                        }
                    })
                    .catch((error) => {
                        console.error("OCR Error:", error);
                        resultElement.innerHTML = "Something went wrong.";
                    });
            }

            function extractSpecificFields(ocrText) {
                // Define regex patterns for each field
                const patterns = {
                    firstName: /VËRTETON\s*[\n\r]?\s*([A-Za-zÀ-ÖØ-öø-ÿ]+)/i,
                    lastname: /([A-Za-zÀ-ÖØ-öø-ÿ\-.]+(?:\s[A-Za-zÀ-ÖØ-öø-ÿ\-.]+)*)(?:,?\s*me nr\.)/i,
                    personalNumber: /identifikimit\s*(\d+)[,;]?\s*/i,
                    dateOfBirth: /lindur me\s*([\d.]+)/i,
                    gender: /gjinisë\s*([A-Za-zÀ-ÖØ-öø-ÿ]+)(?=\s)/i,
                    certificate: /CERTIFIKATË MBI DENIMET PENALE/i,
                    convicted: /NUK ËSHTË I DENUAR ME AKTGJYKIM TË FORMËS SË PRERË/i,
                    certificatePurpose: /përdoret për:\s*([A-Za-zÀ-ÖØ-öø-ÿ]+)(?=\s)/i,
                };

                const extracted = {
                    firstName: (function() {
                        const result = ocrText.match(patterns.firstName);
                        return result ? result[1] : "Not found";
                    })(),
                    lastname: (function() {
                        const result = ocrText.match(patterns.lastname);
                        return result ? result[1] : "Not found";
                    })(),
                    personalNumber: (function() {
                        const result = ocrText.match(patterns.personalNumber);
                        return result ? result[1] : "Not found";
                    })(),
                    dateOfBirth: (function() {
                        const result = ocrText.match(patterns.dateOfBirth);
                        return result ? result[1] : "Not found";
                    })(),
                    gender: (function() {
                        const result = ocrText.match(patterns.gender);
                        return result ? result[1] : "Not found";
                    })(),
                    certificate: (function() {
                        const result = ocrText.match(patterns.certificate);
                        return result ? result : "Not found";
                    })(),
                    convicted: (function() {
                        const result = ocrText.match(patterns.convicted);
                        return result ? result : "Not found";
                    })(),
                    certificatePurpose: (function() {
                        const result = ocrText.match(patterns.certificatePurpose);
                        return result ? result[1] : "Not found";
                    })(),
                };
                return extracted;
            }


        </script>

        <script>
            function toggleDropdownRow(userId) {
                const row = document.getElementById(`dropdown-row-${userId}`);
                const arrowIcon = document.getElementById(`arrow-icon-${userId}`)
                row.classList.toggle('hidden');

                if (!row.classList.contains('hidden')) {
                    arrowIcon.classList.add('rotate-180');
                } else {
                    arrowIcon.classList.remove('rotate-180');
                }

            }
            function openDocumentModalBg(documentUrl) {
                const modal = document.getElementById('documentModal');
                modal.classList.remove('hidden');

                const fileExtension = documentUrl.split('.').pop().toLowerCase();
                if (fileExtension === 'pdf') {
                    showPdfDocument(documentUrl);
                } else if (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'].includes(fileExtension)) {
                    showImageDocument(documentUrl);
                }
            }

            function showPdfDocument(pdfUrl) {
                const pdfViewerContainer = document.getElementById('pdfViewerContainer');
                pdfViewerContainer.classList.remove('hidden');
                document.getElementById('imageViewerContainer').classList.add('hidden');

                // Clear previous content
                pdfViewerContainer.innerHTML = '';

                const loadingTask = pdfjsLib.getDocument(pdfUrl);
                loadingTask.promise.then(pdf => {
                    for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                        const canvas = document.createElement('canvas');
                        canvas.classList.add('w-full', 'h-auto', 'rounded', 'mb-4');
                        pdfViewerContainer.appendChild(canvas);

                        pdf.getPage(pageNum).then(page => {
                            const context = canvas.getContext('2d');
                            const viewport = page.getViewport({ scale: 1.5 });
                            canvas.height = viewport.height;
                            canvas.width = viewport.width;

                            page.render({ canvasContext: context, viewport: viewport });
                        }).catch(error => {
                            console.error('Error rendering page ' + pageNum + ': ' + error);
                        });
                    }
                }).catch(error => {
                    console.error('Error loading PDF: ' + error);
                });
            }

            function showImageDocument(imageUrl) {
                document.getElementById('pdfViewerContainer').classList.add('hidden');
                document.getElementById('imageViewerContainer').classList.remove('hidden');
                document.getElementById('documentImage').src = imageUrl;
            }

            function closeDocumentModal() {
                document.getElementById('documentModal').classList.add('hidden');
            }
        </script>
    </x-app-layout>
