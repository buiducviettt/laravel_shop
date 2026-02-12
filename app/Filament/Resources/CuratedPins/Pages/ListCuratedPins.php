<?php

namespace App\Filament\Resources\CuratedPins\Pages;

use App\Filament\Resources\CuratedPins\CuratedPinsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCuratedPins extends ListRecords
{
    protected static string $resource = CuratedPinsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
