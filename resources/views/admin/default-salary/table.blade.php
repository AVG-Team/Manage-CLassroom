<div class="overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">#
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Lương Cơ Bản
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Số Lượng Giảng Viên Đã Áp Dụng Lương
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Hành Động
            </th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($defaultSalaries as $defaultSalary)
            <tr onclick="if (!event.target.closest('.no-navigation')) { location.href='{{ route('admin.default-salary.edit', $defaultSalary->id) }}' }"
                class="cursor-pointer">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-gray-800">{{ $defaultSalary->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $defaultSalary->salary_formatted }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $defaultSalary->countTeacherUsed }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium no-navigation">
                    <button type="button" onclick="location.href='{{ route('admin.default-salary.edit', $defaultSalary->id) }}'"
                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none mr-3">
                        Chỉnh Sửa
                    </button>
                    <button type="button" data-id="{{ $defaultSalary->id }}"
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
    {{ $defaultSalaries->links() }}
</div>
