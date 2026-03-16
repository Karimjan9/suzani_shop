<?php

namespace App\Filament\Resources\ContentBlocks\Schemas;

use App\Models\ContentBlock;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContentBlockInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Kontent')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Rasm')
                            ->disk('public'),
                        TextEntry::make('type')
                            ->label('Turi')
                            ->formatStateUsing(fn (string $state): string => ContentBlock::typeOptions()[$state] ?? $state),
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
