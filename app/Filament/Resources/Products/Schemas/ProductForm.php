<?php

namespace App\Filament\Resources\Products\Schemas;
use Filament\Forms\Components\Select;
use Filament\Forms;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('category_id')
    ->label('Danh mục sản phẩm')
    ->relationship('category', 'name')
    ->required(),
            Forms\Components\TextInput::make('name')
                ->label('Tên sản phẩm')
                 ->required()
                ->live(onBlur: true)
    ->afterStateUpdated(function (string $state, callable $set) {
        $set('slug', Str::slug($state));
    }),
    //chọn collection cho product
  Select::make('collection_id')
    ->label('Collection')
    ->relationship('collection', 'name')
    ->searchable()
    ->preload()
    ->nullable(),
               Forms\Components\TextInput::make('slug')
                ->label('Slug')
                    ->required()
    ->unique(ignoreRecord: true)
    ->helperText('Tự động tạo từ tên sản phẩm, có thể chỉnh sửa'),

            Forms\Components\Textarea::make('description')
                ->label('Mô tả')
                ->rows(5),

            Forms\Components\TextInput::make('base_price')
                ->label('Giá bán')
                ->numeric()
                ->required(),

            // ✅ Ảnh sản phẩm lưu vào product_images
            Forms\Components\Repeater::make('images')
                ->label('Hình ảnh sản phẩm')
                ->relationship('images')
                ->schema([
                    //thêm category cho products 
                    
                    Forms\Components\FileUpload::make('image_url')
                        ->label('Ảnh')
                        ->disk('public')
                        ->directory('products/gallery')
                        ->image()
                        ->imagePreviewHeight('150'),
                    Forms\Components\Toggle::make('is_main')
                        ->label('Ảnh chính')
                        ->default(false),

                    Forms\Components\TextInput::make('sort_order')
                        ->label('Thứ tự')
                        ->numeric()
                        ->default(0),
                ])
                ->columns(3)
                ->reorderable('sort_order')
                ->addActionLabel('Thêm ảnh')
                ->defaultItems(0)
                ->collapsible(),
        ]);
    }
}
