<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UmkmResource\Pages;
use App\Filament\Resources\UmkmResource\RelationManagers;
use App\Models\Umkm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class UmkmResource extends Resource
{
    protected static ?string $model = Umkm::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationLabel = 'UMKM';
    protected static ?string $label = 'UMKM';
    protected static ?string $pluralLabel = 'UMKM';
    protected static ?string $navigationGroup = 'Informasi';
    protected static ?string $slug = 'umkm';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_umkm')
                ->required()
                ->label('Nama UMKM'),
                Forms\Components\TextInput::make('alamat')
                ->required(),
                Forms\Components\Select::make('penduduk_id')
                ->options(function(){
                    return \App\Models\Penduduk::pluck('penduduk_id' , 'penduduk_id');
                })
                ->relationship(name: 'penduduk', titleAttribute: 'nama')
                ->searchable(['nama', 'NIK'])
                ->searchPrompt('Cari berdasarkan nama / NIK')
                ->label('Pemilik')
                ->required(),
                Forms\Components\TextArea::make('deskripsi')
                ->required(),
                Forms\Components\FileUpload::make('foto')
                ->columnSpan(2)
                ->image()
                ->label('Foto (Maks 2 MB)')
                ->directory('images/umkm')
                ->required()
                ->maxSize(2048),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_umkm')
                ->label('Nama UMKM')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                ->searchable()
                ->limit(50),
                Tables\Columns\TextColumn::make('penduduk.nama')
                ->searchable()
                ->label('Pemilik'),
                Tables\Columns\ImageColumn::make('foto')

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
            'index' => Pages\ListUmkms::route('/'),
            'create' => Pages\CreateUmkm::route('/create'),
            'view' => Pages\ViewUmkm::route('/{record}'),
            'edit' => Pages\EditUmkm::route('/{record}/edit'),
        ];
    }
}
