<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EducationalPack;

class EducationalPackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$educational_packs = EducationalPack::orderBy('name', 'asc')->paginate(10);

        return view('educational_packs.index', [
            'educational_packs' => $educational_packs
        ]);
    }

	public function create()
	{
        return view('educational_packs.create');
	}

	public function edit(EducationalPack $educational_pack)
	{
        return view('educational_packs.edit', [
            'educational_pack' => $educational_pack
        ]);
	}

    public function store(Request $request)
	{
        $this->validate($request, [
            'name'      => 'required|max:255',
			'price'     => 'required|numeric'
        ]);

        $educational_pack = EducationalPack::create([
            'name'          =>  $request->name,
            'price'         =>  $request->price,
            'age_group'     =>  $request->age_group,
            'description'   =>  $request->description
        ]);

        return redirect('/educational-packs');
    }

	public function update(Request $request, EducationalPack $educational_pack)
    {
        $this->validate($request, [
            'name'      => 'required|max:255',
			'price'     => 'required|numeric'
        ]);

        $educational_pack->update([
            'name'          =>  $request->name,
            'price'         =>  $request->price,
            'age_group'     =>  $request->age_group,
            'description'   =>  $request->description
        ]);

        return redirect('/educational-packs');
    }

	public function destroy(Request $request, EducationalPack $educational_pack)
    {
        $educational_pack->delete();

        return redirect('/educational-packs');
    }

}
