<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class OrderedProductsTable extends TableWidget
{
    protected static ?string $heading = 'Eng ko\'p buyurtma qilingan mahsulotlar';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Product::query()
                ->with('category')
                ->withSum('orderItems as ordered_quantity', 'quantity')
                ->orderByDesc('ordered_quantity')
                ->orderByDesc('view_count'))
            ->columns([
                TextColumn::make('name')
                    ->label('Mahsulot')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('category.name')
                    ->label('Kategoriya')
                    ->placeholder('-'),
                TextColumn::make('ordered_quantity')
                    ->label('Buyurtma soni')
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Narx')
                    ->formatStateUsing(fn (int $state): string => number_format($state, 0, '.', ' ') . ' so\'m'),
                TextColumn::make('is_featured')
                    ->label('Top')
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Top' : 'Oddiy')
                    ->color(fn (bool $state): string => $state ? 'warning' : 'gray'),
            ])
            ->paginated([5]);
    }
}
