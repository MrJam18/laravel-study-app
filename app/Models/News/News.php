<?php

declare(strict_types=1);
namespace App\Models\News;

use App\Models\Casts\RusDateTimeCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int|string $id
 * @property string $title
 * @property string $description
 * @property string $created_at
 * @property string $text
 * @property int $category_id
 * @property Category $category
 * @property string $link
 * @property int $guid
 *
 */
class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'text',
        'created_at',
        'category_id',
        'link',
        'guid'
    ];
    public $timestamps = false;
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    protected $casts = [
        'created_at' => RusDateTimeCast::class
    ];
}
