<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BansosResource\Pages;
use App\Filament\Resources\BansosResource\RelationManagers;
use App\Models\Bansos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class BansosResource extends Resource
{
    protected static ?string $model = Bansos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Bansos';
    protected static ?string $label = 'Bansos';
    protected static ?string $pluralLabel = 'Bansos';
    protected static ?string $navigationGroup = 'Pengaduan dan Pengajuan';
    protected static ?string $slug = 'bansos';

    public static function canCreate(): bool
    {
      return false;
    }

    public static function infolist(Infolist $infolist): infolist
    {
        return $infolist
            ->schema([
                Components\Section::make()->schema([
                    Components\Grid::make(2)->schema([
                        Components\TextEntry::make('penduduk.nama')
                        ->label('Nama Pengaju'),
                        Components\TextEntry::make('tanggungan'),
                        Components\TextEntry::make('penghasilan')
                        ->label('Penghasilan per Bulan'),
                        Components\TextEntry::make('pengeluaran')
                        ->label('Pengeluaran per Bulan'),
                        Components\TextEntry::make('luas_rumah')
                        ->label('Luas Rumah (Satuan M2)'),
                        Components\TextEntry::make('status_rumah')
                        ->label('Status Kepemilikan Rumah'),
                        Components\TextEntry::make('keterangan'),
                        Components\TextEntry::make('status_pengajuan')
                        ->label('Status Pengajuan'),
                        Components\ImageEntry::make('foto_gaji')
                        ->label('Foto Slip Gaji'),
                        Components\ImageEntry::make('foto_rumah')
                        ->label('Foto Rumah'),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('penduduk.nama')
                ->label('Nama Pengaju')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('penghasilan')
                ->label('Penghasilan per Bulan')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('pengeluaran')
                ->label('Pengeluaran per Bulan')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('luas_rumah')
                ->label('Luas Rumah (Satuan M2)')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('status_rumah')
                ->label('Status Kepemilikan Rumah')
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggungan')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('status_pengajuan')
                ->sortable()
                ->searchable()
                ->label('Status Pengajuan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Setujui')
                ->form([
                    Forms\Components\Hidden::make('action')->default('setujui'),
                ])
                ->action(function ($record, $data) {
                    $record->update(['status_pengajuan' => 'Disetujui']);
                })
                ->icon('heroicon-o-check-circle')
                ->requiresConfirmation()
                ->color('success')
                ->visible(fn ($record) => $record->status_pengajuan !== 'Disetujui'),
                Tables\Actions\Action::make('Tolak')
                ->form([
                    Forms\Components\Hidden::make('action')->default('tolak'),
                ])
                ->action(function ($record, $data) {
                    $record->update(['status_pengajuan' => 'Ditolak']);
                })
                ->icon('heroicon-o-x-circle')
                ->requiresConfirmation()
                ->color('danger')
                ->visible(fn ($record) => $record->status_pengajuan !== 'Ditolak'),
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
            'index' => Pages\ListBansos::route('/'),
            // 'create' => Pages\CreateBansos::route('/create'),
            'view' => Pages\ViewBansos::route('/{record}'),
            'edit' => Pages\EditBansos::route('/{record}/edit'),
        ];
    }
}
