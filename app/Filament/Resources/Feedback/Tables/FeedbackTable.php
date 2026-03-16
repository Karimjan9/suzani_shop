<?php

namespace App\Filament\Resources\Feedback\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class FeedbackTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_name')
                    ->label('Mijoz')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('city')
                    ->label('Shahar')
                    ->placeholder('-'),
                TextColumn::make('rating')
                    ->label('Baholash')
                    ->badge(),
                IconColumn::make('is_approved')
                    ->label('Moderatsiya')
                    ->boolean(),
                IconColumn::make('is_featured')
                    ->label('Asosiy sahifa')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Kelgan vaqt')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_approved')
                    ->label('Moderatsiya'),
                TernaryFilter::make('is_featured')
                    ->label('Asosiy sahifa'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
