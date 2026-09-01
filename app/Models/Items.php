<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class Items
{
    /**
     * Read and parse all items from the items.json file.
     *
     * @return Collection
     */
    public static function all(): Collection
    {
        // Adjust the path if your file is located elsewhere (e.g., storage_path('app/items.json'))
        $filePath = base_path('items.json');

        if (!File::exists($filePath)) {
            return collect();
        }

        $jsonContent = File::get($filePath);
        $data = json_decode($jsonContent, true);

        // Ensure we always return a collection array structure
        if (empty($data)) {
            return collect();
        }

        // Wrap single root object in an array if items.json contains a single item
        if (array_key_exists('title', $data) || array_key_exists('id', $data)) {
            $data = [$data];
        }

        return collect($data)->map(fn($item) => self::sanitize($item));
    }

    /**
     * Recursively remove 'id', 'documentId', 'createdAt', and 'updatedAt' fields.
     */
    protected static function sanitize(array $data): array
    {
        $keysToRemove = ['id', 'documentId', 'createdAt', 'updatedAt'];

        foreach ($data as $key => $value) {
            if (in_array($key, $keysToRemove, true)) {
                unset($data[$key]);
                continue;
            }

            if (is_array($value)) {
                $data[$key] = self::sanitize($value);
            }
        }

        return $data;
    }
}
