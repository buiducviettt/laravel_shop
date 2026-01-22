<?php

namespace App\Filament\Resources\Users\Schemas;
use Filament\Forms;
use Filament\Schemas\Schema;


class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('first_name')
                    ->label('Họ')
                    ->required(),
                Forms\Components\TextInput::make('last_name')
                    ->label('Tên')
                    ->required(),      
                     // phân quyền 
                Forms\Components\Toggle::make('is_admin')
                    ->label('Admin')
                    ->default(false),                      
            ]);
    }
}
