<?php

namespace App\Filament\Resources\Feedback\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeedbackInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Fikr')
                    ->schema([
                        TextEntry::make('customer_name')
                            ->label('Mijoz'),
                        TextEntry::make('phone')
                            ->label('Telefon')
                            ->placeholder('-'),
                        TextEntry::make('city')
                            ->label('Shahar')
                            ->placeholder('-'),
                        TextEntry::make('rating')
                            ->label('Baholash'),
                        TextEntry::make('is_approved')
                            ->label('Moderatsiya')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Tasdiqlangan' : 'Kutilmoqda'),
                        TextEntry::make('is_featured')
                            ->label('Asosiy sahifa')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Ko\'rsatiladi' : 'Yo\'q'),
                        TextEntry::make('content')
                            ->label('Izoh')
                            ->columnSpanFull(),
                        TextEntry::make('admin_notes')
                            ->label('Admin izohi')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
