<?php
namespace Modules\Skills\App\Services;

use Modules\Skills\App\Models\Skill;

/*
* Class: SkillService
*/
class SkillService{
    public function create($request){
        try {
            $skill = new Skill();
            $skill->skill_name = $request->input('skill_name');
            $skill->skill_description = $request->input('skill_description');
            $skill->save();
            return  [
                'success'=>200,
                'status' => 'Success',
                'message' => 'Add Skill Success!',

             ];

        } catch (\Throwable $th) {
             return  [
                'er'=>$th,
                'status' => 'error',
                'message' => 'Xảy ra lỗi.',
             ];
        }
    }

}