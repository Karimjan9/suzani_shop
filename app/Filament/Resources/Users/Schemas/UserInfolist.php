<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Admin')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Ism'),
                        TextEntry::make('login')
                            ->label('Login'),
                        TextEntry::make('email')
                            ->label('Email'),
                        TextEntry::make('role_name')
                            ->label('Rol')
                            ->state(fn (User $record): string => $record->roles->pluck('name')->join(', ') ?: 'admin'),
                    ])
                    ->columns(2),
            ]);
    }
}
