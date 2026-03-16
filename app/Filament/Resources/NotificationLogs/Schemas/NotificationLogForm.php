<?php

namespace App\Filament\Resources\NotificationLogs\Schemas;

use App\Models\NotificationLog;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NotificationLogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Bildirishnoma')
                    ->schema([
                        TextInput::make('title')->label('Sarlavha')->required(),
                        Select::make('channel')
                            ->label('Kanal')
                            ->options(NotificationLog::channelOptions())
                            ->native(false)
                            ->required(),
                        TextInput::make('recipient')->label('Qabul qiluvchi'),
                        Select::make('status')
                            ->label('Holati')
                            ->options(NotificationLog::statusOptions())
                            ->native(false)
                            ->required(),
                        DateTimePicker::make('sent_at')
                            ->label('Yuborilgan vaqt')
                            ->seconds(false)
                            ->native(false),
                        Textarea::make('message')
                            ->label('Xabar')
                            ->rows(5)
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
