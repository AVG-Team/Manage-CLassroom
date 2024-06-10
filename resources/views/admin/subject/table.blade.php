<div class="overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">#
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tên Môn
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Số Lượng Môn Học Đã Đăng Ký
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Hành Động
            </th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($subjects as $subject)
            <tr onclick="if (!event.target.closest('.no-navigation')) { location.href='{{ route('admin.subject.edit', $subject->id) }}' }"
                class="cursor-pointer">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-gray-800">{{ $subject->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $subject->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $subject->countClassroomSubscribed }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium no-navigation">
                    <button type="button" onclick="location.href='{{ route('admin.subject.edit', $subject->id) }}'"
                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none mr-3">
                        Chỉnh Sửa
                    </button>
                    <button type="button" data-id="{{ $subject->id }}"
                            class="btn-delete inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none">
                        Xoá
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="py-1 px-4" id="pagination">
    {{ $subjects->links() }}
</div>
