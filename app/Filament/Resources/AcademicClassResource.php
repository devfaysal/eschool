<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicClassResource\Pages;
use App\Filament\Resources\AcademicClassResource\RelationManagers;
use App\Filament\Resources\AcademicClassResource\RelationManagers\StudentsRelationManager;
use App\Models\AcademicClass;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AcademicClassResource extends Resource
{
    protected static ?string $model = AcademicClass::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('students_count')->counts('students'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name'),
                TextEntry::make('students_count'),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            StudentsRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAcademicClasses::route('/'),
            'create' => Pages\CreateAcademicClass::route('/create'),
            'view' => Pages\ViewAcademicClass::route('/{record}'),
            'edit' => Pages\EditAcademicClass::route('/{record}/edit'),
        ];
    }    
}
