<?php

namespace App\Filament\Resources\PortfolioItems\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PortfolioItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Portfolio ishi')
                    ->schema([
                        TextInput::make('title')
                            ->label('Nomi')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (?string $state, Set $set) => $set('slug', Str::slug((string) $state))),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('project_type')
                            ->label('Loyiha turi'),
                        Textarea::make('excerpt')
                            ->label('Qisqa tavsif')
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('To\'liq tavsif')
                            ->rows(5)
                            ->columnSpanFull(),
                        FileUpload::make('cover_image')
                            ->label('Asosiy rasm')
                            ->image()
                            ->disk('public')
                            ->directory('portfolio'),
                        FileUpload::make('gallery')
                            ->label('Galereya')
                            ->image()
                            ->multiple()
                            ->disk('public')
                            ->directory('portfolio/gallery')
                            ->columnSpanFull(),
                        Toggle::make('is_featured')
                            ->label('Previewda ko\'rsatilsin')
                            ->default(true),
                        Toggle::make('is_active')
                            ->label('Faol')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->label('Tartib')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ]);
    }
}
