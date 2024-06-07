@unless ($breadcrumbs->isEmpty())
    <ol aria-label="Breadcrumb" class="flex items-center whitespace-nowrap min-w-0 gap-2">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="text-base">
                    <a href="{{ $breadcrumb->url }}"
                       class="flex items-center gap-2 align-middle transition-all leading-none hover:text-secondary">
{{--                        <i class="w-4 h-4" data-lucide="{{ $breadcrumb->icon }}"></i>--}}
                        {{ $breadcrumb->title }}
                    </a>
                </li>
            @else
                <li class="text-base font-semibold truncate leading-none ">{{ $breadcrumb->title }}</li>
            @endif

            @unless($loop->last)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                @endif

        @endforeach
    </ol>
@endunless
