<x-user.layout.app>
    @section('title', 'Trang Chủ - ' . config('app.name'))
    <!-- banner -->
    <x-user.layout.partials.banner/>
    <!-- end banner -->
    <div class="mt-94 xl:mt-20 xxl:mt-80">
        <div class="flex justify-center items-start  mx-21 mb-2 pb-1">
            <p class="text-blue-600 text-3xl font-medium">Bảng Lương</p>
        </div>
        <div class="flex w-full justify-center px-20 pb-5">
            <div class="container w-full flex justify-center">
                <div class="p-5 border-2 border-gray-200 border-dashed rounded-lg mt-2 w-full">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border rounded-lg shadow overflow-hidden ">
                                    <table class="min-w-full divide-y divide-gray-200 d">
                                        <thead class="bg-gray-50 ">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">Họ và tên</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">Lương tháng</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">Ngày thanh toán</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">Lương</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">Thưởng</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">Tổng</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">Trạng Thái</th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 ">
                                        @foreach($salaries as $salary)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $salary->user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Tháng {{ $salary->created_at->format('m') - 1 }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">{{ $salary->payday }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">{{ $salary->defaultSalary->salary }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">{{ $salary->bonus }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">{{ $salary->bonus + $salary->defaultSalary->salary  }}</td>
                                            @if($salary->status == \App\Enums\SalaryStatusEnum::PENDING)
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 ">Chưa Thanh Toán</td>
                                            @elseif($salary->status == \App\Enums\SalaryStatusEnum::APPROVE)
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-700 ">Đã Thanh Toán</td>
                                            @elseif($salary->status == \App\Enums\SalaryStatusEnum::REJECT)
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 ">Từ Chối</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-user.layout.app>
