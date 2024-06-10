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
        {{ Breadcrumbs::render('admin.subjects.create') }}
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
                        Thông Tin Môn Học
                    </h3>
                </div>
                <form action="{{ route("admin.subject.store") }}" method="post">
                    @csrf
                    <div class="p-6.5">

                        <div class="mb-4.5">
                            <label
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Tên Môn Học <span class="text-meta-1">*</span>
                            </label>
                            <input
                                value="{{ old('name') }}"
                                name="name"
                                type="text"
                                placeholder="Nhập tên môn học"
                                class="{{ $errors->has('name') ? "check-input-error" : "" }} w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />

                            @if($errors->has('name'))
                                <p class="text-red-500 mt-2 text-sm">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <x-user.form.buttons.primary type="submit"
                                                     class="w-full justify-center font-medium p-3 rounded">Tạo Môn Học
                        </x-user.form.buttons.primary>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin.layouts.app>
