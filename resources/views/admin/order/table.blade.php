<div class="overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tên Học Viên
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Số Điện Thoại Học Viên
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tiêu Đề Lớp Học
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Mã Lớp Học
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tổng Tiền
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Mã Hoá Đơn
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tình Trạng
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                Hành Động
            </th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($orders as $order)
            <tr onclick="if (!event.target.closest('.no-navigation')) { location.href='{{ route('admin.orders.edit', $order->id) }}' }"
                class="cursor-pointer">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-gray-800">{{ $order->user->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-gray-800">{{ $order->user->phone }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ truncateString($order->classroom->title) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $order->classroom->code_classroom }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $order->total == null || $order->total == 0 ? "Miễn Phí" : $order->total }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $order->code_order }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ \App\Enums\OrderStatusEnum::getKeyByValue($order->status) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium no-navigation">
                    <button type="button" onclick="location.href='{{ route('admin.orders.edit', $order->id) }}'"
                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none mr-3">
                        Chỉnh Sửa
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="py-1 px-4" id="pagination">
    {{ $orders->links() }}
</div>
