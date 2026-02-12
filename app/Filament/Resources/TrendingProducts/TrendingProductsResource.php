<?php

namespace App\Filament\Resources\TrendingProducts;

use App\Filament\Resources\TrendingProducts\Pages\CreateTrendingProducts;
use App\Filament\Resources\TrendingProducts\Pages\EditTrendingProducts;
use App\Filament\Resources\TrendingProducts\Pages\ListTrendingProducts;
use App\Filament\Resources\TrendingProducts\Schemas\TrendingProductsForm;
use App\Filament\Resources\TrendingProducts\Tables\TrendingProductsTable;
use App\Models\TrendingProduct;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TrendingProductsResource extends Resource
{
    protected static ?string $model = TrendingProduct::class;
    protected static string|\UnitEnum|null $navigationGroup = 'Quản trị hệ thống';
    protected static ?string $navigationLabel = 'Sản phẩm trending';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return TrendingProductsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrendingProductsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTrendingProducts::route('/'),
            'create' => CreateTrendingProducts::route('/create'),
            'edit' => EditTrendingProducts::route('/{record}/edit'),
        ];
    }
}
