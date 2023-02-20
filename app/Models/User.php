<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Traits\RusTimeStamps;
use Illuminate\Database\Eloquent\Casts\Attribute;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id;
 * @property string $name;
 * @property string $email;
 * @property string $password;
 * @property DateTime $email_verified_at
 * @property string $remember_token;
 * @property DateTime $created_at;
 * @property DateTime $updated_at;
 * @property bool $is_admin;
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, RusTimeStamps;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean'
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Hash::make($value),
        );
    }

    public function getReadableIsAdmin(): string
    {
        if($this->is_admin) return 'да';
        else return 'нет';
    }
}
