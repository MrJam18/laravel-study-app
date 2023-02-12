<?php

declare(strict_types=1);
namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 */
class NewsSource extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public $timestamps = true;
}
