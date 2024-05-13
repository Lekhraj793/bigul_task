<?php

namespace App\Http\Controllers;

use App\Http\Requests\EligibilityCriteriaRequest;
use App\Models\EligibilityCriteria;
use Illuminate\Http\Request;

class EligibilityCriteriaController extends Controller
{
    public function index(){
        $eligibilityCriterias = EligibilityCriteria::paginate(10);
        return view('eligibility_criteria.list', compact('eligibilityCriterias'));
    }

    public function create(){
            return view('eligibility_criteria.create');
    }

    public function store(EligibilityCriteriaRequest $request){
        $validated = $request->validated();

        EligibilityCriteria::create([
            'name' => $request->name,
            'age_less_than' => $request->age_less_than,
            'age_greater_than' => $request->age_greater_than,
            'income_less_than' => $request->income_less_than,
            'income_greater_than' => $request->income_greater_than
        ]);

        return redirect()->route('eligibility_criteria.list');
    }

    public function edit($id){
        $editData = EligibilityCriteria::where('id',base64_decode($id))->first();
        return view('eligibility_criteria.edit',compact('editData'));
    }

    public function update(EligibilityCriteriaRequest $request, $id){
        $planUpdate = EligibilityCriteria::where('id',base64_decode($id))->first();

        if(!empty($planUpdate)) {
            $planUpdate->name = $request->name;
            $planUpdate->age_less_than = $request->age_less_than;
            $planUpdate->age_greater_than = $request->age_greater_than;
            $planUpdate->income_less_than = $request->income_less_than;
            $planUpdate->income_greater_than = $request->income_greater_than;
            $planUpdate->save();

            return redirect()->route('eligibility_criteria.list');
        }
        return redirect()->back()->withErrors('Plan not found!');
    }

    public function delete($id){
        EligibilityCriteria::where('id',base64_decode($id))->delete();
        return redirect()->back();
    }

    public function viewPlan($id){
        $editData = EligibilityCriteria::where('id',base64_decode($id))->first();
        return view('eligibility_criteria.view',compact('editData'));
    }
}
