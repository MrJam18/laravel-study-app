<?php

declare(strict_types=1);
namespace App\Models\News;

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
 * @property int $news_source_id
 * @property NewsSource $news_source
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
        'news_source_id'
    ];
    public $timestamps = false;
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function newsSource(): BelongsTo
    {
        return $this->belongsTo(NewsSource::class);
    }
}
