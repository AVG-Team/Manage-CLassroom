@props(['notifications'])
@foreach($notifications as $notification)
@if($notification->type == 2)
<div class="h-auto mb-2 border rounded-xl">
    <a href="#"
       class="flex items-center w-full p-4 bg-white shadow-md rounded-xl hover:text-blue-400 hover:bg-gray-100">
        <div class="flex-shrink-0">
            <div class="flex items-center justify-center w-12 h-12 bg-blue-500 rounded-full">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
        </div>
        <div class="items-start flex-1 ml-4">
            <p class="text-sm text-gray-700">{{ $notification->content }}</p>
            <p class="text-xs text-gray-500">{{ $notification->created_at->format('d') }} thg {{ $notification->created_at->format('m') }}</p>
        </div>
    </a>
</div>
@endif
@endforeach
