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
        {{ Breadcrumbs::render('admin.orders.edit', $order->id) }}
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
                        Thông Tin Hoá Đơn
                    </h3>
                </div>
                <form action="{{ route("admin.orders.update", $order) }}" method="post">
                    @csrf
                    <div class="p-6.5">

                        <div class="mb-4.5">
                            <label for="name"
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Tên Học Viên <span class="text-meta-1">*</span>
                            </label>
                            <input id="name"
                                value="{{ $order->user()->first()->name }}"
                                disabled
                                class="bg-gray-200 w-full rounded border-[1.5px] border-stroke px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />
                        </div>

                        <div class="mb-4.5">
                            <label for="email"
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Email Học Viên <span class="text-meta-1">*</span>
                            </label>
                            <input id="email"
                                value="{{ $order->user()->first()->email }}"
                                disabled
                                class="bg-gray-200 w-full rounded border-[1.5px] border-stroke px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />
                        </div>

                        <div class="mb-4.5">
                            <label for="phone"
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Số Điện Thoại Học Viên <span class="text-meta-1">*</span>
                            </label>
                            <input id="phone"
                                value="{{ $order->user()->first()->phone }}"
                                disabled
                                class="bg-gray-200 w-full rounded border-[1.5px] border-stroke px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />
                        </div>

                        <div class="mb-4.5">
                            <label for="title"
                                class="mb-3 block text-sm font-medium text-black"
                            >
                                Tiêu Đề Lớp Học <span class="text-meta-1">*</span>
                            </label>
                            <input id="title"
                                value="{{ $order->classroom()->first()->title }}"
                                disabled
                                class="bg-gray-200 w-full rounded border-[1.5px] border-stroke px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />
                        </div>

                        <div class="mb-4.5">
                            <label for="code_order"
                                   class="mb-3 block text-sm font-medium text-black"
                            >
                                Mã Đơn Hàng <span class="text-meta-1">*</span>
                            </label>
                            <input id="code_order"
                                   value="{{ $order->code_order }}"
                                   disabled
                                   class="bg-gray-200 w-full rounded border-[1.5px] border-stroke px-5 py-3 font-normal text-black outline-none transition focus:border-secondary active:border-secondary disabled:cursor-default disabled:bg-whiter"
                            />
                        </div>

                        <div class="mb-4.5">
                            <label for="note"
                                   class="mb-3 block text-sm font-medium text-black"
                            >
                                Chú Thích Đơn <span class="text-meta-1">*</span>
                            </label>
                            <textarea id="note" name="note"
                                      class="{{ $errors->has('note') ? "check-input-error" : "" }} py-3 px-4 block w-full border-solid border border-gray-200 rounded-lg text-sm focus:border-secondary focus:ring-secondary focus:outline-secondary disabled:pointer-events-none"
                                      rows="3" placeholder="Nhập Chú Thích Hoá Đơn"
                            >{{ old('note') ?: $order?->note }}</textarea>

                            @if($errors->has('note'))
                                <p class="text-red-500 mt-2 text-sm">{{ $errors->first('note') }}</p>
                            @endif
                        </div>

                        <div class="mb-4.5">
                            <div>
                                <label for="status" class="mb-3 block text-sm font-medium text-black">
                                    Tính Trạng Đơn <span class="text-meta-1">*</span>
                                </label>

                                <div
                                    class="relative z-20 bg-white"
                                >
                                    <select
                                        name="status" id="status"
                                        class="{{ $errors->has('status') ? "check-input-error" : "" }} relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-secondary active:border-secondary"
                                    >
                                        @foreach(\App\Enums\OrderStatusEnum::getArrayView() as $key => $value)
                                            <option value="{{ $value }}"
                                                    class="text-body" {{ ( old('status') ?: $order->status ) == $value ? "selected" : "" }}>{{ $key }}</option>
                                        @endforeach
                                    </select>
                                    <span
                                        class="absolute right-4 top-1/2 z-10 -translate-y-1/2"
                                    >
                                          <svg
                                              width="24"
                                              height="24"
                                              viewBox="0 0 24 24"
                                              fill="none"
                                              xmlns="http://www.w3.org/2000/svg"
                                          >
                                            <g opacity="0.8">
                                              <path
                                                  fill-rule="evenodd"
                                                  clip-rule="evenodd"
                                                  d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                  fill="#637381"
                                              ></path>
                                            </g>
                                          </svg>
                                        </span>
                                </div>
                                @if($errors->has('status'))
                                    <p class="text-red-500 mt-2 text-sm">{{ $errors->first('status') }}</p>
                                @endif
                            </div>
                        </div>

                        <div>
                            <x-user.form.buttons.primary type="submit"
                                                         class="w-full justify-center font-medium p-3 rounded">Sửa Đơn Hàng
                            </x-user.form.buttons.primary>

                            <x-user.form.buttons.danger type="button"
                                                        onclick="deleteOrder()"
                                                        class="w-full justify-center font-medium p-3 rounded mt-5">Xoá Đơn Hàng
                            </x-user.form.buttons.danger>

                                <script>
                                    function deleteOrder() {
                                        if (confirm("Khi Xoá Đơn Hàng, Cũng Sẽ Tự Xoá Học Viên Khỏi Danh Sách Đăng Kí ?")) {
                                            if(confirm("Bạn Chắc Chắn Muốn Xoá Đơn Hàng ?"))
                                            {
                                                window.location.href = "{{ route('admin.orders.delete', $order) }}";
                                            }
                                        }
                                    }
                                </script>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin.layouts.app>
