<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
use App\Filament\Resources\GaleriResource\RelationManagers;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $navigationLabel = 'Galeri';
    protected static ?string $label = 'Galeri';
    protected static ?string $pluralLabel = 'Galeri';
    protected static ?string $navigationGroup = 'Informasi';
    protected static ?string $slug = 'galeri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                ->required(),
                Forms\Components\TextArea::make('deskripsi')
                ->required(),
                Forms\Components\FileUpload::make('foto')
                ->label('Foto (Maks 2 MB)')
                ->image()
                ->directory('images/galeri')
                ->columnSpanFull()
                ->maxSize(2048)
                ->required(),
                Forms\Components\DatePicker::make('tanggal_upload')
                ->required()
                ->default(now()),
                Forms\Components\Select::make('admin_id')
                ->required()
                ->relationship(name: 'admin', titleAttribute: 'nama')
                ->label('Pengunggah'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                ->searchable(),
                Tables\Columns\ImageColumn::make('foto'),
                Tables\Columns\TextColumn::make('tanggal_upload')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('admin.nama')
                ->sortable()
                ->searchable()
                ->label('Pengunggah'),
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
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'view' => Pages\ViewGaleri::route('/{record}'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
    public static function getBreadcrumb(): string
    {
        return 'Galeri';
    }
    public static function getLabel(): string
    {
        return 'Galeri';
    }
    public static function getTitle(): string
    {
        return 'Galeri';
    }
}
