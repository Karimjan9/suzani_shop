<?php

namespace App\Filament\Resources\CustomOrders\Schemas;

use App\Models\CustomOrder;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CustomOrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Individual buyurtma')
                    ->schema([
                        TextEntry::make('order_number')->label('Buyurtma raqami'),
                        TextEntry::make('customer_name')->label('Mijoz'),
                        TextEntry::make('phone')->label('Telefon'),
                        TextEntry::make('telegram')->label('Telegram')->placeholder('-'),
                        TextEntry::make('product_name')->label('Mahsulot'),
                        TextEntry::make('status')
                            ->label('Holati')
                            ->formatStateUsing(fn (string $state): string => CustomOrder::statusOptions()[$state] ?? $state),
                        TextEntry::make('budget')->label('Byudjet')->placeholder('-'),
                        TextEntry::make('material')->label('Material')->placeholder('-'),
                        TextEntry::make('size')->label('O\'lcham')->placeholder('-'),
                        TextEntry::make('color')->label('Rang')->placeholder('-'),
                        TextEntry::make('description')->label('Tavsif')->placeholder('-')->columnSpanFull(),
                        TextEntry::make('admin_notes')->label('Admin izohi')->placeholder('-')->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
