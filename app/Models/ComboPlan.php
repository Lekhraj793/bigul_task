<?php

namespace App\Models;

use App\Models\ComboPlanAndPlan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboPlan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'created_at', 'updated_at'];

    public function comboPlanAndPlan() {
        return $this->hasMany(ComboPlanAndPlan::class, 'combo_plan_id', 'id');
    }
}
