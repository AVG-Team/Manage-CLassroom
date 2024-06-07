@props(['title','description','created_at','id'])
<div class="h-auto mb-2 border rounded-xl">
    <div class="exerciseBtn flex items-center w-full p-4 bg-white shadow-md rounded-xl hover:bg-gray-100 border-b">
        <div class="flex-shrink-0">
            <div class="flex items-center justify-center w-12 h-12 text-white bg-gray-400 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
            </div>
        </div>
        <div class="items-start flex-1 ml-4">
            <p class="text-sm text-gray-700">Ngày {{ $created_at }} </p>
        </div>
        <div class="items-end ml-4">
            <p class="text-xs text-gray-400">Đến hạn 21:30 4/6</p>
        </div>
    </div>
    <div class=" description items-center w-full p-4 bg-white shadow-md rounded-b-xl hidden">
        <div class="items-start flex-1  border-b mb-3 p-2">
            <p class="text-sm text-gray-700">{{ $title }}</p>
            <p class="text-sm text-gray-700">{{ $description }}</p>
        </div>
        <a href="{{ route('exercise', $id) }}" class="text-blue-600 no-underline font-medium text-md p-2 hover:bg-blue-100 rounded-xl">Xem hưỡng dẫn  </a>
    </div>
</div>
