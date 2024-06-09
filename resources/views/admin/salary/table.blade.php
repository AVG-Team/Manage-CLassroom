<div class="overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tên Giảng Viên
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">SĐT Giảng Viên
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Lương
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Thưởng
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Ngày Thanh Toán
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
        @foreach($salaries as $salary)
            <tr onclick="if (!event.target.closest('.no-navigation')) { location.href='{{ route('admin.salaries.edit', $salary->id) }}' }"
                class="cursor-pointer">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-gray-800">{{ $salary->user->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $salary->user->phone }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ price_format($salary->defaultSalary->salary) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $salary->bonus == 0 ? "Không có thưởng" : price_format($salary->bonus) }}</td>
                @php
                    $payday = $salary->payday;
                    if (!($payday instanceof \DateTime)) {
                        $payday = new \DateTime($payday);
                    }
                    $formattedPayday = $payday->format('d-m-Y');
                @endphp
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $formattedPayday }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ \App\Enums\SalaryStatusEnum::getKeyByValue($salary->status) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium no-navigation">
                    <button type="button" onclick="location.href='{{ route('admin.salaries.edit', $salary->id) }}'"
                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none mr-3">
                        Chỉnh Sửa
                    </button>
                    <button type="button" data-id="{{ $salary->id }}"
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
    {{ $salaries->links() }}
</div>
