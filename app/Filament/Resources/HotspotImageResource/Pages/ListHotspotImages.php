<?php

namespace App\Filament\Resources\HotspotImageResource\Pages;

use App\Filament\Resources\HotspotImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHotspotImages extends ListRecords
{
    protected static string $resource = HotspotImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
