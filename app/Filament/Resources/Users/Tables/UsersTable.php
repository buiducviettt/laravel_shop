<?php

namespace App\Filament\Resources\Users\Tables;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables;
class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
            Tables\Columns\TextColumn::make('first_name')->label('Họ')->searchable(),
            Tables\Columns\TextColumn::make('last_name')->label('Tên')->searchable(),
            Tables\Columns\TextColumn::make('email')->searchable(),
            Tables\Columns\TextColumn::make('phone')->searchable(),
            Tables\Columns\IconColumn::make('is_admin')
                ->label('Admin')
                ->boolean(),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
        ])
        ->actions([
            EditAction::make(),
            DeleteBulkAction::make(),      
        ]);
    }
}
