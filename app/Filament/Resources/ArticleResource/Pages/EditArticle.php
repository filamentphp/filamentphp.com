<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Enums\ArticleStatus;
use App\Filament\Resources\ArticleResource;
use Filament\Pages\Actions\Action;
use Filament\Pages\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;

    protected bool $shouldSaveAsDraft = false;

    protected bool $shouldSaveAsPending = false;

    protected function afterSave(): void
    {
        $this->emit('articleUpdated', ['article' => $this->record]);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (auth()->user()->is_admin) {
            return $data;
        }

        if ($this->shouldSaveAsDraft) {
            $data['status'] = ArticleStatus::Draft;
        }

        if ($this->shouldSaveAsPending) {
            $data['status'] = ArticleStatus::Pending;
        }

        return $data;
    }

    protected function getSavedNotificationTitle(): ?string
    {
        if ($this->shouldSaveAsDraft) {
            return 'Saved as draft';
        }

        if ($this->shouldSaveAsPending) {
            return 'Submitted for review. You\'re awesome!';
        }

        return parent::getSavedNotificationTitle();
    }

    protected function getSaveAsDraftFormAction(): Action
    {
        return Action::make('saveAsDraft')
            ->label('Save as draft')
            ->action(function (): void {
                $this->shouldSaveAsDraft = true;

                $this->save();
            })
            ->color('secondary')
            ->visible(fn (): bool => (! auth()->user()->is_admin) && $this->record->status === ArticleStatus::Pending);
    }

    protected function getSaveAsPendingFormAction(): Action
    {
        return Action::make('saveAsPending')
            ->label('Submit for review')
            ->action(function () {
                $this->shouldSaveAsPending = true;

                $this->save();
            })
            ->color('success')
            ->visible(fn (): bool => (! auth()->user()->is_admin) && $this->record->status === ArticleStatus::Draft);
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),
            $this->getSaveAsDraftFormAction(),
            $this->getSaveAsPendingFormAction(),
            $this->getCancelFormAction(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ArticleResource\Widgets\EditArticleHeader::class,
        ];
    }

    protected function getActions(): array
    {
        return [
            ViewAction::make()
                ->label('Preview on our website')
                ->openUrlInNewTab()
                ->url($this->record->getUrl()),
            ...parent::getActions(),
        ];
    }
}
