@props(['notifications'])
@foreach($notifications as $notification)
<div class="h-auto mb-2 border rounded-xl ">
    <div class="p-4 bg-white rounded-lg shadow-md">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div
                    class="w-[2.2rem] h-[2.2rem] lg:w-[2.8rem] lg:h-[2.8rem] overflow-hidden border-2 border-white rounded-full lg:top-[-2.2rem] top-[-1.2rem] bg-[#5AB2FF] flex justify-center items-center">
                    <div class="inset-0 flex items-center justify-center text-xl font-bold text-[#FFF9D0]">
                        GV
                    </div>
                </div>
            </div>
            <div class="ml-4">
                <div class="font-bold text-md">{{ $notification->user->name}}</div>
                <div class="text-xs text-gray-600 ">{{
                    $notification->created_at->format('d') }} tháng {{ $notification->created_at->format('m') }}</div>
            </div>
        </div>
        <div class="pb-4 mt-3 border-b">
            <p>{{ $notification->content }}</p>
        </div>
    </div>
</div>
@endforeach
