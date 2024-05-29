<x-user.layout.app>
<section class="relative max-w-full my-24 overflow-hidden shadow bg-partner sm:mx-6 sm:rounded-2xl">
      <div class="flex flex-col items-center justify-center w-full px-6 py-16 space-y-4 text-center sm:px-0">
        <h3 data-aos="flip-down" class="text-2xl font-semibold text-neutral-800">Trusted Partners Worldwide</h3>
        <p data-aos="flip-down" class="paragraph">We're partners with countless major organisations around the globe</p>
        <div data-aos="fade-up" class="flex flex-wrap items-center justify-center">
        @foreach (['clever.png', 'diamon-cutts.png', 'swiss-finance.png', 'gambio.png'] as $img)
            <x-user.layout.landing.partner :img="$img" />
        @endforeach
        </div>
      </div>
    </section>
</x-user.layout.app>