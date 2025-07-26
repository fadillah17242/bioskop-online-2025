<?php

namespace App\Filament\Admin\Resources\FilmResource\Pages;

use App\Filament\Admin\Resources\FilmResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFilm extends CreateRecord
{
    protected static string $resource = FilmResource::class;
}
