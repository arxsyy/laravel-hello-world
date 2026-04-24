<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Group;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                            // Kiri - Post Details (2/3 lebar)
            Section::make('Post Details')
                ->description('Fill in the details of the post')
                ->icon('heroicon-o-document-text')
                ->schema([
                    Group::make([
                        TextInput::make('title')
                            ->rules('required|min:3|max:50')
                            ->maxLength(255),
                            TextInput::make('slug')
                                ->rules('required')
                                ->unique()
                                ->validationMessages([
                                    'unique' => 'Slug must be unique',
                                ]),
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->preload()
                            ->searchable(),
                        ColorPicker::make('color'),
                    ])->columns(2),
                    MarkdownEditor::make('content')
                        ->columnSpan(2),
                ])->columnSpan(2),

                    // Kanan - Image & Meta (1/3 lebar)
                    Group::make([
                        Section::make('Image Upload')
                            ->schema([
                                FileUpload::make('image')
                                    ->disk('public')
                                    ->directory('posts'),
                            ]),
                        Section::make('Meta Information')
                            ->schema([
                                TagsInput::make('tags'),
                                Checkbox::make('published'),
                                DateTimePicker::make('published_at'),
                            ])->columns(2),
                    ])->columnSpan(1),
                        // RichEditor::make('content'),
                        FileUpload::make('image')
                        ->disk('public')
                        ->directory('posts'),
                        TagsInput::make('tags'),
                        Checkbox::make('published'),
                        DateTimePicker::make('published_at'),
            ])->columns(3);
    }
}
