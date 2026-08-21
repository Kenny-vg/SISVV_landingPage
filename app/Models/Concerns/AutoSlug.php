<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait AutoSlug
{
    protected static function bootAutoSlug(): void
    {
        static::saving(function ($model) {
            if (filled($model->slug)) {
                return;
            }

            $source = $model->getAttribute($model->slugSourceColumn());

            $base = filled($source)
                ? Str::slug((string) $source)
                : 'registro-'.Str::lower(Str::random(6));

            $model->slug = static::generateUniqueSlug($base, $model);
        });
    }

    public function slugSourceColumn(): string
    {
        return property_exists($this, 'slugSource') ? $this->slugSource : 'title';
    }

    protected static function generateUniqueSlug(string $base, $model): string
    {
        $slug = $base;
        $suffix = 2;

        while (static::query()
            ->where('slug', $slug)
            ->when($model->exists, fn ($query) => $query->whereKeyNot($model->getKey()))
            ->exists()) {
            $slug = $base.'-'.$suffix++;
        }

        return $slug;
    }
}
