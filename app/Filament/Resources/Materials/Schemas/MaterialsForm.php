<?php

namespace App\Filament\Resources\Materials\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class MaterialsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //cho edit tên chất liệu 
                Forms\Components\TextInput::make('name')->label('Name')->required(),

            ]);
    }
}
