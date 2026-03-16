<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Asosiy ma\'lumotlar')
                    ->schema([
                        Select::make('category_id')
                            ->label('Kategoriya')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload(),
                        TextInput::make('name')
                            ->label('Nomi')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (?string $state, Set $set) => $set('slug', Str::slug((string) $state))),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('sku')
                            ->label('SKU')
                            ->unique(ignoreRecord: true),
                        Textarea::make('short_description')
                            ->label('Qisqa tavsif')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('full_description')
                            ->label('To\'liq tavsif')
                            ->rows(6)
                            ->columnSpanFull(),
                        Textarea::make('product_story')
                            ->label('Mahsulot tarixi')
                            ->rows(5)
                            ->helperText('Bu mahsulotning kelib chiqishi, ilhomi yoki ustaxona hikoyasini yozing.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Narx va stok')
                    ->schema([
                        TextInput::make('price')
                            ->label('Narx')
                            ->numeric()
                            ->required()
                            ->default(0)
                            ->suffix('so\'m'),
                        TextInput::make('old_price')
                            ->label('Eski narx')
                            ->numeric()
                            ->suffix('so\'m'),
                        Select::make('availability_mode')
                            ->label('Mavjud / buyurtma asosida')
                            ->options(Product::availabilityOptions())
                            ->required()
                            ->native(false)
                            ->default(Product::AVAILABILITY_AVAILABLE),
                        TextInput::make('stock_quantity')
                            ->label('Stok soni')
                            ->numeric()
                            ->default(0),
                        Select::make('stock_status')
                            ->label('Stok holati')
                            ->options(Product::stockOptions())
                            ->required()
                            ->native(false)
                            ->default(Product::STOCK_IN),
                        TextInput::make('production_time')
                            ->label('Tayyorlash vaqti')
                            ->required(),
                        Toggle::make('custom_order_available')
                            ->label('Individual buyurtma mumkin')
                            ->default(false),
                        Toggle::make('delivery_available')
                            ->label('Yetkazib berish bor')
                            ->default(true),
                        Toggle::make('is_active')
                            ->label('Faol')
                            ->default(true),
                        Toggle::make('is_featured')
                            ->label('Featured / top')
                            ->default(false),
                        TextInput::make('view_count')
                            ->label('Ko\'rilganlar soni')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(4),
                Section::make('Mahsulot tavsilotlari')
                    ->schema([
                        TextInput::make('material')
                            ->label('Material')
                            ->required(),
                        TextInput::make('size')
                            ->label('O\'lcham')
                            ->required(),
                        TextInput::make('color')
                            ->label('Rang')
                            ->required(),
                        Textarea::make('craftsmanship_method')
                            ->label('Ishlash usuli')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
                Section::make('Rasmlar')
                    ->schema([
                        FileUpload::make('main_image')
                            ->label('Asosiy rasm')
                            ->image()
                            ->required()
                            ->disk('public')
                            ->directory('products'),
                        FileUpload::make('gallery')
                            ->label('Qo\'shimcha rasmlar')
                            ->image()
                            ->multiple()
                            ->minFiles(3)
                            ->maxFiles(6)
                            ->reorderable()
                            ->required()
                            ->disk('public')
                            ->directory('products/gallery')
                            ->helperText('Mahsulot uchun kamida 3 ta, ko\'pi bilan 6 ta qo\'shimcha rasm yuklang.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
