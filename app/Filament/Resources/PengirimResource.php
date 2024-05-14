<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengirimResource\Pages;
use App\Filament\Resources\PengirimResource\RelationManagers;
use App\Models\Pengirim;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class PengirimResource extends Resource
{
    protected static ?string $model = Pengirim::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Pengirim';
    protected static ?string $label = 'Pengirim';
    protected static ?string $pluralLabel = 'Pengirim';
    protected static ?string $navigationGroup = 'Pengaduan';
    protected static ?string $slug = 'pengirim';

    public static function infolist(Infolist $infolist): infolist
    {
        return $infolist
            ->schema([
                Components\Section::make()->schema([
                    Components\Grid::make(2)->schema([
                        Components\TextEntry::make('nama_pengirim'),
                        Components\TextEntry::make('email_pengirim'),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pengirim')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('email_pengirim')
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
            'index' => Pages\ListPengirims::route('/'),
            'create' => Pages\CreatePengirim::route('/create'),
            'view' => Pages\ViewPengirim::route('/{record}'),
            'edit' => Pages\EditPengirim::route('/{record}/edit'),
        ];
    }
}
