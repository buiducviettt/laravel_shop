<?php

namespace App\Filament\Resources\TrendingProducts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;


class TrendingProductsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->relationship('product', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('type')
                    ->options([
                        'tall' => 'Tall',
                        'wide' => 'Wide',
                        'short' => 'Short',
                    ])
                    ->required(),
                TextInput::make('priority')
                    ->numeric()
                    ->required(),
                FileUpload::make('image')
                    ->label('Ảnh')
                    ->disk('public')
                    ->directory('trends/images')
                    ->image()
                    ->imagePreviewHeight('150'),
                //
            ]);
    }
}
