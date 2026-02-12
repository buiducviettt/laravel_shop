<?php

namespace App\Filament\Resources\Media\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

class MediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                //
                FileUpload::make('path')
                    ->disk('public')
                    ->directory('media')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->image() // 👈 BẮT BUỘC
                    ->acceptedFileTypes([
                        'image/png',
                        'image/jpeg',
                        'image/webp',
                    ])
                    ->maxSize(4096) // 4MB
                    ->required()
            ]);
    }
}
