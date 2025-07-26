<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FilmResource\Pages;
use App\Models\Film;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class FilmResource extends Resource
{
    protected static ?string $model = Film::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Film';
    protected static ?string $pluralModelLabel = 'Daftar Film';
    protected static ?string $navigationGroup = 'Bioskop';

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
                    ->label('Poster URL')
                    ->nullable(),

                DatePicker::make('tanggal_tayang')
    ->required() // <-- penting!
    ->label('Tanggal Tayang')
    ->native(false), // opsional biar date picker-nya pakai UI Filament
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->label('Judul')->searchable(),
                TextColumn::make('deskripsi')->label('Deskripsi')->limit(50),
                TextColumn::make('poster')
    ->label('Poster')
    ->formatStateUsing(fn ($state) => '<img src="' . $state . '" alt="Poster" style="height: 80px;">')
    ->html(), // <--- penting agar HTML img bisa ditampilkan

                TextColumn::make('tanggal_tayang')->label('Tanggal')->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListFilms::route('/'),
            'create' => Pages\CreateFilm::route('/create'),
            'edit' => Pages\EditFilm::route('/{record}/edit'),
        ];
    }
}
