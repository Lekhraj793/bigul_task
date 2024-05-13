<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(){
        $plans = Plan::paginate(10);
        return view('plans.list', compact('plans'));
    }

    public function create(){
            return view('plans.create');
    }

    public function store(PlanRequest $request){
        $validated = $request->validated();

        Plan::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect()->route('plans.list');
    }

    public function edit($id){
        $editData = Plan::where('id',base64_decode($id))->first();
        return view('plans.edit',compact('editData'));
    }

    public function update(PlanRequest $request, $id){
        $planUpdate = Plan::where('id',base64_decode($id))->first();

        if(!empty($planUpdate)) {
            $planUpdate->name = $request->name;
            $planUpdate->price = $request->price;
            $planUpdate->save();
            return redirect()->route('plans.list');
        }
        return redirect()->back()->withErrors('Plan not found!');
    }

    public function delete($id){
        Plan::where('id',base64_decode($id))->delete();
        return redirect()->back();
    }

    public function viewPlan($id){
        $editData = Plan::where('id',base64_decode($id))->first();
        return view('plans.view',compact('editData'));
    }
}
