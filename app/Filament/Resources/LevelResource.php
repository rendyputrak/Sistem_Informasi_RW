<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LevelResource\Pages;
use App\Filament\Resources\LevelResource\RelationManagers;
use App\Models\Level;
use App\Models\Penduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LevelResource extends Resource
{
    protected static ?string $model = Level::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'Level';
    protected static ?string $label = 'Level';
    protected static ?string $pluralLabel = 'Level';
    protected static ?string $navigationGroup = 'Kependudukan';
    protected static ?string $slug = 'level';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('level_kode'),
                Forms\Components\TextInput::make('level_nama'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level_kode')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('level_nama')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('Jumlah orang')
                ->getStateUsing(function (Level $record) {
                    return Penduduk::where('level_id', $record->level_id)->count();
                })
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()
                ->action(function ($record) {
                    try {
                        $record->delete();
                    } catch (\Illuminate\Database\QueryException $e) {
                        if ($e->getCode() == 23000) {
                            \Filament\Notifications\Notification::make()
                                ->title('Gagal Menghapus!')
                                ->body('Data tidak bisa dihapus karena berkaitan dengan data lainnya.')
                                ->danger()
                                ->send();
                        } else {
                            throw $e;
                        }
                    }
                }),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                try {
                                    $record->delete();
                                } catch (\Illuminate\Database\QueryException $e) {
                                    if ($e->getCode() == 23000) {
                                        \Filament\Notifications\Notification::make()
                                            ->title('Gagal Menghapus!')
                                            ->body('Terdapat data yang tidak bisa dihapus karena berkaitan dengan data lainnya.')
                                            ->danger()
                                            ->send();
                                    } else {
                                        throw $e;
                                    }
                                }
                            }
                        }),
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
            'index' => Pages\ListLevels::route('/'),
            'create' => Pages\CreateLevel::route('/create'),
            'view' => Pages\ViewLevel::route('/{record}'),
            'edit' => Pages\EditLevel::route('/{record}/edit'),
        ];
    }
}
