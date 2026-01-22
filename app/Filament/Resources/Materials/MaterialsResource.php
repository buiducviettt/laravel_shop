<?php

namespace App\Filament\Resources\Materials;

use App\Filament\Resources\Materials\Pages\CreateMaterials;
use App\Filament\Resources\Materials\Pages\EditMaterials;
use App\Filament\Resources\Materials\Pages\ListMaterials;
use App\Filament\Resources\Materials\Schemas\MaterialsForm;
use App\Filament\Resources\Materials\Tables\MaterialsTable;
use App\Models\Materials;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MaterialsResource extends Resource
{
    protected static ?string $model = Materials::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Materials';

    public static function form(Schema $schema): Schema
    {
        return MaterialsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MaterialsTable::configure($table);
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
            'index' => ListMaterials::route('/'),
            'create' => CreateMaterials::route('/create'),
            'edit' => EditMaterials::route('/{record}/edit'),
        ];
    }
}
