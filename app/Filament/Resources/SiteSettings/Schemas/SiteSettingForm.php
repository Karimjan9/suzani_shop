<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use App\Models\SiteSetting;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Sozlama')
                    ->schema([
                        TextInput::make('group')->label('Guruh')->required(),
                        TextInput::make('key')->label('Kalit')->required()->unique(ignoreRecord: true),
                        TextInput::make('label')->label('Nomi')->required(),
                        Select::make('type')
                            ->label('Turi')
                            ->options(SiteSetting::typeOptions())
                            ->native(false)
                            ->required(),
                        Textarea::make('value')
                            ->label('Qiymat')
                            ->rows(5)
                            ->columnSpanFull(),
                        Toggle::make('is_public')
                            ->label('Frontendda ishlatilsin')
                            ->default(false),
                    ])
                    ->columns(2),
            ]);
    }
}
