<?php

namespace App\Filament\Resources\CustomOrders\Tables;

use App\Models\CustomOrder;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CustomOrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')->label('Buyurtma')->searchable()->weight('bold'),
                TextColumn::make('customer_name')->label('Mijoz')->searchable(),
                TextColumn::make('product_name')->label('Mahsulot')->searchable(),
                TextColumn::make('phone')->label('Telefon'),
                TextColumn::make('status')
                    ->label('Holati')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => CustomOrder::statusOptions()[$state] ?? $state),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Holati')
                    ->options(CustomOrder::statusOptions()),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
