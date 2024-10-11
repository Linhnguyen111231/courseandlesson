<?php

namespace Modules\Courses\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Cloudinary\Cloudinary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Courses\App\Http\Requests\CourseRequests;
use Modules\Courses\App\Models\Course;
use Modules\Courses\App\Services\CourseService;
use Modules\Skills\App\Models\Skill;
use Illuminate\Support\Str;


class CoursesController extends Controller
{
    protected $courseService;
    public function __construct(CourseService $courseService) {
        $this->courseService = $courseService;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courses::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        return view('courses::create',compact('skills'));
    }
    public function search(Request $request) {
        $courses = Course::select('id','title')->where('title', 'like', '%' . $request->input('search') . '%')->get();
        return response(['status'=>200, 'courses'=>$courses]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequests $request)
    {
        $createCourse = $this->courseService->create($request);
        return response($createCourse);    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('courses::edit');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('courses::edit');
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
