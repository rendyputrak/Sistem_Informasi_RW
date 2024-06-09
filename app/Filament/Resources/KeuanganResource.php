<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeuanganResource\Pages;
use App\Filament\Resources\KeuanganResource\RelationManagers;
use App\Models\Keuangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class KeuanganResource extends Resource
{
    protected static ?string $model = Keuangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Keuangan';
    protected static ?string $label = 'Keuangan';
    protected static ?string $pluralLabel = 'Keuangan';
    protected static ?string $navigationGroup = 'Informasi';
    protected static ?string $slug = 'keuangan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jenis')
                ->required()
                ->options([
                    'pemasukan' => 'pemasukan',
                    'pengeluaran' => 'pengeluaran',
                ]),
                Forms\Components\TextArea::make('keterangan')
                ->required(),
                Forms\Components\TextInput::make('jumlah')
                ->required(),
                Forms\Components\DatePicker::make('tanggal')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenis')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
                ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                ->sortable()
                ->searchable(),
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
            'index' => Pages\ListKeuangans::route('/'),
            'create' => Pages\CreateKeuangan::route('/create'),
            'view' => Pages\ViewKeuangan::route('/{record}'),
            'edit' => Pages\EditKeuangan::route('/{record}/edit'),
        ];
    }
}
