<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Lesson;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class TeacherLessonManage extends Component
{
    use WithMedia;
    public $mediaComponentNames = ['attachments'];

    public $attachments;

    public Lesson $lesson;

    public function render()
    {
        return view('livewire.teacher.teacher-lesson-manage');
    }

    public function save()
    {
        $this->lesson->syncFromMediaLibraryRequest($this->attachments)->toMediaCollection();
        $this->alert('success', 'Lesson attachments have been updated.', ['toast' => false, 'position' => 'center']);
    }
}
