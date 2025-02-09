<?php

namespace App\Filament\Vendor\Resources\SpecialResource\Pages;

use App\Filament\Vendor\Resources\SpecialResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSpecial extends ViewRecord
{
    protected static string $resource = SpecialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
