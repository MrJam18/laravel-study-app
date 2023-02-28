<?php

declare(strict_types=1);
namespace App\Models\News;

use App\Models\Traits\RusTimeStamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $url
 * @property string $id
 */
class NewsSource extends Model
{
    use HasFactory, RusTimeStamps;
    protected $fillable = [
        'id',
        'url'
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }

    public $timestamps = true;
}
