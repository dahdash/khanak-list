<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\KhanakList;
use App\Book;
use App\Handbook;
use App\Activity;
use App\EducationalTool;
use App\EducationalPack;
use App\Grade;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function create(KhanakList $list)
    {
        return view('grades.create', [
            'list' => $list
        ]);
    }

	public function edit(Grade $grade)
    {
        return view('grades.edit', [
            'grade' => $grade
        ]);
    }

	public function books(Grade $grade)
    {
        $grade_books_ids = array();
        $grade_books_counts = array();
        foreach ($grade->books as $book)
        {
            $grade_books_ids[] = $book->id;
            $grade_books_counts[$book->id] = $book->pivot->count;
        }

        return view('grades.books', [
            'grade' => $grade,
            'books' => Book::orderBy('priority', 'asc')->get(),
            'grade_books_ids' => $grade_books_ids,
            'grade_books_counts' => $grade_books_counts
        ]);
	}

	public function handbooks(Grade $grade)
    {
        $grade_handbooks_ids = array();
        $grade_handbooks_counts = array();
        foreach ($grade->handbooks as $handbook)
        {
            $grade_handbooks_ids[] = $handbook->id;
            $grade_handbooks_counts[$handbook->id] = $handbook->pivot->count;
        }

        return view('grades.handbooks', [
            'grade' => $grade,
            'handbooks' => Handbook::orderBy('name', 'asc')->get(),
            'grade_handbooks_ids' => $grade_handbooks_ids,
            'grade_handbooks_counts' => $grade_handbooks_counts
        ]);
	}

	public function activities(Grade $grade)
    {
        $grade_activities_ids = array();
        $grade_activities_counts = array();
        foreach ($grade->activities as $activity)
        {
            $grade_activities_ids[] = $activity->id;
            $grade_activities_counts[$activity->id] = $activity->pivot->count;
        }

        return view('grades.activities', [
            'grade' => $grade,
            'activities' => Activity::orderBy('name', 'asc')->get(),
            'grade_activities_ids' => $grade_activities_ids,
            'grade_activities_counts' => $grade_activities_counts
        ]);
	}

	public function educationalTools(Grade $grade)
    {
        $grade_educational_tools_ids = array();
        $grade_educational_tools_counts = array();
        foreach ($grade->educationalTools as $educational_tool)
        {
            $grade_educational_tools_ids[] = $educational_tool->id;
            $grade_educational_tools_counts[$educational_tool->id] = $educational_tool->pivot->count;
        }

        return view('grades.educational_tools', [
            'grade' => $grade,
            'educational_tools' => EducationalTool::orderBy('name', 'asc')->get(),
            'grade_educational_tools_ids' => $grade_educational_tools_ids,
            'grade_educational_tools_counts' => $grade_educational_tools_counts
        ]);
	}

	public function educationalPacks(Grade $grade)
    {
        $grade_educational_packs_ids = array();
        $grade_educational_packs_counts = array();
        foreach ($grade->educationalPacks as $educational_pack)
        {
            $grade_educational_packs_ids[] = $educational_pack->id;
            $grade_educational_packs_counts[$educational_pack->id] = $educational_pack->pivot->count;
        }

        return view('grades.educational_packs', [
            'grade' => $grade,
            'educational_packs' => EducationalPack::orderBy('name', 'asc')->get(),
            'grade_educational_packs_ids' => $grade_educational_packs_ids,
            'grade_educational_packs_counts' => $grade_educational_packs_counts
        ]);
	}

	public function store(Request $request, KhanakList $list)
    {
        $this->validate($request, [
            'name'          => 'required|max:255',
			'class_count'   => 'required|numeric',
			'student_count'   => 'required|numeric'
        ]);

        $list->grades()->create([
            'name'          =>  $request->name,
            'class_count'   =>  $request->class_count,
            'student_count' =>  $request->student_count,
            'description'   =>  $request->description
        ]);

        return redirect('/lists/edit/'.$list->id);
    }

	public function update(Request $request, Grade $grade)
    {
        $this->validate($request, [
            'name'      => 'required|max:255',
			'class_count'   => 'required|numeric',
			'student_count'   => 'required|numeric'
        ]);

        $grade->update([
            'name'          =>  $request->name,
            'class_count'   =>  $request->class_count,
            'student_count' =>  $request->student_count,
            'description'   =>  $request->description
        ]);

        return redirect('/lists/edit/'.$grade->khanak_list_id);
    }

    public function updateBooks(Request $request, Grade $grade)
    {
        if(count($request->checkbox) > 0)
        {
            $to_sync = array();
            foreach($request->checkbox as $related_id)
            {

                $to_sync[$related_id] = ['count' => $request->{"count-$related_id"}];
            }
            $grade->books()->sync($to_sync);
        }
        else
        {
            $grade->books()->detach();
        }
        return redirect('/grades/edit/'.$grade->id);

    }

    public function updateHandbooks(Request $request, Grade $grade)
    {
        if(count($request->checkbox) > 0)
        {
            $to_sync = array();
            foreach($request->checkbox as $related_id)
            {

                $to_sync[$related_id] = ['count' => $request->{"count-$related_id"}];
            }
            $grade->handbooks()->sync($to_sync);
        }
        else
        {
            $grade->handbooks()->detach();
        }
        return redirect('/grades/edit/'.$grade->id);

    }

    public function updateActivities(Request $request, Grade $grade)
    {
        if(count($request->checkbox) > 0)
        {
            $to_sync = array();
            foreach($request->checkbox as $related_id)
            {

                $to_sync[$related_id] = ['count' => $request->{"count-$related_id"}];
            }
            $grade->activities()->sync($to_sync);
        }
        else
        {
            $grade->activities()->detach();
        }
        return redirect('/grades/edit/'.$grade->id);

    }

    public function updateEducationalTools(Request $request, Grade $grade)
    {
        if(count($request->checkbox) > 0)
        {
            $to_sync = array();
            foreach($request->checkbox as $related_id)
            {

                $to_sync[$related_id] = ['count' => $request->{"count-$related_id"}];
            }
            $grade->educationalTools()->sync($to_sync);
        }
        else
        {
            $grade->educationalTools()->detach();
        }
        return redirect('/grades/edit/'.$grade->id);

    }

    public function updateEducationalPacks(Request $request, Grade $grade)
    {
        if(count($request->checkbox) > 0)
        {
            $to_sync = array();
            foreach($request->checkbox as $related_id)
            {

                $to_sync[$related_id] = ['count' => $request->{"count-$related_id"}];
            }
            $grade->educationalPacks()->sync($to_sync);
        }
        else
        {
            $grade->educationalPacks()->detach();
        }
        return redirect('/grades/edit/'.$grade->id);

    }

	public function destroy(Request $request, Grade $grade)
    {
        $grade->delete();

        return redirect('/lists/edit/'.$grade->khanak_list_id);
	}


}
