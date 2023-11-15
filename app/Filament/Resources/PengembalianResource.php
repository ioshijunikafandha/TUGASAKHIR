<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengembalianResource\Pages;
use App\Filament\Resources\PengembalianResource\RelationManagers;
use App\Models\Pengembalian;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengembalianResource extends Resource
{
    protected static ?string $model = Pengembalian::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-up';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('returnID')->required(),
                TextInput::make('bookID')->required(),
                TextInput::make('memberID')->required(),
                DateTimePicker::make('returnDate')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('returnID'),
                TextColumn::make('bookID'),
                TextColumn::make('memberID'),
                TextColumn::make('returnDate'),
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
            'index' => Pages\ListPengembalians::route('/'),
            //'create' => Pages\CreatePengembalian::route('/create'),
            //'edit' => Pages\EditPengembalian::route('/{record}/edit'),
        ];
    }    
}
