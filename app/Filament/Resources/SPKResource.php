<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SPKResource\Pages;
use App\Filament\Resources\SPKResource\RelationManagers;
use App\Models\Bansos;
use App\Models\SPK;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SPKResource extends Resource
{
    protected static ?string $model = Bansos::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    protected static ?string $navigationLabel = 'Perankingan Kandidat Bansos';
    protected static ?string $label = 'Perankingan Kandidat Bansos';
    protected static ?string $pluralLabel = 'Perankingan Kandidat Bansos';
    protected static ?string $navigationGroup = 'Pengaduan dan Pengajuan';
    protected static ?string $slug = 'spk';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             //
    //         ]);
    // }

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
            'index' => Pages\SPK::route('/'),
            // 'create' => Pages\CreateSPK::route('/create'),
            // 'edit' => Pages\EditSPK::route('/{record}/edit'),
        ];
    }
}
