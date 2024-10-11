<?php

namespace Modules\Lessons\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Courses\App\Models\Course;
use Modules\Lessons\App\Services\LessonService;

class LessonsController extends Controller
{
    protected $lessonService;
    public function __construct(LessonService $lessonService) {
        $this->lessonService = $lessonService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('lessons::index');
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lessons::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createLesson = $this->lessonService->create($request);
        return response($createLesson);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('lessons::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('lessons::edit');
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
