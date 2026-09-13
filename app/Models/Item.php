<?php
/*
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[fillable(['documentId', 'title', 'reference', 'description', 'info', 'file_id', 'publishedAt'])]
#[casts(['info' => 'array', 'publishedAt' => 'datetime'])]
class Item extends Model
{
    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public function artists(): HasMany
    {
        return $this->hasMany(Artist::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
*/
namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class Item
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
        $keysToRemove = ['documentId', 'createdAt', 'updatedAt'];

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
