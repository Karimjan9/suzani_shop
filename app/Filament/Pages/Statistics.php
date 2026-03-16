<?php

namespace App\Filament\Pages;

use App\Models\Category;
use App\Models\ContentBlock;
use App\Models\CustomOrder;
use App\Models\Customer;
use App\Models\Feedback;
use App\Models\NotificationLog;
use App\Models\Order;
use App\Models\PortfolioItem;
use App\Models\Product;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class Statistics extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBarSquare;

    protected static string|\UnitEnum|null $navigationGroup = 'Tizim';

    protected static ?string $navigationLabel = 'Statistika';

    protected static ?string $title = 'Statistika';

    protected string $view = 'filament.pages.statistics';

    public array $stats = [];

    public function mount(): void
    {
        $this->stats = [
            [
                'label' => 'Jami buyurtmalar',
                'value' => Order::query()->count(),
                'hint' => 'Saytdan kelgan umumiy buyurtmalar soni',
            ],
            [
                'label' => 'Yangi individual buyurtmalar',
                'value' => CustomOrder::query()->where('status', CustomOrder::STATUS_NEW)->count(),
                'hint' => 'Hunarmandga mos custom so\'rovlar',
            ],
            [
                'label' => 'Faol mahsulotlar',
                'value' => Product::query()->where('is_active', true)->count(),
                'hint' => 'Katalogda ko\'rinayotgan mahsulotlar',
            ],
            [
                'label' => 'Portfolio ishlari',
                'value' => PortfolioItem::query()->where('is_active', true)->count(),
                'hint' => 'Galereyada ko\'rinadigan real ishlar',
            ],
            [
                'label' => 'Mijozlar bazasi',
                'value' => Customer::query()->count(),
                'hint' => 'Buyurtma bergan yoki murojaat qoldirgan mijozlar',
            ],
            [
                'label' => 'Moderatsiyadagi fikrlar',
                'value' => Feedback::query()->where('is_approved', false)->count(),
                'hint' => 'Tasdiqlanishi kutilayotgan reviewlar',
            ],
        ];
    }

    public function getViewData(): array
    {
        $popularProduct = Product::query()->orderByDesc('view_count')->first();
        $largestCategory = Category::query()->withCount('products')->orderByDesc('products_count')->first();

        return [
            'stats' => $this->stats,
            'highlights' => [
                [
                    'label' => 'Top ko\'rilgan mahsulot',
                    'value' => $popularProduct?->name ?? 'Hali yo\'q',
                    'meta' => $popularProduct ? ($popularProduct->view_count . ' ta ko\'rish') : 'Mahsulotlar qo\'shilgach ko\'rinadi',
                ],
                [
                    'label' => 'Eng faol kategoriya',
                    'value' => $largestCategory?->name ?? 'Hali yo\'q',
                    'meta' => $largestCategory ? ($largestCategory->products_count . ' ta mahsulot') : 'Kategoriyalar to\'ldirilgach ko\'rinadi',
                ],
                [
                    'label' => 'Bannerlar',
                    'value' => (string) ContentBlock::query()->where('type', ContentBlock::TYPE_BANNER)->count(),
                    'meta' => 'Bosh sahifa va promo bannerlar soni',
                ],
                [
                    'label' => 'Bildirishnomalar',
                    'value' => (string) NotificationLog::query()->count(),
                    'meta' => 'Yuborilgan yoki draft xabarlar soni',
                ],
            ],
            'orderStatuses' => collect(Order::statusOptions())
                ->map(fn (string $label, string $status): array => [
                    'label' => $label,
                    'value' => Order::query()->where('status', $status)->count(),
                ])
                ->values()
                ->all(),
        ];
    }
}
