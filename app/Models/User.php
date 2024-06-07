<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRoleEnum;
use App\Traits\FullTextSearch;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasUuids, HasApiTokens, HasFactory, Notifiable, softDeletes, FullTextSearch;

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

    protected $appends = ['key_role'];

    protected $searchable = [
        'name'
    ];

    protected function keyRole(): Attribute
    {
        return Attribute::make(
            get: fn () => UserRoleEnum::getKeyByValue($this->role),
        );
    }

    protected function age(): Attribute
    {
        return Attribute::make(
            get: fn () => now()->diffInYears($this->birthday)+1,
        );
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
        return $this->belongsToMany(Classroom::class, 'classroom_details')
            ->withPivot('status')
            ->withTimestamps();
    }
}
