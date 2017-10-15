<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\KhanakList;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$lists = KhanakList::orderBy('created_at', 'desc')->paginate(10);

        return view('lists.index', [
            'lists' => $lists
        ]);
    }

	public function create()
	{
        return view('lists.create');
	}

	public function edit(KhanakList $list)
    {
        $grades = $list->grades;
        foreach($grades as $grade)
        {
            $grade->cost = 0;
            foreach($grade->books as $item)
            {
                $grade->cost += $item->price * $item->pivot->count;
            }
            foreach($grade->handbooks as $item)
            {
                $grade->cost += $item->price * $item->pivot->count;
            }
            foreach($grade->activities as $item)
            {
                $grade->cost += $item->price * $item->pivot->count;
            }
            foreach($grade->educationalTools as $item)
            {
                $grade->cost += $item->price * $item->pivot->count;
            }
            foreach($grade->educationalPacks as $item)
            {
                $grade->cost += $item->price * $item->pivot->count;
            }
        }
        return view('lists.edit', [
            'list' => $list,
            'grades' => $grades
        ]);
    }

	public function export(KhanakList $list)
    {
        $grades = $list->grades;
        foreach($grades as $grade)
        {
            $grade->cost = 0;
            foreach($grade->books as $item)
            {
                $grade->cost += $item->price * $item->pivot->count;
            }
            foreach($grade->handbooks as $item)
            {
                $grade->cost += $item->price * $item->pivot->count;
            }
            foreach($grade->activities as $item)
            {
                $grade->cost += $item->price * $item->pivot->count;
            }
            foreach($grade->educationalTools as $item)
            {
                $grade->cost += $item->price * $item->pivot->count;
            }
            foreach($grade->educationalPacks as $item)
            {
                $grade->cost += $item->price * $item->pivot->count;
            }
        }
        return view('lists.export', [
            'list' => $list,
            'grades' => $grades
        ]);
	}

    public function store(Request $request)
	{
        $this->validate($request, [
            'name'      => 'required|max:255',
			'budget'     => 'required|numeric'
        ]);

        $list = KhanakList::create([
            'name'          =>  $request->name,
            'budget'        =>  $request->budget,
            'description'   =>  $request->description
        ]);

        return redirect('/lists');
    }

	public function update(Request $request, KhanakList $list)
    {
        $this->validate($request, [
            'name'      => 'required|max:255',
			'budget'     => 'required|numeric'
        ]);

        $list->update([
            'name'          =>  $request->name,
            'budget'        =>  $request->budget,
            'description'   =>  $request->description
        ]);

        return redirect('/lists');
    }

	public function destroy(Request $request, KhanakList $list)
    {
        $list->delete();

        return redirect('/lists');
	}

}
