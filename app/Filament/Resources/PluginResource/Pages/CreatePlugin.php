<?php

namespace App\Filament\Resources\PluginResource\Pages;

use App\Enums\PluginStatus;
use App\Filament\Resources\PluginResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreatePlugin extends CreateRecord
{
    protected static string $resource = PluginResource::class;

    protected static ?string $title = 'Submit Plugin';

    protected static ?string $breadcrumb = 'Submit';

    protected static bool $canCreateAnother = false;

    protected bool $shouldCreateAsDraft = false;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (auth()->user()->is_admin) {
            return $data;
        }

        return [
            ...$data,
            'status' => $this->shouldCreateAsDraft ? PluginStatus::Draft : PluginStatus::Pending,
            'author_id' => auth()->user()->getKey(),
        ];
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()->label(auth()->user()->is_admin ? 'Create' : 'Submit for review');
    }

    protected function getCreateAsDraftFormAction(): Action
    {
        return Action::make('createAsDraft')
            ->label('Save draft')
            ->action(function (): void {
                $this->shouldCreateAsDraft = true;

                $this->create();
            })
            ->color('secondary')
            ->visible(fn (): bool => ! auth()->user()->is_admin);
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCreateAsDraftFormAction(),
            $this->getCancelFormAction(),
        ];
    }
}
