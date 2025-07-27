<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FilmResource\Pages;
use App\Models\Film;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn; // <-- Tambahkan ini
use Illuminate\Database\Eloquent\Builder;

class FilmResource extends Resource
{
    protected static ?string $model = Film::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Daftar Film';
    protected static ?string $navigationGroup = 'Pemesanan Tiket';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->required()
                    ->label('Judul Film'),

                Textarea::make('deskripsi')
                    ->required()
                    ->label('Deskripsi'),

                TextInput::make('poster')
                    ->url()
                    ->label('Poster (URL)')
                    ->nullable(),

                DatePicker::make('tanggal_tayang')
                    ->label('Tanggal Tayang')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('poster')
                    ->label('Poster')
                    ->circular() // bisa diganti dengan ->square()
                    ->height(60),

                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable(),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50),

                TextColumn::make('tanggal_tayang')
                    ->label('Tanggal')
                    ->date(),
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
            'index' => Pages\ListFilms::route('/'),
            'create' => Pages\CreateFilm::route('/create'),
            'edit' => Pages\EditFilm::route('/{record}/edit'),
        ];
    }
}
