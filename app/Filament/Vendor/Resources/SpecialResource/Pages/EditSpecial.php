<?php

namespace App\Filament\Vendor\Resources\SpecialResource\Pages;

use App\Filament\Vendor\Resources\SpecialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpecial extends EditRecord
{
    protected static string $resource = SpecialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
