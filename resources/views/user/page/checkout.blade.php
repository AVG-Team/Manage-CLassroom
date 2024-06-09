<x-user.layout.app>
    @section('title', 'Trang Chủ - ' . config('app.name'))
    <!-- banner -->
    <x-user.layout.partials.banner/>
    <!-- end banner -->

    @if(auth()->user())
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <h2 class="text-xl font-semibold text-blue-600 sm:text-2xl">Thanh Toán</h2>

                <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12">
                    <form action="{{ route('checkout.success') }}" method="POST"
                          class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6 lg:max-w-xl lg:p-8">
                        @csrf
                        <div class="mb-6 grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="full_name"
                                       class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Họ và tên </label>
                                <input type="text" id="full_name"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 "
                                       placeholder="Nguyễn Văn A" value="{{ $user->name }}" readonly/>
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="classroom-name"
                                       class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Tên lớp học </label>
                                <input type="text" id="classroom-name"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 "
                                       placeholder="Toán 12" value="{{ $classroom->title }}" readonly/>
                            </div>


                            <div class="col-span-2 sm:col-span-1">
                                <label for="teacher-name"
                                       class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Giáo viên </label>
                                <input type="text" id="teacher-name"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 "
                                       placeholder="Nguyễn Văn A" value="{{ $classroom->teacher->name }}" readonly/>
                            </div>


                            <div class="col-span-2 sm:col-span-1">
                                <label for="code_classroom"
                                       class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Mã lớp học </label>
                                <input type="text" id="code_classroom"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 "
                                       placeholder="BMESLGKZ1D" value="{{ $classroom->code_classroom }}" readonly/>
                            </div>


                            <div class="col-span-4 sm:col-span-1">
                                <label for="note"
                                       class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Ghi chú </label>
                                <input type="text" id="note"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 "
                                       placeholder="Duyệt giúp tôi" />
                            </div>

                        </div>

                        <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="price" value="{{ $classroom->price }}">
                        <input type="hidden" name="status" value="0">

                        <button type="submit"
                                class="flex w-full items-center justify-center rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-primary-300 ">
                            Thanh toán
                        </button>
                    </form>

                    <div class="mt-6 grow sm:mt-8 lg:mt-0">
                        <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6 ">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 ">Giá khoá học</dt>
                                    <dd class="text-base font-medium text-green-600">{{ $classroom->price }} VND</dd>
                                </dl>
                            </div>

                            <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 ">
                                <dt class="text-base font-bold text-gray-900 ">Tổng</dt>
                                <dd class="text-base font-bold text-green-600 ">{{ $classroom->price }} VND</dd>
                            </dl>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

</x-user.layout.app>
