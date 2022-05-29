<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Enums\ArticleStatus;
use App\Filament\Resources\ArticleResource;
use Filament\Pages\Actions\Action;
use Filament\Pages\Actions\ButtonAction;
use Filament\Resources\Pages\CreateRecord;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;

    protected static ?string $title = 'Submit Article';
    protected static ?string $breadcrumb = 'Submit';
    protected static bool $canCreateAnother = false;

    protected bool $shouldCreateAsDraft = false;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (auth()->user()->is_admin) {
            return $data;
        }

        $data['status'] = $this->shouldCreateAsDraft ?
            ArticleStatus::Draft :
            ArticleStatus::Pending;

        $data['author_id'] = auth()->user()->getKey();

        return $data;
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()->label(auth()->user()->is_admin ? 'Create' : 'Submit for review');
    }

    protected function getCreateAsDraftFormAction(): Action
    {
        return ButtonAction::make('createAsDraft')
            ->label('Save draft')
            ->action(function () {
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
