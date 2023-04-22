<?php

namespace App\Filament\Resources\LinkResource\Pages;

use App\Enums\LinkStatus;
use App\Filament\Resources\LinkResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateLink extends CreateRecord
{
    protected static string $resource = LinkResource::class;

    protected static ?string $title = 'Submit Link';

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
            'status' => $this->shouldCreateAsDraft ? LinkStatus::Draft : LinkStatus::Pending,
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
