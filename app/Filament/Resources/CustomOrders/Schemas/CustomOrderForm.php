<?php

namespace App\Filament\Resources\CustomOrders\Schemas;

use App\Models\CustomOrder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CustomOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Individual buyurtma')
                    ->schema([
                        TextInput::make('order_number')
                            ->label('Buyurtma raqami')
                            ->required(),
                        TextInput::make('customer_name')
                            ->label('Mijoz')
                            ->required(),
                        TextInput::make('phone')
                            ->label('Telefon')
                            ->required(),
                        TextInput::make('telegram')
                            ->label('Telegram'),
                        TextInput::make('product_name')
                            ->label('Mahsulot nomi')
                            ->required(),
                        TextInput::make('budget')
                            ->label('Byudjet'),
                        TextInput::make('material')
                            ->label('Material'),
                        TextInput::make('size')
                            ->label('O\'lcham'),
                        TextInput::make('color')
                            ->label('Rang'),
                        Select::make('status')
                            ->label('Holati')
                            ->options(CustomOrder::statusOptions())
                            ->native(false)
                            ->default(CustomOrder::STATUS_NEW)
                            ->required(),
                        Textarea::make('description')
                            ->label('Tavsif')
                            ->rows(5)
                            ->columnSpanFull(),
                        Textarea::make('admin_notes')
                            ->label('Admin izohi')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
