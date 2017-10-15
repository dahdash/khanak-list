<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EducationalTool;

class EducationalToolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$educational_tools = EducationalTool::orderBy('name', 'asc')->paginate(10);

        return view('educational_tools.index', [
            'educational_tools' => $educational_tools
        ]);
    }

	public function create()
	{
        return view('educational_tools.create');
	}

	public function edit(EducationalTool $educational_tool)
	{
        return view('educational_tools.edit', [
            'educational_tool' => $educational_tool
        ]);
	}

    public function store(Request $request)
	{
        $this->validate($request, [
            'name'      => 'required|max:255',
			'price'     => 'required|numeric'
        ]);

        $educational_tool = EducationalTool::create([
            'name'          =>  $request->name,
            'price'         =>  $request->price,
            'age_group'     =>  $request->age_group,
            'description'   =>  $request->description
        ]);

        return redirect('/educational-tools');
    }

	public function update(Request $request, EducationalTool $educational_tool)
    {
        $this->validate($request, [
            'name'      => 'required|max:255',
			'price'     => 'required|numeric'
        ]);

        $educational_tool->update([
            'name'          =>  $request->name,
            'price'         =>  $request->price,
            'age_group'     =>  $request->age_group,
            'description'   =>  $request->description
        ]);

        return redirect('/educational-tools');
    }

	public function destroy(Request $request, EducationalTool $educational_tool)
    {
        $educational_tool->delete();

        return redirect('/educational-tools');
	}

}
