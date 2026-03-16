<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BannerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Banner')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Rasm')
                            ->disk('public'),
                        TextEntry::make('key')
                            ->label('Kalit'),
                        TextEntry::make('title')
                            ->label('Sarlavha'),
                        TextEntry::make('subtitle')
                            ->label('Qo\'shimcha sarlavha')
                            ->placeholder('-'),
                        TextEntry::make('link')
                            ->label('Havola')
                            ->placeholder('-'),
                        TextEntry::make('sort_order')
                            ->label('Tartib'),
                        TextEntry::make('is_active')
                            ->label('Faol')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Ha' : 'Yo\'q'),
                        TextEntry::make('content')
                            ->label('Matn')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        KeyValueEntry::make('meta')
                            ->label('Qo\'shimcha ma\'lumotlar')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
