<?php

namespace App\Filament\Resources\HotspotImageResource\Pages;

use App\Filament\Resources\HotspotImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHotspotImage extends EditRecord
{
    protected static string $resource = HotspotImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
