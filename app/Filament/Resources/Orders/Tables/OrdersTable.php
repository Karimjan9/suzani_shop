<?php

namespace App\Filament\Resources\Orders\Tables;

use App\Models\Order;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')
                    ->label('Buyurtma')
                    ->searchable()
                    ->copyable()
                    ->weight('bold'),
                TextColumn::make('customer_name')
                    ->label('Mijoz')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Telefon')
                    ->searchable(),
                TextColumn::make('total_items')
                    ->label('Soni')
                    ->badge(),
                TextColumn::make('total_amount')
                    ->label('Jami summa')
                    ->formatStateUsing(fn (int $state): string => number_format($state, 0, '.', ' ') . ' so\'m'),
                TextColumn::make('status')
                    ->label('Holati')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => Order::statusOptions()[$state] ?? $state)
                    ->color(fn (string $state): string => match ($state) {
                        Order::STATUS_NEW => 'warning',
                        Order::STATUS_CALLED => 'info',
                        Order::STATUS_CONFIRMED => 'primary',
                        Order::STATUS_PREPARING => 'warning',
                        Order::STATUS_SHIPPED => 'gray',
                        Order::STATUS_DELIVERED => 'success',
                        Order::STATUS_CANCELLED => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('shipping_status')
                    ->label('Yuborish holati')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => Order::shippingStatusOptions()[$state] ?? $state)
                    ->color(fn (string $state): string => match ($state) {
                        Order::SHIPPING_PENDING => 'gray',
                        Order::SHIPPING_PACKING => 'warning',
                        Order::SHIPPING_SENT => 'info',
                        Order::SHIPPING_DELIVERED => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label('Kelgan vaqt')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Holati')
                    ->options(Order::statusOptions()),
                SelectFilter::make('shipping_status')
                    ->label('Yuborish holati')
                    ->options(Order::shippingStatusOptions()),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
