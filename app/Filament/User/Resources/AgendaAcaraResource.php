<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\AgendaAcaraResource\Pages;
use App\Filament\User\Resources\AgendaAcaraResource\RelationManagers;
use App\Models\AgendaAcara;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgendaAcaraResource extends Resource
{
    protected static ?string $model = AgendaAcara::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Agenda dan Acara';
    protected static ?string $label = 'Agenda dan Acara';
    protected static ?string $pluralLabel = 'Agenda dan Acara';
    protected static ?string $navigationGroup = 'Informasi';
    protected static ?string $slug = 'agenda-dan-acara';

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
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAgendaAcaras::route('/'),
            'create' => Pages\CreateAgendaAcara::route('/create'),
            'view' => Pages\ViewAgendaAcara::route('/{record}'),
            'edit' => Pages\EditAgendaAcara::route('/{record}/edit'),
        ];
    }
}
