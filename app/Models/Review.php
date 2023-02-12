<?php

declare(strict_types=1);
namespace App\Models;

use App\Models\Traits\RusTimeStamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property string $username;
 * @property string $text;
 * @property string $description;
 * @property string $created_at;
 * @property string $updated_at;
 */
class Review extends Model
{
    use HasFactory, RusTimeStamps;
    public $timestamps = true;
    protected $fillable = [
      'id',
      'username',
      'text',
      'description',
    ];
}
