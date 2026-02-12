<?php

namespace App\Filament\Resources\Pages\Schemas\Components;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\Collection;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
//use curatedpin


class HomeSchema
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            HeroSection::make(),
            Section::make('Trending')
                ->schema([
                    Repeater::make('content.trending')
                        ->label('Danh sách Trending (chỉ chọn Collection)')
                        ->schema([
                            Select::make('collection_id')
                                ->label('Chọn Collection')
                                ->options(
                                    Collection::query()
                                        ->pluck('name', 'id')
                                        ->toArray()
                                )
                                ->searchable()
                                ->required(),
                        ])
                        ->orderable()
                        ->collapsed()
                        ->addActionLabel('Thêm Collection'),

                ]),
            //section moodboard 
            Section::make('Moodboard')
                ->schema([
                    Repeater::make('content.moodboard')
                        ->label('Danh sách Moodboard')
                        ->schema([
                            TextInput::make('title')
                                ->label('Tên mood')
                                ->required(),
                            FileUpload::make('image')
                                ->label('Hình ảnh')
                                ->image()
                                ->disk('public')
                                ->directory('moodboard')
                                ->required(),
                        ])
                        ->orderable()
                        ->collapsed()
                        ->addActionLabel('Thêm Moodboard'),
                ]),
            CuratedPinsSection::make(),
            //section about us 
            Section::make('About Us')
                ->schema([
                    Textarea::make('content.about_us.description')
                        ->label('Mota')
                        ->required(),
                    FileUpload::make('content.about_us.image')
                        ->label('Hình ảnh')
                        ->image()
                        ->disk('public')
                        ->directory('about_us')
                        ->required(),
                ])
        ]);
    }
}
