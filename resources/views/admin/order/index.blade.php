<x-admin.layouts.app>
    @push("styles")
        <style>
            input {
                outline: none;
            }
        </style>
    @endpush
    @section('title', $title)
    @section('title-content', $contentTitle)
    @section('breadcrumbs')
        {{ Breadcrumbs::render('admin.orders') }}
    @endsection
    <div class="mb-3">
        <div class="mb-3 grid sm:grid-cols-2 gap-x-10">
            <select name="per_page"
                    class="w-full border-solid border-[0.5px] py-3 px-4 pe-9 block border-gray-200 rounded-lg text-sm focus:border-secondary-500 focus:ring-secondary-500 disabled:opacity-50 disabled:pointer-events-none">
                <option selected="" value="15">Số dòng hiển thị</option>
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <select name="status"
                    class="mt-3 sm:mt-0 border-solid border-[0.5px] py-3 px-4 pe-9 block border-gray-200 rounded-lg text-sm focus:border-secondary-500 focus:ring-secondary-500 disabled:opacity-50 disabled:pointer-events-none">
                <option {{ !request()->has("status") ?: "selected" }} value="-1">Tình Trạng</option>
                <option value="-1">Tất Cả</option>
                @foreach(\App\Enums\OrderStatusEnum::getArrayView() as $key => $value)
                    <option
                        {{ request("status") === $value ? "selected" : "" }} value="{{ $value }}">{{ $key }}</option>
                @endforeach
            </select>
        </div>

        <p class="mb-3 text-lg font-medium text-black">Tìm Kiếm Theo : </p>
        <div class="grid sm:grid-cols-4 gap-4">
            <label for="filter_code_order"
                   class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                <input type="radio" name="type" id="filter_code_order" value="0"
                       {{ request('type', 0) == 3 ? 'checked' : '' }}
                       class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                >
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Tên Người Dùng</span>
            </label>
            <label for="filter_code_order"
                   class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                <input type="radio" name="type" id="filter_user" value="0"
                       {{ request('type', 0) == 0 ? 'checked' : '' }}
                       class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                >
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Tên Người Dùng</span>
            </label>
            <label for="filter_title"
                   class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                <input type="radio" name="type" value="1" {{ request('type', 0) == 1 ? 'checked' : '' }}
                class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                       id="filter_title">
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Tiêu Đề Lớp Học</span>
            </label>
            <label for="filter_code"
                   class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                <input type="radio" name="type" value="2" {{ request('type', 0) == 2 ? 'checked' : '' }}
                class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                       id="filter_code">
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Mã Lớp Học</span>
            </label>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg divide-y divide-gray-200">
                    <div class="py-3 px-4">
                        <div class="relative">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" name="search"
                                   id="search" value="{{ request('search') }}"
                                   class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                   placeholder="Tìm kiếm tên người dùng">
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24"
                                     height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div id="table">
                        {!! $tableHtml !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            let page = 1;

            function fetchData(page = 1) {
                console.log(document.getElementById('search').value)
                axios.get('{{ route('admin.orders.table') }}', {
                    params: {
                        per_page: document.getElementsByName('per_page')[0].value,
                        page: page,
                        status: document.getElementsByName('status')[0].value,
                        type: document.querySelector('input[name="type"]:checked').value,
                        search: document.getElementById('search').value
                    }
                })
                    .then(response => {
                        document.getElementById('table').innerHTML = response.data.html;
                    })
                    .catch(error => console.error('Error fetching user data:', error));
            }

            document.getElementsByName('per_page')[0].addEventListener('change', function (e) {
                fetchData();
            });

            const status = document.getElementsByName("status")[0];
            status.addEventListener('change', function (e) {
                fetchData();
            });

            document.getElementsByName('filter_type').forEach(function (element) {
                element.addEventListener('change', function (e) {
                    fetchData();
                });
            });

            document.getElementById('search').addEventListener('input', function (e) {
                let timeoutId;

                clearTimeout(timeoutId);

                timeoutId = setTimeout(fetchData, 500);
            });

            document.addEventListener('DOMContentLoaded', () => {
                document.getElementById('pagination').addEventListener('click', function (e) {
                    if (e.target.tagName === 'A') {
                        e.preventDefault();
                        page = new URL(e.target.href).searchParams.get('page');
                        fetchData(page);
                    }
                });
            })

            const table = document.getElementById('table');
            const observer = new MutationObserver(function (mutationsList, observer) {
                console.log('Table changed');
                document.getElementById('pagination').addEventListener('click', function (e) {
                    if (e.target.tagName === 'A') {
                        e.preventDefault();
                        page = new URL(e.target.href).searchParams.get('page');
                        fetchData(page);
                    }
                });
            });

            observer.observe(table, {childList: true, subtree: true});
        </script>
    @endpush
</x-admin.layouts.app>
