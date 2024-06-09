<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\PengaduanResource\Pages;
use App\Models\Pengaduan;
use Filament\Forms;
use Filament\Forms\Components\Builder;
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
    public static function canCreate(): bool
    {
        return false;
    }
    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pengirim')
                    ->default(fn () => Auth::user()->name)
                    ->disabled()
                    ->required(),
                Forms\Components\TextInput::make('email_pengirim')
                    ->default(fn () => Auth::user()->email)
                    ->disabled()
                    ->required(),
                Forms\Components\TextInput::make('judul_pengaduan')
                    ->required(),
                Forms\Components\Textarea::make('isi_pengaduan')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_pengaduan')
                    ->default(now())
                    ->disabled(),
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('images/pengaduan')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul_pengaduan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('isi_pengaduan')
                    ->searchable(),
                TextColumn::make('tanggal_pengaduan')
                    ->sortable()
                    ->searchable(),
                ImageColumn::make('foto')
                    ->label('Foto'),
            ])
            ->filters([
                // No filters for now
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // User can edit only their own records
                Tables\Actions\EditAction::make()
                    ->visible(fn (Pengaduan $record) => $record->email_pengirim === Auth::user()->email),
            ])
            ->bulkActions([
                // No bulk actions for users
            ])
            ->defaultSort('tanggal_pengaduan', 'desc')
            ->query(function (Builder $query) {
                // Filter the records based on the logged-in user
                return $query->where('email_pengirim', Auth::user()->email);
            });
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
            'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }
}
