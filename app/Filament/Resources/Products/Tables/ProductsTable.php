<?php

namespace App\Filament\Resources\Products\Tables;

use App\Models\Product;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('main_image')
                    ->label('Rasm')
                    ->disk('public')
                    ->square(),
                TextColumn::make('name')
                    ->label('Nomi')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('category.name')
                    ->label('Kategoriya')
                    ->placeholder('-')
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Narx')
                    ->sortable()
                    ->formatStateUsing(fn (int $state): string => number_format($state, 0, '.', ' ') . ' so\'m'),
                TextColumn::make('old_price')
                    ->label('Eski narx')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->formatStateUsing(fn (?int $state): string => $state ? number_format($state, 0, '.', ' ') . ' so\'m' : '-'),
                TextColumn::make('availability_mode')
                    ->label('Mavjudligi')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => Product::availabilityOptions()[$state] ?? $state)
                    ->color(fn (string $state): string => match ($state) {
                        Product::AVAILABILITY_AVAILABLE => 'success',
                        Product::AVAILABILITY_MADE_TO_ORDER => 'warning',
                        default => 'gray',
                    }),
                TextColumn::make('stock_status')
                    ->label('Stok')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => Product::stockOptions()[$state] ?? $state)
                    ->color(fn (string $state): string => match ($state) {
                        Product::STOCK_IN => 'success',
                        Product::STOCK_LOW => 'warning',
                        Product::STOCK_OUT => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('stock_quantity')
                    ->label('Qoldiq')
                    ->sortable(),
                TextColumn::make('view_count')
                    ->label('Ko\'rilgan')
                    ->sortable(),
                IconColumn::make('custom_order_available')
                    ->label('Individual buyurtma')
                    ->boolean(),
                IconColumn::make('delivery_available')
                    ->label('Yetkazib berish')
                    ->boolean(),
                IconColumn::make('is_featured')
                    ->label('Top')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->label('Faol')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Kategoriya')
                    ->relationship('category', 'name'),
                SelectFilter::make('stock_status')
                    ->label('Stok holati')
                    ->options(Product::stockOptions()),
                SelectFilter::make('availability_mode')
                    ->label('Mavjudligi')
                    ->options(Product::availabilityOptions()),
                TernaryFilter::make('custom_order_available')
                    ->label('Individual buyurtma'),
                TernaryFilter::make('delivery_available')
                    ->label('Yetkazib berish'),
                TernaryFilter::make('is_active')
                    ->label('Faol'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
