<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Hash;
use App\Filament\Resources\AdminResource\Pages;
use App\Filament\Resources\AdminResource\RelationManagers;
use App\Models\Admin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Admin';
    protected static ?string $label = 'Admin';
    protected static ?string $pluralLabel = 'Admin';
    protected static ?string $navigationGroup = 'Kependudukan';
    protected static ?string $slug = 'admin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama'),
                Forms\Components\TextInput::make('password')
                ->password()
                ->dehydrateStateUsing(fn($state) => Hash::make($state)),
                Forms\Components\TextInput::make('email'),
                Forms\Components\Select::make('level_id')
                ->relationship(name: 'level', titleAttribute: 'level_nama')
                ->label('Level'),
                Forms\Components\Select::make('penduduk_id')
                ->relationship(name: 'penduduk', titleAttribute: 'nama')
                ->searchable()
                ->label('Penduduk'),
            ]);
    }
    public static function infolist(Infolist $infolist): infolist
    {
        return $infolist
            ->schema([
                Components\Section::make()->schema([
                    Components\Grid::make(3)->schema([
                        Components\TextEntry::make('nama'),
                        Components\TextEntry::make('password')
                        ->getStateUsing(fn($record) => '********'),
                        Components\TextEntry::make('email'),
                        Components\TextEntry::make('level.level_nama')
                        ->label('Level'),
                        Components\TextEntry::make('penduduk.nama')
                        ->label('Nama Lengkap'),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('password')
                ->getStateUsing(fn($record) => '********'),
                Tables\Columns\TextColumn::make('email')
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'view' => Pages\ViewAdmin::route('/{record}'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
}
