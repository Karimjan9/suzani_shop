<?php

namespace App\Filament\Resources\CustomOrders;

use App\Filament\Resources\CustomOrders\Pages\CreateCustomOrder;
use App\Filament\Resources\CustomOrders\Pages\EditCustomOrder;
use App\Filament\Resources\CustomOrders\Pages\ListCustomOrders;
use App\Filament\Resources\CustomOrders\Pages\ViewCustomOrder;
use App\Filament\Resources\CustomOrders\Schemas\CustomOrderForm;
use App\Filament\Resources\CustomOrders\Schemas\CustomOrderInfolist;
use App\Filament\Resources\CustomOrders\Tables\CustomOrdersTable;
use App\Models\CustomOrder;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CustomOrderResource extends Resource
{
    protected static ?string $model = CustomOrder::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $navigationLabel = 'Individual buyurtmalar';

    protected static string|\UnitEnum|null $navigationGroup = 'Savdo';

    protected static ?string $modelLabel = 'Individual buyurtma';

    protected static ?string $pluralModelLabel = 'Individual buyurtmalar';

    public static function form(Schema $schema): Schema
    {
        return CustomOrderForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CustomOrderInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomOrdersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomOrders::route('/'),
            'create' => CreateCustomOrder::route('/create'),
            'view' => ViewCustomOrder::route('/{record}'),
            'edit' => EditCustomOrder::route('/{record}/edit'),
        ];
    }
}
