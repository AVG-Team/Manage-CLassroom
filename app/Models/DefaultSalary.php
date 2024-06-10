<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultSalary extends Model
{
    protected $table = 'default_salary';
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'salary',
    ];

    protected $appends = ['salary_formatted', 'countTeacherUsed'];

    public function getSalaryFormattedAttribute()
    {
        return price_format($this->salary);
    }

    public function getCountTeacherUsedAttribute()
    {
        return Salary::query()->where('default_salary_id', $this->id)->count();
    }
}
