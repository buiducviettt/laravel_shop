<?php

namespace App\Filament\Resources\Colors;

use App\Filament\Resources\Colors\Pages\CreateColor;
use App\Filament\Resources\Colors\Pages\EditColor;
use App\Filament\Resources\Colors\Pages\ListColors;
use App\Filament\Resources\Colors\Schemas\ColorForm;
use App\Filament\Resources\Colors\Tables\ColorsTable;
use App\Models\Colors;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ColorResource extends Resource
{
    protected static ?string $model = Colors::class;
    //group vào nhóm thuộc tính sản phẩm 
     protected static string|\UnitEnum|null $navigationGroup = 'Thuộc tính sản phẩm';
     protected static ?string $navigationLabel = 'Màu sắc';
    protected static ?int $navigationSort = 1;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'name'; // lấy name trong DB 

    public static function form(Schema $schema): Schema
    {
        return ColorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ColorsTable::configure($table);
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
            'index' => ListColors::route('/'),
            'create' => CreateColor::route('/create'),
            'edit' => EditColor::route('/{record}/edit'),
        ];
    }
}
