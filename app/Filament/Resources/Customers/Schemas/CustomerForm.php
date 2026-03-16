<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Mijoz')
                    ->schema([
                        TextInput::make('name')
                            ->label('Ism')
                            ->required(),
                        TextInput::make('phone')
                            ->label('Telefon')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('telegram')
                            ->label('Telegram'),
                        TextInput::make('instagram')
                            ->label('Instagram'),
                        Textarea::make('notes')
                            ->label('Izoh')
                            ->rows(5)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
