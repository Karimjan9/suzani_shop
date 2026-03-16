<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SiteSettingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Sozlama')
                    ->schema([
                        TextEntry::make('group')->label('Guruh'),
                        TextEntry::make('key')->label('Kalit'),
                        TextEntry::make('label')->label('Nomi'),
                        TextEntry::make('type')->label('Turi'),
                        TextEntry::make('is_public')->label('Public')->formatStateUsing(fn (bool $state): string => $state ? 'Ha' : 'Yo\'q'),
                        TextEntry::make('value')->label('Qiymat')->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
