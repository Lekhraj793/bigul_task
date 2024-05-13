<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboPlanAndPlan extends Model
{
    use HasFactory;

    protected $fillable = ['plan_id', 'combo_plan_id'];
}
