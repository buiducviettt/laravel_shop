<?php

namespace App\Filament\Resources\Categories\Schemas;
use Filament\Forms;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                ->label('Tên danh mục')
                 ->required()
                ->live(onBlur: true)
    ->afterStateUpdated(function (string $state, callable $set) {
        $set('slug', Str::slug($state));
    }),
                Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->unique(ignoreRecord: true)
                ->helperText('Tự động tạo từ tên danh mục, có thề chỉnh sửa'),
                //
                //thay hình ảnh 
             Forms\Components\FileUpload::make('image')
                ->label('Hiển thị')
                ->image()
                ->disk('public')
                ->directory('categories')
                ->required(),
            ]);
    }
}
