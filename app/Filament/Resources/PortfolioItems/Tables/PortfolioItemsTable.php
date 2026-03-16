<?php

namespace App\Filament\Resources\PortfolioItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PortfolioItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')->label('Rasm')->disk('public')->square(),
                TextColumn::make('title')->label('Nomi')->searchable()->weight('bold'),
                TextColumn::make('project_type')->label('Turi')->placeholder('-'),
                IconColumn::make('is_featured')->label('Preview')->boolean(),
                IconColumn::make('is_active')->label('Faol')->boolean(),
                TextColumn::make('sort_order')->label('Tartib')->sortable(),
            ])
            ->filters([
                //
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
