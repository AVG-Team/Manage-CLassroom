<div class="overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tên Giáo Viên
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tiêu Đề Thông Báo
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Nội Dung
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Lớp Học
            </th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($notifications as $notification)
            <tr
                class="cursor-pointer">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-gray-800">{{ $notification->user->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ truncateString($notification->title) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $notification->content }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $notification->classroom->title  }} {{ $notification->classroom->grade }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="py-1 px-4" id="pagination">
    {{ $notifications->links() }}
</div>
