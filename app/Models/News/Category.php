<?php

declare(strict_types=1);
namespace App\Models\News;

use App\Models\Traits\RusTimeStamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property NewsSource $newsSource
 */
class Category extends Model
{
    use HasFactory, RusTimeStamps;
    protected $fillable = [
        'id',
        'name',
        'description',
        'title',
        'created_at',
        'updated_at'
    ];
    public function newsSource(): BelongsTo
    {
        return $this->belongsTo(NewsSource::class);
    }
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
    public $timestamps = true;
}
