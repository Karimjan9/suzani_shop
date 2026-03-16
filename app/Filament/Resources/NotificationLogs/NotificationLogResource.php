<?php

namespace App\Filament\Resources\NotificationLogs;

use App\Filament\Resources\NotificationLogs\Pages\CreateNotificationLog;
use App\Filament\Resources\NotificationLogs\Pages\EditNotificationLog;
use App\Filament\Resources\NotificationLogs\Pages\ListNotificationLogs;
use App\Filament\Resources\NotificationLogs\Pages\ViewNotificationLog;
use App\Filament\Resources\NotificationLogs\Schemas\NotificationLogForm;
use App\Filament\Resources\NotificationLogs\Schemas\NotificationLogInfolist;
use App\Filament\Resources\NotificationLogs\Tables\NotificationLogsTable;
use App\Models\NotificationLog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NotificationLogResource extends Resource
{
    protected static ?string $model = NotificationLog::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBell;

    protected static ?string $navigationLabel = 'Bildirishnomalar';

    protected static string|\UnitEnum|null $navigationGroup = 'Tizim';

    protected static ?string $modelLabel = 'Bildirishnoma';

    protected static ?string $pluralModelLabel = 'Bildirishnomalar';

    public static function form(Schema $schema): Schema
    {
        return NotificationLogForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return NotificationLogInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NotificationLogsTable::configure($table);
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
            'index' => ListNotificationLogs::route('/'),
            'create' => CreateNotificationLog::route('/create'),
            'view' => ViewNotificationLog::route('/{record}'),
            'edit' => EditNotificationLog::route('/{record}/edit'),
        ];
    }
}
