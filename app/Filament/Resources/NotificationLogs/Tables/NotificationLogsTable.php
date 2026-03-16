<?php

namespace App\Filament\Resources\NotificationLogs\Tables;

use App\Models\NotificationLog;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class NotificationLogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Sarlavha')->searchable()->weight('bold'),
                TextColumn::make('channel')
                    ->label('Kanal')
                    ->formatStateUsing(fn (string $state): string => NotificationLog::channelOptions()[$state] ?? $state),
                TextColumn::make('status')
                    ->label('Holati')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => NotificationLog::statusOptions()[$state] ?? $state),
                TextColumn::make('recipient')->label('Qabul qiluvchi')->placeholder('-'),
                TextColumn::make('sent_at')->label('Yuborilgan')->dateTime('d.m.Y H:i')->placeholder('-'),
            ])
            ->filters([
                SelectFilter::make('channel')->label('Kanal')->options(NotificationLog::channelOptions()),
                SelectFilter::make('status')->label('Holati')->options(NotificationLog::statusOptions()),
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
