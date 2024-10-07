<?php

namespace App\Filament\Resources\DocumentsResource\Pages;

use App\Filament\Resources\DocumentsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDocuments extends CreateRecord
{
    protected static string $resource = DocumentsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
