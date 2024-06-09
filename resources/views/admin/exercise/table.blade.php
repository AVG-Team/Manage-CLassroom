<div class="overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tiêu Đề
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tên File
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tên Giáo Viên
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tên Lớp Học
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Ngày Tải Lên
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                Hành Động
            </th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($exercises as $exercise)
            <tr onclick="if (!event.target.closest('button')) { location.href='{{ route('admin.exercises.edit', $exercise->id) }}' }" class="cursor-pointer">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ truncateString($exercise->title) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $exercise->name_file_upload }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 {{ $exercise->user->deleted_at !== null ? "opacity-50" : ""}}" title="{{ $exercise->user->deleted_at !== null ? "User đã bị xóa" : "" }}">{{ $exercise->user->name }} </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $exercise->classroom->title }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ date_format($exercise->created_at, "H:i d-m-Y") }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <a href="{{ Storage::url("exercises/" . $exercise->name_file_upload) }}" download
                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none mr-3">
                        Tải File Xuống
                    </a>
                    <button type="button" onclick="location.href='{{ route('admin.exercises.edit', $exercise->id) }}'"
                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none mr-3">
                        Chỉnh Sửa
                    </button>
                    <button type="button" data-id="{{ $exercise->id }}"
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
    {{ $exercises->links() }}
</div>
