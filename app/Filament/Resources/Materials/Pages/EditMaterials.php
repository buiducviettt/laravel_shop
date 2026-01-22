<?php

namespace App\Filament\Resources\Materials\Pages;

use App\Filament\Resources\Materials\MaterialsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMaterials extends EditRecord
{
    protected static string $resource = MaterialsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
