<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Models\Category;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Kategoriya ma\'lumotlari')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nomi'),
                        TextEntry::make('slug')
                            ->label('Slug'),
                        TextEntry::make('is_active')
                            ->label('Holati')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Faol' : 'Nofaol'),
                        TextEntry::make('sort_order')
                            ->label('Tartib'),
                        TextEntry::make('description')
                            ->label('Tavsif')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('products_count')
                            ->label('Mahsulotlar soni')
                            ->state(fn (Category $record): int => $record->products()->count()),
                    ])
                    ->columns(2),
            ]);
    }
}
