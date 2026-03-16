<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class PopularProductsTable extends TableWidget
{
    protected static ?string $heading = 'Eng ko\'p ko\'rilgan mahsulotlar';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Product::query()->with('category')->orderByDesc('view_count'))
            ->columns([
                TextColumn::make('name')
                    ->label('Mahsulot')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('category.name')
                    ->label('Kategoriya')
                    ->placeholder('-'),
                TextColumn::make('view_count')
                    ->label('Ko\'rilgan')
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Narx')
                    ->formatStateUsing(fn (int $state): string => number_format($state, 0, '.', ' ') . ' so\'m'),
                TextColumn::make('stock_status')
                    ->label('Stok')
                    ->formatStateUsing(fn (string $state): string => Product::stockOptions()[$state] ?? $state),
            ])
            ->recordActions([
            ])
            ->paginated([5]);
    }
}
