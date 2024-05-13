<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibilityCriteria extends Model
{
    use HasFactory;

    protected $table = 'eligibility_criteria';

    protected $fillable = ['name', 'age_less_than', 'age_greater_than', 'last_login_days_ago', 'income_less_than', 'income_greater_than', 'created_at', 'updated_at'];
}