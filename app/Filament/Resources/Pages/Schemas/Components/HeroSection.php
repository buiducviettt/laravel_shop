<?php

namespace App\Filament\Resources\Pages\Schemas\Components;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;

class HeroSection
{
    public static function make(): Section
    {
        return Section::make('Banner')
            ->schema([
                TextInput::make('content.hero.title')
                    ->label('Tiêu đề banner')
                    ->required(),

                Repeater::make('content.hero.subtitle')
                    ->default([])
                    ->schema([
                        TextInput::make('text')
                            ->label('Subtitle')
                            ->required(),
                    ]),

                FileUpload::make('content.hero.image')
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
