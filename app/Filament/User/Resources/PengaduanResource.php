<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\PengaduanResource\Pages\ListPengaduans;
use App\Filament\User\Resources\PengaduanResource\Pages;
use App\Models\Pengaduan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Pengaduan';
    protected static ?string $label = 'Pengaduan';
    protected static ?string $pluralLabel = 'Pengaduan';
    protected static ?string $navigationGroup = 'Pengaduan dan Pengajuan';
    protected static ?string $slug = 'pengaduan';

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
                Forms\Components\Hidden::make('penduduk_id')
                ->default($pendudukId),
                Forms\Components\Select::make('decoy')
                    ->label('Nama')
                    ->relationship(name: 'penduduk', titleAttribute: 'nama')
                    ->default($pendudukId)
                    ->disabled()
                    ->required(),
                Forms\Components\TextInput::make('judul_pengaduan')
                    ->label('Judul Pengaduan')
                    ->required(),
                Forms\Components\Textarea::make('isi_pengaduan')
                    ->label('Isi Pengaduan')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_pengaduan')
                    ->label('tanggal_pengaduan')
                    ->default(now())
                    ->required(),
                Forms\Components\FileUpload::make('foto')
                    ->label('Foto (Maks 2 MB)')
                    ->image()
                    ->directory('images/pengaduan')
                    ->maxSize(2048)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(ListPengaduans::forCurrentUser())
            ->columns([
                TextColumn::make('penduduk.nama')
                    ->label('Nama'),
                TextColumn::make('status_pengaduan')
                    ->label('Status Pengaduan'),
                TextColumn::make('judul_pengaduan')
                    ->label('Judul Pengaduan'),
                TextColumn::make('isi_pengaduan')
                    ->label('Isi Pengaduan'),
                TextColumn::make('tanggal_pengaduan')
                    ->label('Tanggal Pengaduan'),
                ImageColumn::make('foto')
                    ->label('Foto'),
            ])
            ->filters([
                // No filters for now
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make()
            ])
            ->bulkActions([
            ]);
}

    public static function getRelations(): array
    {
        return [
            // No relations for now
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengaduans::route('/'),
            'create' => Pages\CreatePengaduan::route('/create'),
            'view' => Pages\ViewPengaduan::route('/{record}'),
            // 'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }
}
