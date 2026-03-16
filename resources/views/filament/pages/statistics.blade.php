<x-filament-panels::page>
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($stats as $stat)
            <section class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-white/5">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $stat['label'] }}</p>
                <p class="mt-3 text-3xl font-semibold text-gray-950 dark:text-white">{{ $stat['value'] }}</p>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $stat['hint'] }}</p>
            </section>
        @endforeach
    </div>

    <div class="mt-6 grid gap-6 xl:grid-cols-[1.3fr_0.9fr]">
        <section class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-white/5">
            <div class="mb-5">
                <h3 class="text-lg font-semibold text-gray-950 dark:text-white">Buyurtma statuslari</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Admin paneldagi jarayon holatlari bo'yicha taqsimot.</p>
            </div>

            <div class="grid gap-3 sm:grid-cols-2">
                @foreach ($orderStatuses as $status)
                    <div class="rounded-xl border border-amber-100 bg-amber-50/70 px-4 py-3 dark:border-white/10 dark:bg-white/5">
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $status['label'] }}</p>
                        <p class="mt-2 text-2xl font-semibold text-gray-950 dark:text-white">{{ $status['value'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-white/5">
            <div class="mb-5">
                <h3 class="text-lg font-semibold text-gray-950 dark:text-white">Qisqa insightlar</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kontent va savdo bo'limlarining tezkor ko'rinishi.</p>
            </div>

            <div class="space-y-3">
                @foreach ($highlights as $highlight)
                    <div class="rounded-xl border border-gray-200 px-4 py-3 dark:border-white/10">
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $highlight['label'] }}</p>
                        <p class="mt-2 text-lg font-semibold text-gray-950 dark:text-white">{{ $highlight['value'] }}</p>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $highlight['meta'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-filament-panels::page>
