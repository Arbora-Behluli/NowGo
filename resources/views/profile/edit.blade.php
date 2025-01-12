<x-app-layout>
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>
            <div>
                
         </div>
    </div>
 </div>
    <script>
        function previewImage(event) {
            const image = document.getElementById('profileImage');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result; // Update the image preview
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
