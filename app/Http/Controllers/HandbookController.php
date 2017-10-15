<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Handbook;

class HandbookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$handbooks = Handbook::orderBy('name', 'asc')->paginate(10);

        return view('handbooks.index', [
            'handbooks' => $handbooks
        ]);
    }

	public function create()
	{
        return view('handbooks.create');
	}

	public function edit(Handbook $handbook)
	{
        return view('handbooks.edit', [
            'handbook' => $handbook
        ]);
	}

    public function store(Request $request)
	{
        $this->validate($request, [
            'name'      => 'required|max:255',
			'price'     => 'required|numeric'
        ]);

        $handbook = Handbook::create([
            'name'          =>  $request->name,
            'price'         =>  $request->price,
            'age_group'     =>  $request->age_group,
            'description'   =>  $request->description
        ]);

        return redirect('/handbooks');
    }

	public function update(Request $request, Handbook $handbook)
    {
        $this->validate($request, [
            'name'      => 'required|max:255',
			'price'     => 'required|numeric'
        ]);

        $handbook->update([
            'name'          =>  $request->name,
            'price'         =>  $request->price,
            'age_group'     =>  $request->age_group,
            'description'   =>  $request->description
        ]);

        return redirect('/handbooks');
    }

	public function destroy(Request $request, Handbook $handbook)
    {
        $handbook->delete();

        return redirect('/handbooks');
	}

}
