<?php

namespace App\Filament\Resources\Sizes\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
class SizeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                ->label('Size')
                ->required(),
                //
            ]);
    }
}
