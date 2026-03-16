<?php

namespace App\Filament\Resources\PortfolioItems\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PortfolioItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Portfolio')
                    ->schema([
                        ImageEntry::make('cover_image')->label('Asosiy rasm')->disk('public'),
                        TextEntry::make('title')->label('Nomi'),
                        TextEntry::make('project_type')->label('Turi')->placeholder('-'),
                        TextEntry::make('is_featured')->label('Preview')->formatStateUsing(fn (bool $state): string => $state ? 'Ha' : 'Yo\'q'),
                        TextEntry::make('sort_order')->label('Tartib'),
                        TextEntry::make('excerpt')->label('Qisqa tavsif')->placeholder('-')->columnSpanFull(),
                        TextEntry::make('description')->label('To\'liq tavsif')->placeholder('-')->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
