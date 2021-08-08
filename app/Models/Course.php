<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function getReadableDateCreatedAttribute()
    {
        return $this->created_at->format('M d, Y h:i a');
    }

    public function getReadableDateDeletedAttribute()
    {
        return $this->deleted_at->format('M d, Y h:i a');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user')->withTimestamps();
    }

    public function teacher(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
