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
                Forms\Components\TextInput::make('judul'),
                Forms\Components\TextArea::make('deskripsi'),
                Forms\Components\FileUpload::make('foto')
                ->image()
                ->directory('images/galeri')
                ->columnSpanFull(),
                Forms\Components\DatePicker::make('tanggal_upload'),
                Forms\Components\Select::make('admin_id')
                ->relationship(name: 'admin', titleAttribute: 'nama')
                ->label('Pengunggah'),
            ]);
    }
    public static function infolist(Infolist $infolist): infolist
    {
        return $infolist
            ->schema([
                Components\Section::make()->schema([
                    Components\Grid::make(5)->schema([
                        Components\TextEntry::make('judul'),
                        Components\TextEntry::make('deskripsi'),
                        Components\ImageEntry::make('foto'),
                        Components\TextEntry::make('tanggal_upload'),
                        Components\TextEntry::make('admin.nama')
                        ->label('Pengunggah'),
                    ])
                ])
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
