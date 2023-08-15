<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                Select::make('guardian_id')
                    ->relationship('guardian', 'name')
                    ->createOptionForm(function(Form $form){
                        return $form->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('phone'),
                                TextInput::make('email'),
                                Select::make('gender')->options(genderOptions()),
                                DatePicker::make('dob'),
                                TextInput::make('nid'),
                                Select::make('blood_group')->options(bloodGroupOptions()),
                                Select::make('religion')->options(religionOptions()),
                                TextInput::make('profession'),
                            ])
                        ]);
                    })
                    ->required()
                    ->searchable()
                    ->preload(),
                    TextInput::make('phone'),
                    TextInput::make('email'),
                    Select::make('gender')->options(genderOptions()),
                    DatePicker::make('dob'),
                    TextInput::make('birth_id'),
                    Select::make('blood_group')->options(bloodGroupOptions()),
                    Select::make('religion')->options(religionOptions()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->toggleable()
                    ->defaultImageUrl(url('/images/dummy-person-image.jpeg'))
                    ->circular(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('guardian.name')
                    -> label('Parent')
                    ->url(function(Student $record):string {
                        return route('filament.admin.resources.guardians.edit', $record->guardian);
                    }),
                TextColumn::make('academicClass.name')
                    ->label('Class')
                    ->action(
                        Action::make('Academic Class')
                        ->modalContent(fn (Student $record): View => view(
                            'filament.pages.actions.advance',
                            ['record' => $record],
                        ))
                        ->modalSubmitAction(false)
                        ->modalWidth('sm')
                        // ->slideOver()
                    ),
                TextColumn::make('phone')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('gender')
                    ->toggleable(),
                TextColumn::make('dob')
                    ->date()
                    ->toggleable(),
                TextColumn::make('birth_id')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('blood_group')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('religion')
                    ->toggleable(),
                TextColumn::make('status'),
            ])
            ->filters([
                SelectFilter::make('Class')
                    ->multiple()
                    ->relationship('academicClass', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('blood_group')
                    ->multiple()
                    ->options(bloodGroupOptions())
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Action::make('enroll')
                    ->requiresConfirmation()
                    ->action(function (Student $record){
                        return $record->enroll();
                    })
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
                TextEntry::make('email'),
                TextEntry::make('notes')
            ])
            ->columns(3);
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'view' => Pages\ViewStudent::route('/{record}'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }    
}
