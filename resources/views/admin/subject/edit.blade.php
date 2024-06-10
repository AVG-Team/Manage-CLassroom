<x-admin.layouts.app>
    @push("styles")
        <style>
            input {
                outline: none;
            }

            .check-input-error {
                border-color: red;
            }
        </style>
    @endpush
    @section('title', $title)
    @section('title-content', $contentTitle)
    @section('breadcrumbs')
        {{ Breadcrumbs::render('admin.subject.edit', $subject->id) }}
    @endsection
    <div>
        <div class="flex flex-col gap-9">
            <!-- Contact Form -->
            <div
                class="rounded-xl border border-stroke bg-white shadow-default"
            >
                <div
                    class="border-b border-stroke px-6.5 py-4"
                >
                    <h3 class="font-medium text-black">
                        Thông Tin Lương Cơ Bản
                    </h3>
                </div>
                <form action="{{ route("admin.subject.update", $subject) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="p-6.5">
                        <div class="mb-4.5">

                            <label for="name" class="block text-sm font-medium mb-2 dark:text-white">Môn Học</label>
                            <div class="relative">
                                <input type="text" id="name" name="name" value="{{ old('salary') ?: $subject->name }}"
                                       class="border-solid border py-3 pl-13.5 px-4 ps-9 pe-16 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                       placeholder="0.00">
                                <div
                                    class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4 ">
                                        <span class="text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"/>
                                            </svg>
                                        </span>
                                </div>
                                <div
                                    class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                                    <span class="text-gray-500 dark:text-neutral-500">VNĐ</span>
                                </div>
                            </div>

                            @if($errors->has('name'))
                                <p class="text-red-500 mt-2 text-sm">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <x-user.form.buttons.primary type="submit"
                                                     class="w-full justify-center font-medium p-3 rounded">Tạo Lương Cơ Bản
                        </x-user.form.buttons.primary>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin.layouts.app>
