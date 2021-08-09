<?php

namespace App\Http\Livewire\Student;

use App\Models\Lesson;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;

class StudentLessonView extends Component
{
    public Lesson $lesson;
    public Media $current_attachment;

    public function render()
    {
        return view('livewire.student.student-lesson-view',[
            'attachments' => $this->lesson->getMedia(),
        ]);
    }

    public function preview_attachment(Media $attachment)
    {
        $this->current_attachment = $attachment;
        $this->dispatchBrowserEvent('open-preview');
    }

    public function mount()
    {
       $course = auth()->user()?->classes()->whereHas('lessons', function ($query){
           $query->where('id', $this->lesson->id);
       })->first();
       if (!$course){
           abort(403);
       }
    }

}
