<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendudukResource\Pages;
use App\Filament\Resources\PendudukResource\RelationManagers;
use App\Models\Penduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class PendudukResource extends Resource
{
    protected static ?string $model = Penduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationLabel = 'Penduduk';
    protected static ?string $label = 'Penduduk';
    protected static ?string $pluralLabel = 'Penduduk';
    protected static ?string $navigationGroup = 'Kependudukan';
    protected static ?string $slug = 'penduduk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('NIK')
                ->required()
                ->label('NIK'),
                Forms\Components\TextInput::make('nama')
                ->required()
                ->label('Nama Lengkap'),
                Forms\Components\TextInput::make('tempat_lahir')
                ->required()
                ->label('Tempat Lahir'),
                Forms\Components\DatePicker::make('tanggal_lahir')
                ->required()
                ->label('Tanggal Lahir'),
                Forms\Components\Select::make('jenis_kelamin')
                ->required()
                ->options([
                    'L' => 'Laki-Laki',
                    'P' => 'Perempuan',
                ]),
                Forms\Components\Select::make('agama')
                ->required()
                ->options([
                    'Islam' => 'Islam',
                    'Kristen' => 'Kristen',
                    'Katolik' => 'Katolik',
                    'Hindu' => 'Hindu',
                    'Buddha' => 'Buddha',
                    'Khonghucu' => 'Khonghucu',
                ]),
                Forms\Components\TextInput::make('alamat')
                ->required(),
                Forms\Components\TextInput::make('RT')
                ->label('RT')
                ->required(),
                Forms\Components\TextInput::make('RW')
                ->label('RW')
                ->required()
                ->default('03'),
                Forms\Components\TextInput::make('pekerjaan')
                ->required(),
                Forms\Components\Select::make('status_pernikahan')
                ->required()
                ->options([
                    'Belum Menikah' => 'Belum Menikah',
                    'Menikah' => 'Menikah',
                    'Cerai Hidup' => 'Cerai Hidup',
                    'Cerai Mati' => 'Cerai Mati',
                ]),
                Forms\Components\Select::make('status_kependudukan')
                ->required()
                ->options([
                    'Menetap' => 'Menetap',
                    'Sementara' => 'Sementara',
                ]),
                Forms\Components\Select::make('level_id')
                ->required()
                ->relationship(name: 'level', titleAttribute: 'level_nama')
                ->label('Level'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('NIK')
                ->label('NIK')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('agama')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('pekerjaan')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('status_pernikahan')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('status_kependudukan')
                ->sortable()
                ->searchable(),
                // Tables\Columns\TextColumn::make('level.level_nama')
                // ->sortable()
                // ->searchable(),
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
            'index' => Pages\ListPenduduks::route('/'),
            'create' => Pages\CreatePenduduk::route('/create'),
            'view' => Pages\ViewPenduduk::route('/{record}'),
            'edit' => Pages\EditPenduduk::route('/{record}/edit'),
        ];
    }
}
