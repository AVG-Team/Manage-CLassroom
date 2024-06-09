<div class="overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="py-3 ps-4">
                <div class="flex items-center h-5">
                    <input id="check-all-status" type="checkbox" onclick="checkAllStatus()"
                           class="cursor-pointer border-gray-200 w-4 h-4 rounded-lg text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <label for="check-all-status" class="sr-only">Checkbox</label>
                </div>
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tên Học Viên
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tuổi
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Lớp
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tiêu Đề Lớp Học
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Môn
            </th>
            <th scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Mã Lớp Học
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
        @foreach($usersSubscribed as $userSubscribed)
            <tr onclick="if (!event.target.closest('.no-navigation')) { location.href='{{ route('admin.users-subscribed.edit', $userSubscribed->id) }}' }"
                class="cursor-pointer">
                <td class="py-3 ps-4 no-navigation">
                    <div class="flex items-center h-5">
                        <label>
                            <input type="checkbox" data-id="{{ $userSubscribed->id }}"
                                   class="checkbox-status w-4 h-4 border-gray-200 rounded-lg text-blue-600 focus:ring-blue-500 cursor-pointer">
                        </label>
                        <label class="sr-only">Checkbox</label>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-gray-800">{{ $userSubscribed->user->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $userSubscribed->user->age }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $userSubscribed->classroom->grade }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ truncateString($userSubscribed->classroom->title) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $userSubscribed->classroom->subject()->first()->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ $userSubscribed->classroom->code_classroom }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">{{ \App\Enums\UsersSubscribedStatusEnum::getKeyByValue($userSubscribed->status) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium no-navigation">
                    <button type="button" onclick="location.href='{{ route('admin.users-subscribed.edit', $userSubscribed->id) }}'"
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
    {{ $usersSubscribed->links() }}
</div>

<script>
    function checkAllStatus() {
        const checkboxes = document.querySelectorAll('.checkbox-status');
        const checkAllStatus = document.getElementById('check-all-status');
        checkAllStatus.addEventListener('change', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = checkAllStatus.checked;
            });
        });
    }
</script>
