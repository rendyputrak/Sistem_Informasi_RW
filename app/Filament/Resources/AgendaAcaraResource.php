<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaAcaraResource\Pages;
use App\Filament\Resources\AgendaAcaraResource\RelationManagers;
use App\Models\AgendaAcara;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class AgendaAcaraResource extends Resource
{
    protected static ?string $model = AgendaAcara::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Agenda dan Acara';
    protected static ?string $label = 'Agenda dan Acara';
    protected static ?string $pluralLabel = 'Agenda dan Acara';
    protected static ?string $navigationGroup = 'Informasi';
    protected static ?string $slug = 'agenda-dan-acara';

    public static function form(Form $form): Form
    {
        Select::make('admin_id')
        ->options([
        'Admin' => '1',
        ]);
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_acara'),
                Forms\Components\DatePicker::make('tanggal'),
                Forms\Components\TimePicker::make('waktu'),
                Forms\Components\TextInput::make('lokasi'),
                Forms\Components\TextArea::make('deskripsi'),
                Forms\Components\Select::make('admin_id')
                ->relationship(name: 'admin', titleAttribute:'nama')
                ->searchable()
                ->label('Pengunggah'),
            ]);
    }
    public static function infolist(Infolist $infolist): infolist
    {
        return $infolist
            ->schema([
                Components\Section::make()->schema([
                    Components\Grid::make(3)->schema([
                        Components\TextEntry::make('nama_acara'),
                        Components\TextEntry::make('tanggal'),
                        Components\TextEntry::make('waktu'),
                        Components\TextEntry::make('lokasi'),
                        Components\TextEntry::make('deskripsi'),
                        Components\TextEntry::make('admin.nama')
                        ->label('Pengunggah'),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table            
            ->columns([
                Tables\Columns\TextColumn::make('nama_acara')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('waktu')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('lokasi')
                ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                ->searchable(),
                Tables\Columns\TextColumn::make('admin.nama')
                ->label('Pengunggah')
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
            'index' => Pages\ListAgendaAcaras::route('/'),
            'create' => Pages\CreateAgendaAcara::route('/create'),
            'view' => Pages\ViewAgendaAcara::route('/{record}'),
            'edit' => Pages\EditAgendaAcara::route('/{record}/edit'),
        ];
    }
}
