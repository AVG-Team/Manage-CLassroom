<x-auth.layout>
    @section('title')
        {{ $title }}
    @endsection
    <div class="flex h-full justify-center items-center">
        <!-- Right column container -->
        <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
            <form action="{{ route("register.process") }}" method="post">
                @csrf
                <!--Sign in section-->
                <div class="flex flex-row items-center justify-center lg:justify-center">
                    <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo">
                </div>
                <!-- Email input -->
                <div>
                    <label for="hs-validation-name-error" class="block text-sm font-medium mb-2">Email</label>
                    <div class="relative">
                        <input type="text" id="hs-validation-name-error" name="hs-validation-name-error" class="py-3 px-4 block w-full border-red-500 rounded-lg text-sm focus:border-red-500 focus:ring-red-500" required="" aria-describedby="hs-validation-name-error-helper">
                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                            <svg class="flex-shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" x2="12" y1="8" y2="12"></line>
                                <line x1="12" x2="12.01" y1="16" y2="16"></line>
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">Please enter a valid email address.</p>
                </div>

                <!-- Login button -->
                <div class="text-center lg:text-left">
                    <x-user.form.buttons.primary type="button" class="w-full h-10" id="button_submit">Cập Nhật</x-user.form.buttons.primary>
                </div>
            </form>
        </div>
    </div>
    @push("scripts")
        <script></script>
    @endpush
</x-auth.layout>
