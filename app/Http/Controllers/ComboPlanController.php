<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComboPlanRequest;
use App\Models\ComboPlan;
use App\Models\Plan;
use App\Models\ComboPlanAndPlan;
use Illuminate\Http\Request;

class ComboPlanController extends Controller
{
    public function index(){
        $comboPlans = ComboPlan::paginate(10);
        return view('combo_plans.list', compact('comboPlans'));
    }

    public function create(){
        $plans = Plan::all();
        return view('combo_plans.create', compact('plans'));
    }

    public function store(ComboPlanRequest $request){
        $validated = $request->validated();

        $comboPlan = ComboPlan::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        if (!empty($comboPlan) && !empty($request->plan_id)) {
            foreach($request->plan_id as $planId) {
                ComboPlanAndPlan::create([
                    'plan_id' => $planId,
                    'combo_plan_id' => $comboPlan->id
                ]);
            }
        }

        return redirect()->route('combo_plans.list');
    }

    public function edit($id){
        $editData = ComboPlan::with('comboPlanAndPlan')->where('id',base64_decode($id))->first();
        $selectedPlanArr = [];
        if(!empty($editData->comboPlanAndPlan)) {
            foreach ($editData->comboPlanAndPlan as $planId) {
                $selectedPlanArr[] = $planId->plan_id;
            }
        }
        $plans = Plan::all();
        $selectedPlans = !empty($selectedPlanArr) ? implode(',', $selectedPlanArr) : [];
        return view('combo_plans.edit',compact('editData', 'plans', 'selectedPlans'));
    }

    public function update(ComboPlanRequest $request, $id){
        $planUpdate = ComboPlan::where('id',base64_decode($id))->first();

        if(!empty($planUpdate)) {
            $planUpdate->name = $request->name;
            $planUpdate->price = $request->price;
            $planUpdate->save();
            return redirect()->route('combo_plans.list');
        }
        return redirect()->back()->withErrors('Plan not found!');
    }

    public function delete($id){
        ComboPlan::where('id',base64_decode($id))->delete();
        return redirect()->back();
    }

    public function viewPlan($id){
        $editData = ComboPlan::where('id',base64_decode($id))->first();
        $selectedPlanArr = [];
        if(!empty($editData->comboPlanAndPlan)) {
            foreach ($editData->comboPlanAndPlan as $planId) {
                $selectedPlanArr[] = $planId->plan_id;
            }
        }
        $selectedPlans = !empty($selectedPlanArr) ? implode(',', $selectedPlanArr) : [];
        $plans = Plan::all();
        return view('combo_plans.view',compact('editData','plans','selectedPlans'));
    }
}
