<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Activity;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$activities = Activity::orderBy('name', 'asc')->paginate(10);

        return view('activities.index', [
            'activities' => $activities
        ]);
    }

	public function create()
	{
        return view('activities.create');
	}

	public function edit(Activity $activity)
	{
        return view('activities.edit', [
            'activity' => $activity
        ]);
	}

    public function store(Request $request)
	{
        $this->validate($request, [
            'name'      => 'required|max:255',
			'price'     => 'required|numeric'
        ]);

        $activity = Activity::create([
            'name'          =>  $request->name,
            'price'         =>  $request->price,
            'age_group'     =>  $request->age_group,
            'description'   =>  $request->description
        ]);

        return redirect('/activities');
    }

	public function update(Request $request, Activity $activity)
    {
        $this->validate($request, [
            'name'      => 'required|max:255',
			'price'     => 'required|numeric'
        ]);

        $activity->update([
            'name'          =>  $request->name,
            'price'         =>  $request->price,
            'age_group'     =>  $request->age_group,
            'description'   =>  $request->description
        ]);

        return redirect('/activities');
    }

	public function destroy(Request $request, Activity $activity)
    {
        $activity->delete();

        return redirect('/activities');
	}

}
