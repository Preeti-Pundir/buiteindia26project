<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\plan;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plan.index',compact('plans'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plan.create');
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan = Plan::create([
            'name'=> $request->name,
            'strip_plan' => $request->strip_plan,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);
        return redirect()->back()->with('sucess','your plan added succesfully added');
    }

 
    public function show(plan $plan, Request $request)
    {
        if($request->user()->subscribedToPlan($plan->stripe_plan, 'main')) {
            return redirect()->route('store')->with('success', 'You have already subscribed the plan');
        }
        return view('admin.plans.show',compact('plans'));
       // return view('admin.plan.show',compact('plans'));
       
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plans = Plan::all($id);
        return view('admin.plan.edit',compact('plans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,plan $plan)
    {
        $plan->update([
            'name'=> $request->name,
            'strip_plan' => $request->strip_plan,
            'slug' => $request->slug,
            'description' => $request->description,  
        ]);
        return redirect()->back()->with('success', 'Plan successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,plan $plan)
    {
        $plan->delete($id);
        return redirect()->back();
    }
}
