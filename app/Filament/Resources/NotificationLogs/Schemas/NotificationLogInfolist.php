<?php

namespace App\Filament\Resources\NotificationLogs\Schemas;

use App\Models\NotificationLog;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NotificationLogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Bildirishnoma')
                    ->schema([
                        TextEntry::make('title')->label('Sarlavha'),
                        TextEntry::make('channel')
                            ->label('Kanal')
                            ->formatStateUsing(fn (string $state): string => NotificationLog::channelOptions()[$state] ?? $state),
                        TextEntry::make('status')
                            ->label('Holati')
                            ->formatStateUsing(fn (string $state): string => NotificationLog::statusOptions()[$state] ?? $state),
                        TextEntry::make('recipient')->label('Qabul qiluvchi')->placeholder('-'),
                        TextEntry::make('sent_at')->label('Yuborilgan')->dateTime('d.m.Y H:i')->placeholder('-'),
                        TextEntry::make('message')->label('Xabar')->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
