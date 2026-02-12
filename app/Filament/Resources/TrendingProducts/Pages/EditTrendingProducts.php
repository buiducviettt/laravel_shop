<?php

namespace App\Filament\Resources\TrendingProducts\Pages;

use App\Filament\Resources\TrendingProducts\TrendingProductsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTrendingProducts extends EditRecord
{
    protected static string $resource = TrendingProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
