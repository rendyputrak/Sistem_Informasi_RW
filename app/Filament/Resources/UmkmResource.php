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
                Forms\Components\TextInput::make('nama_umkm')->columnSpan(2)
                ->label('Nama UMKM'),
                Forms\Components\TextInput::make('alamat')->columnSpan(2),
                Forms\Components\Select::make('penduduk_id')
                ->options(function(){
                    return \App\Models\Penduduk::pluck('penduduk_id' , 'penduduk_id');
                })
                ->relationship(name: 'penduduk', titleAttribute: 'nama')
                ->searchable()
                ->label('Pemilik'),
                Forms\Components\MarkdownEditor::make('deskripsi')->columnSpan(2)
                ->disableToolbarButtons(['attachFiles', 'table', 'blockquote', 'codeBlock']),
                Forms\Components\FileUpload::make('foto')->columnSpan(2)
                ->image()
                ->directory('foto-umkm')
                ->required(),
            ]);
    }

    public static function infolist(Infolist $infolist): infolist
    {
        return $infolist
            ->schema([
                Components\Section::make()->schema([
                    Components\Grid::make(2)->schema([
                        Components\TextEntry::make('nama_umkm'),
                        Components\TextEntry::make('alamat'),
                        Components\TextEntry::make('deskripsi'),
                        Components\TextEntry::make('penduduk_id'),
                        Components\ImageEntry::make('foto')
                        ->disk('public'),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_umkm')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                ->searchable(),
                Tables\Columns\TextColumn::make('penduduk.nama')
                ->searchable()
                ->label('Pemilik'),
                Tables\Columns\ImageColumn::make('foto')

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
            'index' => Pages\ListUmkms::route('/'),
            'create' => Pages\CreateUmkm::route('/create'),
            'view' => Pages\ViewUmkm::route('/{record}'),
            'edit' => Pages\EditUmkm::route('/{record}/edit'),
        ];
    }
}
