<div class="space-y-6" wire:poll.45s>
    <section class="grid gap-4 xl:grid-cols-4">
        @foreach ($statCards as $card)
            <article class="admin-surface p-5">
                <p class="text-xs uppercase tracking-[0.32em] text-amber-200/60">{{ $card['label'] }}</p>
                <p class="mt-4 font-serif text-4xl leading-none text-amber-50">{{ $card['value'] }}</p>
                <p class="mt-3 text-sm text-stone-300">{{ $card['hint'] }}</p>
            </article>
        @endforeach
    </section>

    <section class="grid gap-6 xl:grid-cols-[1.25fr_0.75fr]">
        <article class="admin-surface overflow-hidden p-6">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="text-xs uppercase tracking-[0.32em] text-amber-200/60">Highlights</p>
                    <h2 class="mt-2 font-serif text-3xl text-amber-50">Atelier pulse</h2>
                </div>
                <div class="swiper-pagination !static !w-auto"></div>
            </div>

            <div class="swiper mt-6" data-admin-swiper>
                <div class="swiper-wrapper">
                    @foreach ($insights as $insight)
                        <div class="swiper-slide">
                            <div class="h-full rounded-[1.75rem] border border-white/10 bg-white/5 p-5">
                                <p class="text-xs uppercase tracking-[0.32em] text-amber-200/60">{{ $insight['title'] }}</p>
                                <p class="mt-4 font-serif text-3xl leading-none text-amber-50">{{ $insight['metric'] }}</p>
                                <p class="mt-4 text-sm leading-7 text-stone-300">{{ $insight['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>

        <article class="admin-surface p-6">
            <p class="text-xs uppercase tracking-[0.32em] text-amber-200/60">Buyurtma pipeline</p>
            <h2 class="mt-2 font-serif text-3xl text-amber-50">Holatlar</h2>

            <div class="mt-6 space-y-4">
                @foreach ($orderStatuses as $status)
                    <div>
                        <div class="flex items-center justify-between text-sm text-stone-300">
                            <span>{{ $status['label'] }}</span>
                            <span>{{ $status['count'] }}</span>
                        </div>
                        <div class="mt-2 h-2 rounded-full bg-white/10">
                            <div
                                class="h-2 rounded-full bg-gradient-to-r from-amber-300 via-amber-200 to-orange-300"
                                style="width: {{ min(100, max(10, $status['count'] * 12)) }}%"
                            ></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </section>

    <section class="grid gap-6 2xl:grid-cols-[1.1fr_0.9fr]">
        <article class="admin-surface overflow-hidden p-0">
            <div class="flex items-center justify-between border-b border-white/10 px-6 py-5">
                <div>
                    <p class="text-xs uppercase tracking-[0.32em] text-amber-200/60">Yangi oqim</p>
                    <h2 class="mt-2 font-serif text-3xl text-amber-50">So‘nggi buyurtmalar</h2>
                </div>
                <a href="{{ route('admin.resources.index', ['resource' => 'orders'], false) }}" class="btn btn-ghost btn-sm rounded-full text-amber-100">Hammasi</a>
            </div>

            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Raqam</th>
                            <th>Mijoz</th>
                            <th>Holat</th>
                            <th>Summa</th>
                            <th>Sana</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentOrders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>
                                    <span class="admin-badge">{{ \App\Models\Order::statusOptions()[$order->status] ?? $order->status }}</span>
                                </td>
                                <td>{{ number_format((float) $order->total_amount, 0, '.', ' ') }} so‘m</td>
                                <td>{{ $order->created_at?->format('d.m.Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </article>

        <div class="space-y-6">
            <article class="admin-surface p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-[0.32em] text-amber-200/60">Vitrina</p>
                        <h2 class="mt-2 font-serif text-3xl text-amber-50">Ko‘p ko‘rilgan mahsulotlar</h2>
                    </div>
                    <a href="{{ route('admin.resources.index', ['resource' => 'products'], false) }}" class="btn btn-ghost btn-sm rounded-full text-amber-100">Katalog</a>
                </div>

                <div class="mt-6 space-y-4">
                    @foreach ($topProducts as $product)
                        <div class="rounded-[1.5rem] border border-white/10 bg-white/5 p-4">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="font-medium text-amber-50">{{ $product->name }}</p>
                                    <p class="mt-1 text-sm text-stone-300">{{ number_format((float) $product->price, 0, '.', ' ') }} so‘m</p>
                                </div>
                                <span class="admin-badge">{{ $product->view_count }} view</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>

            <article class="admin-surface p-6">
                <div>
                    <p class="text-xs uppercase tracking-[0.32em] text-amber-200/60">Maxsus buyurtmalar</p>
                    <h2 class="mt-2 font-serif text-3xl text-amber-50">Custom order stream</h2>
                </div>

                <div class="mt-6 space-y-4">
                    @foreach ($customOrders as $customOrder)
                        <a href="{{ route('admin.resources.edit', ['resource' => 'custom-orders', 'record' => $customOrder->id], false) }}" class="block rounded-[1.5rem] border border-white/10 bg-white/5 p-4 transition hover:border-amber-200/30 hover:bg-white/10">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="font-medium text-amber-50">{{ $customOrder->order_number ?? ('#'.$customOrder->id) }}</p>
                                    <p class="mt-1 text-sm text-stone-300">{{ $customOrder->customer_name }}</p>
                                </div>
                                <span class="admin-badge">{{ \App\Models\CustomOrder::statusOptions()[$customOrder->status] ?? $customOrder->status }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </article>
        </div>
    </section>
</div>
