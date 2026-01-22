<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
    Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
    Tables\Columns\TextColumn::make('name')->label('Tên sản phẩm')->searchable(),
    Tables\Columns\TextColumn::make('description')->label('Mô tả')->limit(50),
    Tables\Columns\TextColumn::make('base_price')->label('Giá bán')->money('VND'),
    Tables\Columns\ImageColumn::make('mainImage.image_url')
        ->label('Ảnh')
        ->disk('public')
        ->square(),

    Tables\Columns\TextColumn::make('created_at')->dateTime(),
    Tables\Columns\TextColumn::make('updated_at')->dateTime(),
])

            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
            
    }
}
