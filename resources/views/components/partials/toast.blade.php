@props(['type' => 'primary', 'message' => ''])

<!-- get color -->
<span class="hidden bg-error-500 bg-success-500 bg-alert-500"></span>

<!-- Toast -->
<div class="toast hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-{{ $type }}-500 text-sm text-white rounded-xl shadow-lg" role="alert">
    <div class="flex p-4">
        {{ $message }}

        <div class="ms-auto">
            <button type="button" data-hs-remove-element=".toast"
                    class="inline-flex flex-shrink-0 justify-center items-center h-5 w-5 rounded-lg text-white hover:text-white opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100">
                <span class="sr-only">{{ __("Close") }}</span>
                <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path d="M18 6 6 18"/>
                    <path d="m6 6 12 12"/>
                </svg>
            </button>
        </div>
    </div>
</div>
<!-- End Toast -->
