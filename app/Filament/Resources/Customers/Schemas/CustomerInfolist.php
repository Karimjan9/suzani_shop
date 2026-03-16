<?php

namespace App\Filament\Resources\Customers\Schemas;

use App\Models\Customer;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CustomerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Mijoz ma\'lumotlari')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Ism'),
                        TextEntry::make('phone')
                            ->label('Telefon'),
                        TextEntry::make('telegram')
                            ->label('Telegram')
                            ->placeholder('-'),
                        TextEntry::make('instagram')
                            ->label('Instagram')
                            ->placeholder('-'),
                        TextEntry::make('orders_count')
                            ->label('Buyurtmalar soni')
                            ->state(fn (Customer $record): int => $record->orders()->count()),
                        TextEntry::make('notes')
                            ->label('Izoh')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Buyurtmalar tarixi')
                    ->schema([
                        RepeatableEntry::make('orders')
                            ->label('')
                            ->schema([
                                TextEntry::make('order_number')
                                    ->label('Buyurtma raqami'),
                                TextEntry::make('status')
                                    ->label('Holati')
                                    ->formatStateUsing(fn (string $state): string => \App\Models\Order::statusOptions()[$state] ?? $state),
                                TextEntry::make('total_amount')
                                    ->label('Jami')
                                    ->formatStateUsing(fn (int $state): string => number_format($state, 0, '.', ' ') . ' so\'m'),
                                TextEntry::make('created_at')
                                    ->label('Sana')
                                    ->dateTime('d.m.Y H:i'),
                            ])
                            ->columns(2),
                    ]),
            ]);
    }
}
