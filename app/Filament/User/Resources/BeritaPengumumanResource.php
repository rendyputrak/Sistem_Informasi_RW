<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\BeritaPengumumanResource\Pages;
use App\Filament\User\Resources\BeritaPengumumanResource\RelationManagers;
use App\Models\BeritaPengumuman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListBeritaPengumumen::route('/'),
            'create' => Pages\CreateBeritaPengumuman::route('/create'),
            'view' => Pages\ViewBeritaPengumuman::route('/{record}'),
            'edit' => Pages\EditBeritaPengumuman::route('/{record}/edit'),
        ];
    }
}
