<?php

namespace Modules\Learning\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Courses\App\Models\Course;
use Modules\Lessons\App\Models\Lesson;

class LearningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('learning::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('learning::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($slug)
    {
        $slugLesson = request('lesson');
        $course = Course::with(['lessons'=> function ($query) {
            $query->select('title', 'duration','slug','course_id');
        }])->where('slug', $slug)->firstOrFail();
        $lesson = Lesson::where('slug', $slugLesson)->firstOrFail();
        return view('learning::show', compact('course', 'lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('learning::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
