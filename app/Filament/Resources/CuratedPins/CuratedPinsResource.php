<?php

namespace App\Filament\Resources\CuratedPins;

use App\Filament\Resources\CuratedPins\Pages\CreateCuratedPins;
use App\Filament\Resources\CuratedPins\Pages\EditCuratedPins;
use App\Filament\Resources\CuratedPins\Pages\ListCuratedPins;
use App\Filament\Resources\CuratedPins\Schemas\CuratedPinsForm;
use App\Filament\Resources\CuratedPins\Tables\CuratedPinsTable;
use App\Models\CuratedPin;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CuratedPinsResource extends Resource
{
    protected static ?string $model  = CuratedPin::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CuratedPins';
    protected static string|\UnitEnum|null $navigationGroup = 'Quản trị hệ thống';

    public static function form(Schema $schema): Schema
    {
        return CuratedPinsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CuratedPinsTable::configure($table);
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
            'index' => ListCuratedPins::route('/'),
            'create' => CreateCuratedPins::route('/create'),
            'edit' => EditCuratedPins::route('/{record}/edit'),
        ];
    }
}
