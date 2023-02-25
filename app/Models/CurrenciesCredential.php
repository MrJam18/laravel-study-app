<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\Casts\RusDateTimeCast;
use App\Models\Mutators\RusDate;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property DateTime $updatedAt
 * @property string $source
 *
 */
class CurrenciesCredential extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;
    protected $fillable = [
        'updated_at',
        'source',
    ];

    protected function updatedAt(): Attribute
    {
        return RusDate::get();
    }

    public $timestamps = false;
}
