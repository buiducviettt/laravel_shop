<?php

namespace App\Filament\Resources\TrendingProducts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\View\TablesIconAlias;

class TrendingProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                // ✅ type: dùng badge đẹp hơn text
                Tables\Columns\TextColumn::make('type')
                    ->label('Loại hình ảnh')
                    ->badge()
                    ->sortable()
                    ->colors([
                        'success' => 'tall',
                        'warning' => 'wide',
                        'info'    => 'short',
                    ]),
                Tables\Columns\TextColumn::make('priority')
                    ->label('Ưu tiên')
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('product.name')
                    ->label('Trending Product')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->label('Hình ảnh')
                    ->square()
                    ->height(60),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Cập nhật')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
