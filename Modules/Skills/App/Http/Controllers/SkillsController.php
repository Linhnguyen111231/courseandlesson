<?php

namespace Modules\Skills\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Skills\App\Http\Requests\SkillRequests;
use Modules\Skills\App\Models\Skill;
use Modules\Skills\App\Services\SkillService;

class SkillsController extends Controller
{
    protected $skillServices;
    public function __construct(SkillService $skillService){
        $this->skillServices = $skillService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        $table = [
            'col1' => 'ID',
            'col2'=>  'Skill Name',
            'col3'=>  'Description',

        ];
        return view('skills::index', compact('skills','table'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(SkillRequests $skillRequests)
    {
        $skillStatus = $this->skillServices->create($skillRequests);
        return response($skillStatus);
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
    public function show($id)
    {
        return view('skills::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('skills::edit');
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
