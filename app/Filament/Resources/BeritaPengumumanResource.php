<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaPengumumanResource\Pages;
use App\Filament\Resources\BeritaPengumumanResource\RelationManagers;
use App\Models\BeritaPengumuman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;
use Illuminate\Database\Eloquent\Factories\Relationship;

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
                Forms\Components\TextInput::make('judul')
                ->columnSpanFull(),
                Forms\Components\TextArea::make('isi')
                ->columnSpanFull(),
                Forms\Components\Select::make('jenis')
                ->options([
                    'Berita' => 'Berita',
                    'Pengumuman' => 'Pengumuman',
                ]),
                Forms\Components\DatePicker::make('tanggal_posting'),
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
                    Components\Grid::make(5)->schema([
                        Components\TextEntry::make('judul'),
                        Components\TextEntry::make('isi'),
                        Components\TextEntry::make('jenis'),
                        Components\TextEntry::make('tanggal_posting'),
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
                Tables\Columns\TextColumn::make('judul')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('isi')
                ->searchable(),
                Tables\Columns\TextColumn::make('jenis')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_posting')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('admin.nama')
                ->sortable()
                ->searchable()
                ->label('Pengunggah'),
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
