<?php

namespace App\Filament\Resources\LinkResource\Pages;

use App\Enums\LinkStatus;
use App\Filament\Resources\LinkResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditLink extends EditRecord
{
    protected static string $resource = LinkResource::class;

    protected bool $shouldSaveAsDraft = false;

    protected bool $shouldSaveAsPending = false;

    protected function afterSave(): void
    {
        $this->emit('linkUpdated', ['link' => $this->record]);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (auth()->user()->is_admin) {
            return $data;
        }

        if ($this->shouldSaveAsDraft) {
            $data['status'] = LinkStatus::Draft;
        }

        if ($this->shouldSaveAsPending) {
            $data['status'] = LinkStatus::Pending;
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
            ->visible(fn (): bool => (! auth()->user()->is_admin) && $this->record->status === LinkStatus::Pending);
    }

    protected function getSaveAsPendingFormAction(): Action
    {
        return Action::make('saveAsPending')
            ->label('Submit for review')
            ->action(function (): void {
                $this->shouldSaveAsPending = true;

                $this->save();
            })
            ->color('success')
            ->visible(fn (): bool => (! auth()->user()->is_admin) && $this->record->status === LinkStatus::Draft);
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
            LinkResource\Widgets\EditLinkHeader::class,
        ];
    }
}
