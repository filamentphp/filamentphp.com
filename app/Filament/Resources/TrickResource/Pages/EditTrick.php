<?php

namespace App\Filament\Resources\TrickResource\Pages;

use App\Enums\TrickStatus;
use App\Filament\Resources\TrickResource;
use Filament\Pages\Actions\Action;
use Filament\Pages\Actions\ButtonAction;
use Filament\Resources\Pages\EditRecord;

class EditTrick extends EditRecord
{
    protected static string $resource = TrickResource::class;

    protected bool $shouldSaveAsDraft = false;

    protected bool $shouldSaveAsPending = false;

    protected function afterSave(): void
    {
        $this->emit('trickUpdated', ['trick' => $this->record]);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (auth()->user()->is_admin) {
            return $data;
        }

        if ($this->shouldSaveAsDraft) {
            $data['status'] = TrickStatus::DRAFT;
        }

        if ($this->shouldSaveAsPending) {
            $data['status'] = TrickStatus::PENDING;
        }

        return $data;
    }

    protected function getSavedNotificationMessage(): ?string
    {
        if ($this->shouldSaveAsDraft) {
            return 'Saved as draft';
        }

        if ($this->shouldSaveAsPending) {
            return 'Submitted for review. You\'re awesome!';
        }

        return parent::getSavedNotificationMessage();
    }

    protected function getSaveAsDraftFormAction(): Action
    {
        return ButtonAction::make('saveAsDraft')
            ->label('Save as draft')
            ->action(function () {
                $this->shouldSaveAsDraft = true;

                $this->save();
            })
            ->color('secondary')
            ->visible(fn (): bool => (! auth()->user()->is_admin) && $this->record->status === TrickStatus::PENDING);
    }

    protected function getSaveAsPendingFormAction(): Action
    {
        return ButtonAction::make('saveAsPending')
            ->label('Submit for review')
            ->action(function () {
                $this->shouldSaveAsPending = true;

                $this->save();
            })
            ->color('success')
            ->visible(fn (): bool => (! auth()->user()->is_admin) && $this->record->status === TrickStatus::DRAFT);
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
            TrickResource\Widgets\EditTrickHeader::class,
        ];
    }

    protected function getActions(): array
    {
        return array_merge([
            $this->getViewAction(),
        ], parent::getActions());
    }

    protected function getViewAction(): Action
    {
        return parent::getViewAction()
            ->label('Preview on our website')
            ->openUrlInNewTab()
            ->url(route('tricks.view', ['trick' => $this->record]));
    }
}
