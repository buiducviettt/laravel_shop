<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Filament\Resources\Pages\Schemas\Components\HeroSection;
use App\Filament\Resources\Pages\Schemas\Components\HomeSchema;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use App\Models\Media;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return HomeSchema::configure($schema);
    }
}
