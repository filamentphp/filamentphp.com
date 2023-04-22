<?php

namespace App\Filament\Resources\PluginResource\Pages;

use App\Enums\PluginStatus;
use App\Filament\Resources\PluginResource;
use Filament\Pages\Actions\Action;
use Filament\Pages\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPlugin extends EditRecord
{
    protected static string $resource = PluginResource::class;

    protected bool $shouldSaveAsDraft = false;

    protected bool $shouldSaveAsPending = false;

    protected function afterSave(): void
    {
        $this->emit('pluginUpdated', ['link' => $this->record]);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (auth()->user()->is_admin) {
            return $data;
        }

        if ($this->shouldSaveAsDraft) {
            $data['status'] = PluginStatus::Draft;
        }

        if ($this->shouldSaveAsPending) {
            $data['status'] = PluginStatus::Pending;
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
            ->visible(fn (): bool => (! auth()->user()->is_admin) && $this->record->status === PluginStatus::Pending);
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
            ->visible(fn (): bool => (! auth()->user()->is_admin) && $this->record->status === PluginStatus::Draft);
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

    protected function getActions(): array
    {
        return [
            ViewAction::make()
                ->label('Preview on our website')
                ->openUrlInNewTab()
                ->url(route('plugins.view', ['plugin' => $this->record])),
            ...parent::getActions(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PluginResource\Widgets\EditPluginHeader::class,
        ];
    }
}
