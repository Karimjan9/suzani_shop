<?php

namespace App\Livewire\Admin;

use App\Models\Customer;
use App\Models\CustomOrder;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class DashboardOverview extends Component
{
    public function render()
    {
        $monthlyRevenue = Order::query()
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_amount');

        $orderStatuses = collect(Order::statusOptions())
            ->map(fn (string $label, string $status): array => [
                'label' => $label,
                'count' => Order::query()->where('status', $status)->count(),
            ])
            ->values();

        $insights = [
            [
                'title' => 'Bugungi ritm',
                'description' => 'Yangi buyurtmalar va qayta aloqalar real vaqtga yaqin oqimda nazoratda turadi.',
                'metric' => Order::query()->whereDate('created_at', today())->count().' ta',
            ],
            [
                'title' => 'Katalog drayveri',
                'description' => 'Faol mahsulotlar vitrinasini toza holatda ushlash savdo oqimini ushlab turadi.',
                'metric' => Product::query()->where('is_active', true)->count().' ta',
            ],
            [
                'title' => 'Mijoz ishonchi',
                'description' => 'Tasdiqlanmagan sharh va ko‘rib chiqilayotgan custom orderlar shu yerdan ko‘rinadi.',
                'metric' => Feedback::query()->where('is_approved', false)->count().' / '.CustomOrder::query()->where('status', CustomOrder::STATUS_REVIEWING)->count(),
            ],
        ];

        return view('livewire.admin.dashboard-overview', [
            'statCards' => [
                [
                    'label' => 'Oylik tushum',
                    'value' => number_format((float) $monthlyRevenue, 0, '.', ' ').' so‘m',
                    'hint' => 'Joriy oy bo‘yicha',
                ],
                [
                    'label' => 'Yangi buyurtmalar',
                    'value' => Order::query()->where('status', Order::STATUS_NEW)->count(),
                    'hint' => 'Darhol ko‘rib chiqish kerak',
                ],
                [
                    'label' => 'Mijozlar bazasi',
                    'value' => Customer::query()->count(),
                    'hint' => 'Kontaktda saqlanganlar',
                ],
                [
                    'label' => 'Faol katalog',
                    'value' => Product::query()->where('is_active', true)->count(),
                    'hint' => 'Vitrinadagi mahsulotlar',
                ],
            ],
            'orderStatuses' => $orderStatuses,
            'recentOrders' => Order::query()
                ->latest()
                ->take(6)
                ->get(['id', 'order_number', 'customer_name', 'status', 'total_amount', 'created_at']),
            'topProducts' => Product::query()
                ->orderByDesc('view_count')
                ->take(5)
                ->get(['id', 'name', 'view_count', 'price', 'is_featured']),
            'customOrders' => CustomOrder::query()
                ->latest()
                ->take(5)
                ->get(['id', 'order_number', 'customer_name', 'status', 'budget']),
            'insights' => $insights,
        ]);
    }
}
