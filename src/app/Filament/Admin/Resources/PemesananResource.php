<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PemesananResource\Pages;
use App\Models\Pemesanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;

class PemesananResource extends Resource
{
    protected static ?string $model = Pemesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    protected static ?string $navigationLabel = 'Pemesanan';
    protected static ?string $navigationGroup = 'Pemesanan Tiket';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('film_id')
                    ->label('Film')
                    ->relationship('film', 'judul')
                    ->searchable()
                    ->required(),

                TextInput::make('nama_pemesan')
                    ->label('Nama Pemesan')
                    ->required(),

                TextInput::make('jumlah_tiket')
                    ->numeric()
                    ->minValue(1)
                    ->label('Jumlah Tiket')
                    ->required(),

                DateTimePicker::make('jadwal_tayang')
                    ->label('Jadwal Tayang')
                    ->required(),

                TextInput::make('kursi')
                    ->label('Nomor Kursi')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('film.judul')->label('Film')->sortable()->searchable(),
                TextColumn::make('nama_pemesan')->label('Pemesan'),
                TextColumn::make('jumlah_tiket')->label('Jumlah'),
                TextColumn::make('jadwal_tayang')->label('Jadwal')->dateTime(),
                TextColumn::make('kursi')->label('Kursi'),
            ])
            ->actions([
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPemesanans::route('/'),
            'create' => Pages\CreatePemesanan::route('/create'),
            'edit' => Pages\EditPemesanan::route('/{record}/edit'),
        ];
    }
}
