<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaPengumumanResource\Pages;
use App\Filament\Resources\BeritaPengumumanResource\RelationManagers;
use App\Models\BeritaPengumuman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;
use Illuminate\Database\Eloquent\Factories\Relationship;

class BeritaPengumumanResource extends Resource
{
    protected static ?string $model = BeritaPengumuman::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationLabel = 'Berita dan Pengumuman';
    protected static ?string $label = 'Berita dan Pengumuman';
    protected static ?string $pluralLabel = 'Berita dan Pengumuman';
    protected static ?string $navigationGroup = 'Informasi';
    protected static ?string $slug = 'berita-dan-pengumuman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                ->columnSpanFull()
                ->required(),
                Forms\Components\TextArea::make('isi')
                ->required()
                ->columnSpanFull(),
                Forms\Components\Select::make('jenis')
                ->required()
                ->options([
                    'Berita' => 'Berita',
                    'Pengumuman' => 'Pengumuman',
                ]),
                Forms\Components\FileUpload::make('foto')
                ->label('Foto (Maks 2 MB)')
                ->image()
                ->directory('images/beritapengumuman')
                ->maxSize(2048),
                Forms\Components\DatePicker::make('tanggal_posting')
                ->required()
                ->label('Tanggal Posting')
                ->default(now()),
                Forms\Components\Select::make('admin_id')
                ->required()
                ->relationship(name: 'admin', titleAttribute:'nama')
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
                Tables\Columns\TextColumn::make('isi')
                ->searchable()
                ->limit(50),
                Tables\Columns\TextColumn::make('jenis')
                ->sortable()
                ->searchable(),
                Tables\Columns\ImageColumn::make('foto')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_posting')
                ->label('Tanggal Posting')
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
            'index' => Pages\ListBeritaPengumumen::route('/'),
            'create' => Pages\CreateBeritaPengumuman::route('/create'),
            'view' => Pages\ViewBeritaPengumuman::route('/{record}'),
            'edit' => Pages\EditBeritaPengumuman::route('/{record}/edit'),
        ];
    }
}
