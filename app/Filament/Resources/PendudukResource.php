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
                ->label('NIK'),
                Forms\Components\TextInput::make('nama'),
                Forms\Components\TextInput::make('tempat_lahir'),
                Forms\Components\DatePicker::make('tanggal_lahir'),
                Forms\Components\Select::make('jenis_kelamin')
                ->options([
                    'L' => 'Laki-Laki',
                    'P' => 'Perempuan',
                ]),
                Forms\Components\Select::make('agama')
                ->options([
                    'Islam' => 'Islam',
                    'Kristen' => 'Kristen',
                    'Katolik' => 'Katolik',
                    'Hindu' => 'Hindu',
                    'Buddha' => 'Buddha',
                    'Khonghucu' => 'Khonghucu',
                ]),
                Forms\Components\TextInput::make('alamat'),
                Forms\Components\TextInput::make('pekerjaan'),
                Forms\Components\Select::make('status_pernikahan')
                ->options([
                    'Belum Menikah' => 'Belum Menikah',
                    'Menikah' => 'Menikah',
                    'Cerai Hidup' => 'Cerai Hidup',
                    'Cerai Mati' => 'Cerai Mati',
                ]),
                Forms\Components\Select::make('status_kependudukan')
                ->options([
                    'Menetap' => 'Menetap',
                    'Sementara' => 'Sementara',
                ]),
                Forms\Components\Select::make('level_id')
                ->relationship(name: 'level', titleAttribute: 'level_nama')
                ->label('Level'),
            ]);
    }
    public static function infolist(Infolist $infolist): infolist
    {
        return $infolist
            ->schema([
                Components\Section::make()->schema([
                    Components\Grid::make(5)->schema([
                        Components\TextEntry::make('NIK')
                        ->label('NIK'),
                        Components\TextEntry::make('nama'),
                        Components\TextEntry::make('tempat_lahir'),
                        Components\TextEntry::make('tanggal_lahir'),
                        Components\TextEntry::make('jenis_kelamin'),
                        Components\TextEntry::make('agama'),
                        Components\TextEntry::make('alamat'),
                        Components\TextEntry::make('pekerjaan'),
                        Components\TextEntry::make('status_pernikahan'),
                        Components\TextEntry::make('status_kependudukan'),
                        Components\TextEntry::make('level.level_nama')
                        ->label('Level'),
                    ])
                ])
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
                Tables\Columns\TextColumn::make('level.level_nama')
                ->sortable()
                ->searchable(),
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
            'index' => Pages\ListPenduduks::route('/'),
            'create' => Pages\CreatePenduduk::route('/create'),
            'view' => Pages\ViewPenduduk::route('/{record}'),
            'edit' => Pages\EditPenduduk::route('/{record}/edit'),
        ];
    }
}
