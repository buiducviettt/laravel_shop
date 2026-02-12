<?php

namespace App\Filament\Resources\Pages\Schemas\Components;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use App\Models\CuratedPin;

class CuratedPinsSection
{
    public static function make(): Section
    {
        return Section::make('Curated Pins (Homepage)')
            ->schema([
                Repeater::make('content.curated_pins')
                    ->label('Chọn Curated Pins hiển thị')
                    ->schema([
                        Select::make('curated_pin_id')
                            ->label('Curated Pin')
                            ->options(
                                CuratedPin::query()
                                    ->pluck('title', 'id')
                                    ->toArray()
                            )
                            ->searchable()
                            ->required(),
                    ])
                    ->orderable()
                    ->collapsed()
                    ->addActionLabel('Thêm Pin'),
            ]);
    }
}
