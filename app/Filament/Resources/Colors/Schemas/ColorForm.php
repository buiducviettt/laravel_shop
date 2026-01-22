<?php

namespace App\Filament\Resources\Colors\Schemas;
use Filament\Schemas\Schema;
use Filament\Forms;
class ColorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //Sửa tên 
                Forms\Components\TextInput::make('name')
                ->label('Tên')
                ->required(),
                //sửa màu
                Forms\Components\ColorPicker::make('code')
             ->label('Màu')
             ->required(),              
            ]);
    }
}
