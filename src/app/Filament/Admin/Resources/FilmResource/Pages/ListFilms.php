<?php

namespace App\Filament\Admin\Resources\FilmResource\Pages;

use App\Filament\Admin\Resources\FilmResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFilms extends ListRecords
{
    protected static string $resource = FilmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
