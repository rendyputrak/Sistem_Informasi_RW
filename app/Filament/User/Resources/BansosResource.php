<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\BansosResource\Pages;
use App\Filament\User\Resources\BansosResource\Pages\ListBansos;
use App\Filament\User\Resources\BansosResource\RelationManagers;
use App\Models\Bansos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components;
use Illuminate\Support\Facades\Auth;

class BansosResource extends Resource
{
    protected static ?string $model = Bansos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pengajuan Bansos';
    protected static ?string $label = 'Pengajuan Bansos';
    protected static ?string $pluralLabel = 'Pengajuan Bansos';
    protected static ?string $navigationGroup = 'Pengaduan dan Pengajuan';
    protected static ?string $slug = 'pengajuan-bansos';

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        $user = Auth::user();
        $pendudukId = $user->penduduk_id;
        return $form
            ->schema([
            Components\Hidden::make('penduduk_id')
                ->default($pendudukId),
            Components\Select::make('decoy')
                ->label('Nama')
                ->relationship(name: 'penduduk', titleAttribute: 'nama')
                ->default($pendudukId)
                ->disabled()
                ->required(),
                
            Components\Select::make('penghasilan')
                ->label('Penghasilan')
                ->options([
                    'Dibawah Rp.500.000' => 'Dibawah Rp.500.000',
                    'Rp.500.000 - Rp.1.000.000' => 'Rp.500.000 - Rp.1.000.000',
                    'Rp.1.000.001 - Rp.2.000.000' => 'Rp.1.000.001 - Rp.2.000.000',
                    'Rp.2.000.001 - Rp.3.000.000' => 'Rp.2.000.001 - Rp.3.000.000',
                    'Diatas Rp.3.000.000' => 'Diatas Rp.3.000.000',
                ])
                ->required(),

            Components\Select::make('pengeluaran')
                ->label('Pengeluaran')
                ->options([
                    'Dibawah Rp.500.000' => 'Dibawah Rp.500.000',
                    'Rp.500.000 - Rp.1.000.000' => 'Rp.500.000 - Rp.1.000.000',
                    'Rp.1.000.001 - Rp.2.000.000' => 'Rp.1.000.001 - Rp.2.000.000',
                    'Rp.2.000.001 - Rp.3.000.000' => 'Rp.2.000.001 - Rp.3.000.000',
                    'Diatas Rp.3.000.000' => 'Diatas Rp.3.000.000',
                ])
                ->required(),

            Components\Select::make('luas_rumah')
                ->label('Luas Rumah')
                ->options([
                    'Dibawah 50' => 'Dibawah 50',
                    '51-100' => '51-100',
                    '101-150' => '101-150',
                    '151-200' => '151-200',
                    'Diatas 200' => 'Diatas 200',
                ])
                ->required(),

            Components\Select::make('status_rumah')
                ->label('Status Rumah')
                ->options([
                    'Hak Milik' => 'Hak Milik',
                    'Sewa/Kontrak/Kos' => 'Sewa/Kontrak/Kos',
                    'Hibah/Warisan' => 'Hibah/Warisan',
                    'Wakaf' => 'Wakaf',
                    'Bantuan Pemerintah' => 'Bantuan Pemerintah',
                ])
                ->required(),

            Components\Select::make('tanggungan')
                ->label('Tanggungan')
                ->options([
                    '2 Orang atau kurang' => '2 Orang atau kurang',
                    '3-4 Orang' => '3-4 Orang',
                    '5-6 Orang' => '5-6 Orang',
                    '7-8 Orang' => '7-8 Orang',
                    'Diatas 8 Orang' => 'Diatas 8 Orang',
                ])
                ->required(),

            Components\Datepicker::make('tanggal_pengajuan')
                ->label('Tanggal Pengajuan')
                ->default(now())
                ->required(),

            Components\Textarea::make('keterangan')
                ->label('Keterangan'),

            Components\FileUpload::make('foto_gaji')
                ->label('Foto Gaji (Maks 2 MB)')
                ->image()
                ->directory('images/bansos/gaji')
                ->maxSize(2048)
                ->required(),

            Components\FileUpload::make('foto_rumah')
                ->label('Foto Rumah (Maks 2 MB)')
                ->image()
                ->directory('images/bansos/rumah')
                ->maxSize(2048)
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $userId = Auth::id();

        return $table
            ->query(ListBansos::forCurrentUser())
            ->columns([
                Tables\Columns\TextColumn::make('penduduk.nama')->label('Nama'),
                Tables\Columns\TextColumn::make('penghasilan')->label('Penghasilan'),
                Tables\Columns\TextColumn::make('pengeluaran')->label('Pengeluaran'),
                Tables\Columns\TextColumn::make('luas_rumah')->label('Luas Rumah'),
                Tables\Columns\TextColumn::make('status_rumah')->label('Status Rumah'),
                Tables\Columns\TextColumn::make('tanggungan')->label('Tanggungan'),
                Tables\Columns\TextColumn::make('tanggal_pengajuan')->label('Tanggal Pengajuan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListBansos::route('/'),
            'create' => Pages\CreateBansos::route('/create'),
            'view' => Pages\ViewBansos::route('/{record}'),
            'edit' => Pages\EditBansos::route('/{record}/edit'),
        ];
    }
}
