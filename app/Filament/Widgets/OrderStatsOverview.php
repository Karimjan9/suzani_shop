<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jami buyurtmalar', (string) Order::query()->count())
                ->description('Tizimdagi barcha buyurtmalar')
                ->color('primary'),
            Stat::make('Yangi buyurtmalar', (string) Order::query()->where('status', Order::STATUS_NEW)->count())
                ->description('Hali ishlov berilmagan')
                ->color('warning'),
            Stat::make('Tasdiqlangan', (string) Order::query()->where('status', Order::STATUS_CONFIRMED)->count())
                ->description('Tasdiqlanib ishlab chiqarishga o\'tganlar')
                ->color('info'),
            Stat::make('Yuborilgan', (string) Order::query()->where('status', Order::STATUS_SHIPPED)->count())
                ->description('Mijozga jo\'natilgan buyurtmalar')
                ->color('success'),
            Stat::make('Bekor qilingan', (string) Order::query()->where('status', Order::STATUS_CANCELLED)->count())
                ->description('Turli sabablar bilan yopilganlar')
                ->color('danger'),
        ];
    }
}
