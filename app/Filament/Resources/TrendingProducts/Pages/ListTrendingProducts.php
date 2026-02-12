<?php

namespace App\Filament\Resources\TrendingProducts\Pages;

use App\Filament\Resources\TrendingProducts\TrendingProductsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTrendingProducts extends ListRecords
{
    protected static string $resource = TrendingProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
