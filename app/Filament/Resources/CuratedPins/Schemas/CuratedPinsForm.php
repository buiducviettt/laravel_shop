<?php

namespace App\Filament\Resources\CuratedPins\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms;

class CuratedPinsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Forms\Components\TextInput::make('title'),
                //image
                Forms\Components\FileUpload::make('image')
                    ->disk('public')
                    ->directory('media')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->image()
                    ->acceptedFileTypes([
                        'image/png',
                        'image/jpeg',
                        'image/webp',
                    ])
                    ->maxSize(4096)
                    ->required(),
            ]);
    }
}
