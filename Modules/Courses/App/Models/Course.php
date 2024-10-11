<?php

namespace Modules\Courses\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Courses\Database\factories\CourseFactory;
use Modules\Skills\App\Models\Skill;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Modules\Lessons\App\Models\Lesson;

class Course extends Model
{
    use HasFactory, MediaAlly;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title','tags','duration','description','image_url','slug','price','status','video_url'];
    
    protected static function newFactory()
    {
        //return CourseFactory::new();
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'course_skill');
    }
    public function lessons() {
        return $this->hasMany(Lesson::class);
    }
}
