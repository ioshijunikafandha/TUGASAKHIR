<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BukuResource\Pages;
use App\Filament\Resources\BukuResource\RelationManagers;
use App\Models\Buku;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('author_id')
            ->required()
            ->relationship('author', 'name'),
            TextInput::make('title')->required(),
            Toggle::make('ready')->required(),
            TextInput::make('categori')->required(),
            FileUpload::make('cover')->required(),
            DateTimePicker::make('published_year')->required()
        ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('cover'),
            TextColumn::make('title')->searchable(),
            IconColumn::make('ready')
                ->boolean(),
            TextColumn::make('author.name'),
            TextColumn::make('published_year'),
            TextColumn::make('categori'),
            ])
            ->filters([
                //
                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    ])
                    ->bulkActions([
                        Tables\Actions\BulkActionGroup::make([
                            Tables\Actions\DeleteBulkAction::make(),
                        ]),
                    ]);
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
                        'index' => Pages\ListBukus::route('/'),
                        'create' => Pages\CreateBuku::route('/create'),
                        'edit' => Pages\EditBuku::route('/{record}/edit'),
                    ];
                }    
            }
            