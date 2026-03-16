<?php

namespace App\Filament\Resources\Banners\Schemas;

use App\Models\ContentBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Banner')
                    ->schema([
                        Hidden::make('type')
                            ->default(ContentBlock::TYPE_BANNER)
                            ->required(),
                        TextInput::make('key')
                            ->label('Kalit')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('title')
                            ->label('Sarlavha')
                            ->required(),
                        TextInput::make('subtitle')
                            ->label('Qo\'shimcha sarlavha'),
                        Textarea::make('content')
                            ->label('Matn')
                            ->rows(5)
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->label('Banner rasmi')
                            ->image()
                            ->disk('public')
                            ->directory('content-blocks/banners'),
                        TextInput::make('link')
                            ->label('Tugma yoki havola'),
                        KeyValue::make('meta')
                            ->label('Qo\'shimcha ma\'lumotlar')
                            ->keyLabel('Kalit')
                            ->valueLabel('Qiymat')
                            ->columnSpanFull(),
                        TextInput::make('sort_order')
                            ->label('Tartib')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_active')
                            ->label('Faol')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
