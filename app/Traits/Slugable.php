<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Slugable
{
    /**
     * Generate a unique slug from the given attribute.
     *
     * @param string $value
     * @param string $field
     * @return string
     */
    public function generateSlug(string $value, string $field = 'slug'): string
    {
        $slug = Str::slug($value);
        $model = get_class($this);

        // Check if slug already exists
        $count = $model::where($field, 'like', $slug . '%')
            ->where('id', '!=', $this->id ?? 0)
            ->count();

        if ($count > 0) {
            // Append a unique number to make it unique
            $slug = $slug . '-' . ($count + 1);
        }

        return $slug;
    }

    /**
     * Boot the trait.
     * This will automatically generate slug when creating or updating.
     */
    public static function bootSlugable(): void
    {
        static::creating(function ($model) {
            $model->generateAndSetSlug();
        });

        static::updating(function ($model) {
            // Only regenerate slug if the source field changed
            $sourceField = $model->getSlugSourceField();
            if ($model->isDirty($sourceField)) {
                $model->generateAndSetSlug();
            }
        });
    }

    /**
     * Get the source field that should be used to generate the slug.
     * Override this in your model.
     *
     * @return string
     */
    protected function getSlugSourceField(): string
    {
        // Default: assume the model has a 'title' or 'nama' field
        if (isset($this->fillable) && in_array('title', $this->fillable)) {
            return 'title';
        }
        if (isset($this->fillable) && in_array('nama', $this->fillable)) {
            return 'nama';
        }

        return 'title';
    }

    /**
     * Generate and set the slug attribute.
     */
    protected function generateAndSetSlug(): void
    {
        $sourceField = $this->getSlugSourceField();

        if (!empty($this->$sourceField)) {
            $this->slug = $this->generateSlug($this->$sourceField);
        }
    }
}
