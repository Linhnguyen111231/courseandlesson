<?php

namespace Modules\Skills\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Courses\App\Models\Course;
use Modules\Skills\Database\factories\SkillFactory;

class Skill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['skill_name','skill_description'];
    
    protected static function newFactory()
    {
        //return SkillFactory::new();
    }
    public function courses()
    {
        return $this->belongsToMany( Course::class, 'course_skill');
    }
}
