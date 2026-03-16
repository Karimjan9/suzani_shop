<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Buyurtma ma\'lumotlari')
                    ->schema([
                        TextEntry::make('order_number')
                            ->label('Buyurtma raqami'),
                        TextEntry::make('status')
                            ->label('Holati')
                            ->formatStateUsing(fn (string $state): string => \App\Models\Order::statusOptions()[$state] ?? $state),
                        TextEntry::make('shipping_status')
                            ->label('Yuborish holati')
                            ->formatStateUsing(fn (string $state): string => \App\Models\Order::shippingStatusOptions()[$state] ?? $state),
                        TextEntry::make('total_items')
                            ->label('Jami mahsulot soni'),
                        TextEntry::make('total_amount')
                            ->label('Jami summa')
                            ->formatStateUsing(fn (int $state): string => number_format($state, 0, '.', ' ') . ' so\'m'),
                        TextEntry::make('created_at')
                            ->label('Kelgan vaqt')
                            ->dateTime('d.m.Y H:i'),
                        TextEntry::make('admin_contacted_at')
                            ->label('Aloqaga chiqilgan vaqt')
                            ->placeholder('Hali bog\'lanilmagan')
                            ->dateTime('d.m.Y H:i'),
                    ])
                    ->columns(3),
                Section::make('Mijoz')
                    ->schema([
                        TextEntry::make('customer_name')
                            ->label('Ism'),
                        TextEntry::make('phone')
                            ->label('Telefon'),
                        TextEntry::make('customer.phone')
                            ->label('Mijoz kartasi telefoni')
                            ->placeholder('-'),
                        TextEntry::make('telegram')
                            ->label('Telegram')
                            ->placeholder('-'),
                        TextEntry::make('instagram')
                            ->label('Instagram')
                            ->placeholder('-'),
                        TextEntry::make('address')
                            ->label('Manzil')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('notes')
                            ->label('Izoh')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('admin_notes')
                            ->label('Admin izohi')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Buyurtma ichidagi mahsulotlar')
                    ->schema([
                        RepeatableEntry::make('items')
                            ->label('')
                            ->schema([
                                TextEntry::make('product_title')
                                    ->label('Mahsulot'),
                                TextEntry::make('category_label')
                                    ->label('Kategoriya')
                                    ->placeholder('-'),
                                TextEntry::make('quantity')
                                    ->label('Soni'),
                                TextEntry::make('unit_price')
                                    ->label('Narxi')
                                    ->formatStateUsing(fn (int $state): string => number_format($state, 0, '.', ' ') . ' so\'m'),
                                TextEntry::make('total_price')
                                    ->label('Jami')
                                    ->formatStateUsing(fn (int $state): string => number_format($state, 0, '.', ' ') . ' so\'m'),
                                TextEntry::make('lead_time')
                                    ->label('Tayyorlash muddati')
                                    ->placeholder('-'),
                                TextEntry::make('material')
                                    ->label('Material')
                                    ->placeholder('-'),
                                TextEntry::make('size')
                                    ->label('O\'lcham')
                                    ->placeholder('-'),
                                TextEntry::make('color')
                                    ->label('Rang')
                                    ->placeholder('-'),
                                TextEntry::make('availability')
                                    ->label('Mavjudligi')
                                    ->placeholder('-'),
                                TextEntry::make('short_description')
                                    ->label('Qisqa tavsif')
                                    ->placeholder('-')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),
                    ]),
            ]);
    }
}
