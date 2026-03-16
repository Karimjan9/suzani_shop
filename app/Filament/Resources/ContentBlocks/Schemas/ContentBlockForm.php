<?php

namespace App\Filament\Resources\ContentBlocks\Schemas;

use App\Models\ContentBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContentBlockForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Kontent bloki')
                    ->schema([
                        Select::make('type')
                            ->label('Turi')
                            ->options(ContentBlock::typeOptions())
                            ->helperText('Bosh sahifa matnlari, about, kontaktlar, ijtimoiy tarmoqlar va footer ma\'lumotlarini shu yerdan boshqaring.')
                            ->native(false)
                            ->required(),
                        TextInput::make('key')
                            ->label('Kalit')
                            ->helperText('Masalan: hero_title, about_text, contact_phone, instagram_link, footer_note')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('title')
                            ->label('Sarlavha')
                            ->required(),
                        TextInput::make('subtitle')
                            ->label('Qo\'shimcha sarlavha'),
                        Textarea::make('content')
                            ->label('Matn')
                            ->rows(6)
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->label('Rasm')
                            ->image()
                            ->disk('public')
                            ->directory('content-blocks'),
                        TextInput::make('link')
                            ->label('Havola'),
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
