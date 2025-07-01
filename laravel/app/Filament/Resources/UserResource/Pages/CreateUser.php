<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->record = new \App\Models\User($data);
        $this->record->save();

        if (isset($data['role'])) {
            $this->record->syncRoles($data['role']);
        }

        return $data;
    }
}
