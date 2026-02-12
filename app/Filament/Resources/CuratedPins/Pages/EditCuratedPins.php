<?php

namespace App\Filament\Resources\CuratedPins\Pages;

use App\Filament\Resources\CuratedPins\CuratedPinsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCuratedPins extends EditRecord
{
    protected static string $resource = CuratedPinsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
