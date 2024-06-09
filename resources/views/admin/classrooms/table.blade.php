<div class="overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tiêu Đề
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Mã Lớp Học
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tên Giáo Viên
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Môn Học
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Lớp
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tình Trạng
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                Hành Động
            </th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($classrooms as $classroom)
            <tr onclick="if (!event.target.closest('button')) { location.href='{{ route('admin.exercises.edit', $classroom->id) }}' }"
                class="cursor-pointer">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ truncateString($classroom->title) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $classroom->code_classroom }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $classroom->teacher == null ? "Chưa có" : $classroom->teacher->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $classroom->subject->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $classroom->grade }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ \App\Enums\ClassroomStatusEnum::getKeyByValue($classroom->status) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <button type="button" onclick="location.href='{{ route('admin.classrooms.edit', $classroom->id) }}'"
                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none mr-3">
                        Chỉnh Sửa
                    </button>
                    <button type="button" data-id="{{ $classroom->id }}"
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
    {{ $classrooms->links() }}
</div>
