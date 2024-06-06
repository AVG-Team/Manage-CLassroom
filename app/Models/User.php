<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\PasswordResetTokenStatus;
use Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasUuids;
    use HasApiTokens, HasFactory, Notifiable, softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'birthday',
        'gender',
        'role',
        'remember_token',
        'email_verified_at',
    ];

    public $timestamps = true;
    protected $primaryKey = 'uuid';

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
        'password' => 'hashed',
        'uuid' => 'string'
    ];

    protected function keyLevel(): Attribute
    {
        return Attribute::get(function () {
            $value = $this->level ?? 0;
            return PasswordResetTokenStatus::getKeyByValue($value);
        });
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function exercises(): HasMany
    {
        return $this->hasMany(Execrise::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function salaries(): HasMany
    {
        return $this->hasMany(Salary::class);
    }

    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'classroom_details', 'user_id', 'classroom_id')
            ->withPivot('status')
            ->withTimestamps();
    }
}
