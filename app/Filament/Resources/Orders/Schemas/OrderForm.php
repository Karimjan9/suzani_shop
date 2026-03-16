<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Models\Order;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Buyurtma holati')
                    ->schema([
                        TextInput::make('order_number')
                            ->label('Buyurtma raqami')
                            ->disabled()
                            ->dehydrated(false),
                        Select::make('status')
                            ->label('Holati')
                            ->options(Order::statusOptions())
                            ->required()
                            ->native(false),
                        Select::make('shipping_status')
                            ->label('Yuborish holati')
                            ->options(Order::shippingStatusOptions())
                            ->required()
                            ->native(false),
                        DateTimePicker::make('admin_contacted_at')
                            ->label('Admin aloqaga chiqqan vaqt')
                            ->seconds(false)
                            ->native(false),
                    ])
                    ->columns(4),
                Section::make('Mijoz ma\'lumotlari')
                    ->schema([
                        TextInput::make('customer_name')
                            ->label('Mijoz ismi')
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('customer.phone')
                            ->label('Mijoz kartasi telefoni')
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('phone')
                            ->label('Telefon')
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('telegram')
                            ->label('Telegram')
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('instagram')
                            ->label('Instagram')
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('address')
                            ->label('Manzil')
                            ->columnSpanFull()
                            ->disabled()
                            ->dehydrated(false),
                        Textarea::make('notes')
                            ->label('Mijoz izohi')
                            ->rows(4)
                            ->columnSpanFull()
                            ->disabled()
                            ->dehydrated(false),
                    ])
                    ->columns(2),
                Section::make('Admin izohi')
                    ->schema([
                        Textarea::make('admin_notes')
                            ->label('Ichki izoh')
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
