<?php

declare(strict_types=1);
namespace App\Models;

use App\Models\Traits\RusTimeStamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 * @property string $description
 */
class NewsSourceRequest extends Model
{
    use HasFactory, RusTimeStamps;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'text',
        'description'
    ];
    public $timestamps = true;
    protected $table = 'news_sources_requests';
}
