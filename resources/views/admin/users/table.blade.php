<div class="overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tên
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tuổi
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Địa Chỉ
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Số Điện
                Thoại
            </th>
            <th scope="col"
                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Chức Vụ
            </th>
            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                Hành Động
            </th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($users as $user)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $user->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $user->age }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $user->address }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $user->phone }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $user->keyRole }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <button type="button" onclick="location.href='{{ route('admin.users.edit', $user->uuid) }}'"
                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none mr-3">
                        Edit
                    </button>
                    <button type="button" data-id="{{ $user->uuid }}"
                            class="btn-delete inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="py-1 px-4">
    {{ $users->links() }}
</div>
