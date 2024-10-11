<?php

namespace Modules\Lessons\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Courses\App\Models\Course;
use Modules\Lessons\Database\factories\LessonFactory;

class Lesson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title','duration', 'image_url','video_url', 'slug','course_id','description'];
    
    public function course() {
        return $this->belongsTo(Course::class);
    }
    
    protected static function newFactory(): LessonFactory
    {
        //return LessonFactory::new();
    }

}
