<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Product;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Mahsulot')
                    ->schema([
                        ImageEntry::make('main_image')
                            ->label('Asosiy rasm')
                            ->disk('public'),
                        TextEntry::make('name')
                            ->label('Nomi'),
                        TextEntry::make('category.name')
                            ->label('Kategoriya')
                            ->placeholder('-'),
                        TextEntry::make('sku')
                            ->label('SKU')
                            ->placeholder('-'),
                        TextEntry::make('price')
                            ->label('Narx')
                            ->formatStateUsing(fn (int $state): string => number_format($state, 0, '.', ' ') . ' so\'m'),
                        TextEntry::make('old_price')
                            ->label('Eski narx')
                            ->placeholder('-')
                            ->formatStateUsing(fn (?int $state): string => $state ? number_format($state, 0, '.', ' ') . ' so\'m' : '-'),
                        TextEntry::make('availability_mode')
                            ->label('Mavjudligi')
                            ->formatStateUsing(fn (string $state): string => Product::availabilityOptions()[$state] ?? $state),
                        TextEntry::make('stock_status')
                            ->label('Stok')
                            ->formatStateUsing(fn (string $state): string => Product::stockOptions()[$state] ?? $state),
                        TextEntry::make('stock_quantity')
                            ->label('Soni'),
                        TextEntry::make('view_count')
                            ->label('Ko\'rilgan'),
                        TextEntry::make('material')
                            ->label('Material')
                            ->placeholder('-'),
                        TextEntry::make('size')
                            ->label('O\'lcham')
                            ->placeholder('-'),
                        TextEntry::make('color')
                            ->label('Rang')
                            ->placeholder('-'),
                        TextEntry::make('craftsmanship_method')
                            ->label('Ishlash usuli')
                            ->placeholder('-'),
                        TextEntry::make('production_time')
                            ->label('Tayyorlash vaqti')
                            ->placeholder('-'),
                        TextEntry::make('custom_order_available')
                            ->label('Individual buyurtma')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Ha' : 'Yo\'q'),
                        TextEntry::make('delivery_available')
                            ->label('Yetkazib berish')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Bor' : 'Yo\'q'),
                        TextEntry::make('is_featured')
                            ->label('Featured / top')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Ha' : 'Yo\'q'),
                        TextEntry::make('gallery_count')
                            ->label('Qo\'shimcha rasmlar soni')
                            ->state(fn (Product $record): int => count($record->gallery ?? [])),
                        TextEntry::make('short_description')
                            ->label('Qisqa tavsif')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('full_description')
                            ->label('To\'liq tavsif')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('product_story')
                            ->label('Mahsulot tarixi')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
            ]);
    }
}
