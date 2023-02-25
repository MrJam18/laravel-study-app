<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property float $rate
 * @property int $nominal
 * @property string $name
 * @property string $charCode
 */
class Currency extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'rate',
        'nominal',
        'name',
        'char_code'
    ];
    public $timestamps = false;

    protected $casts = [
        'id' => 'string',
        'rate' => MoneyCast::class,
    ];
}
