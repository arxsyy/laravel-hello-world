<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Checkbox;
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    // STEP 1 – Product Info
                    Step::make('Product Info')
                        ->description('Isi Informasi Produk')
                        ->icon(Heroicon::OutlinedDocument)
                        ->schema([
                            Group::make([
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('sku')
                                    ->required(),
                            ])->columns(2),
                            MarkdownEditor::make('description')
                                ->columnSpanFull(),
                        ]),

                    // STEP 2 – Pricing & Stock
                    Step::make('Product Price and Stock')
                        ->description('Isi Harga Produk')
                        ->icon(Heroicon::OutlinedCurrencyDollar)
                        ->schema([
                            Group::make([
                                TextInput::make('price')
                                    ->numeric()
                                    ->required()
                                    ->gt(0)
                                    ->validationMessages([
                                        'gt' => 'Harga harus lebih besar dari 0',
                                    ]),
                                TextInput::make('stock')
                                    ->numeric()
                                    ->required(),
                            ])->columns(2),
                        ]),

                    // STEP 3 – Media & Status
                    Step::make('Media and status')
                        ->description('Isi Gambar Produk')
                        ->icon(Heroicon::OutlinedPhoto)
                        ->schema([
                            FileUpload::make('image')
                                ->disk('public')
                                ->directory('products'),
                            Checkbox::make('is_active'),
                            Checkbox::make('is_featured'),
                        ]),

                ])
                ->columnSpanFull()
                ->submitAction(
                    Action::make('save')
                        ->label('Save Product')
                        ->button()
                        ->color('primary')
                        ->submit('save')
                ),
            ]);
    }
}
