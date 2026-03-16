<?php

namespace App\Filament\Resources\Feedback\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeedbackForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Mijoz fikri')
                    ->schema([
                        TextInput::make('customer_name')
                            ->label('Mijoz ismi')
                            ->required(),
                        TextInput::make('phone')
                            ->label('Telefon'),
                        TextInput::make('city')
                            ->label('Shahar'),
                        Select::make('rating')
                            ->label('Baholash')
                            ->options([
                                5 => '5',
                                4 => '4',
                                3 => '3',
                                2 => '2',
                                1 => '1',
                            ])
                            ->required()
                            ->default(5)
                            ->native(false),
                        Textarea::make('content')
                            ->label('Izoh')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                        Toggle::make('is_approved')
                            ->label('Moderatsiyadan o\'tgan')
                            ->default(false),
                        Toggle::make('is_featured')
                            ->label('Asosiy sahifada ko\'rsatilsin')
                            ->default(false),
                        DateTimePicker::make('published_at')
                            ->label('E\'lon qilingan vaqt')
                            ->seconds(false)
                            ->native(false),
                        Textarea::make('admin_notes')
                            ->label('Admin izohi')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
