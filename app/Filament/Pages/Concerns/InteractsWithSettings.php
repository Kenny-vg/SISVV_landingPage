<?php

namespace App\Filament\Pages\Concerns;

use App\Models\Setting;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;

trait InteractsWithSettings
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(Setting::pluck('value', 'key')->toArray());
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            if (in_array($key, $this->getRichTextKeys(), true)) {
                $value = sanitize_html($value);
            } elseif (in_array($key, $this->getUrlKeys(), true)) {
                $value = safe_url((string) $value);
            } elseif (in_array($key, $this->getIframeKeys(), true)) {
                $value = safe_iframe_src((string) $value);
            }

            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        Notification::make()
            ->title('Guardado correctamente')
            ->success()
            ->send();
    }

    protected function getRichTextKeys(): array
    {
        return [];
    }

    protected function getUrlKeys(): array
    {
        return [];
    }

    protected function getIframeKeys(): array
    {
        return [];
    }
}