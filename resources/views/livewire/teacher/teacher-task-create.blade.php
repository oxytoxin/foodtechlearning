@section('page_title')
    Create Task > {{ $course->name }}
@endsection

@section('title')
    Creating Task for {{ $course->code }}
@endsection
<div class="mx-auto md:max-w-5xl">
    <div class="outline-primary @error("*"){{ '!bg-red-200' }}@enderror bg-white z-30 md:sticky top-0 p-4">
        <div class="md:flex-row flex flex-col md:justify-between">
            <div class="w-full">
                <h3>For Course: {{ $course->name }}</h3>
                <h3>For Section: {{ $course->section_code }}</h3>
                <div class="w-full">
                    <label for="name" class="title-sm">Name</label>
                    <input wire:model.defer="instructions" type="text" class="w-full @error('name'){{'error-outline'}}@enderror text-sm" placeholder="Task instructions...">
                    <x-error field="name" class="error-xs" />
                </div>
                <div class="w-full">
                    <label for="name" class="title-sm">Instructions</label>
                    <input wire:model.defer="name" type="text" class="w-full @error('name'){{'error-outline'}}@enderror text-sm" placeholder="Task name...">
                    <x-error field="name" class="error-xs" />
                </div>
                <h4 class="title">Deadline</h4>
                <x-datepicker wire:model="deadline"/>
            </div>
            <div>
                <label for="" class="title-sm block">Task Type</label>
                <select wire:model="task_type_id" class="text-sm">
                    @foreach ($task_types as $task_type)
                        <option class="text-sm" value="{{ $task_type->id }}">{{ strtoupper($task_type->name) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button wire:click="create_task" class="button-primary mt-4">CREATE TASK</button>
        <hr class="border border-primary-500 my-2">
        <div class="mt-4 px-4 flex justify-center items-center space-x-2">
            <h3 class="title text-center">Questions</h3>
            <button wire:click="add_question" class="button-primary">Add Question</button>
        </div>
    </div>

    @forelse($questions as $qk => $question)
        <div class="@error("questions.$qk.*"){{ '!bg-red-200' }}@enderror mt-4 bg-white outline-primary p-4">
            <div class="flex md:flex-row flex-col space-y-2 md:space-y-0 items-center mb-2 justify-between">
                <div class="flex items-center space-x-1">
                    <button wire:click="remove_question({{$qk}})"><x-gmdi-delete-r class="text-red-600"/></button>
                    <h3 class="title">Question {{ $loop->iteration }}.</h3>
                    <select wire:model="questions.{{$qk}}.type" class="text-sm">
                    @foreach ($question_types as $question_type)
                            <option class="text-sm" value="{{ $question_type }}">{{ strtoupper($question_type) }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="question_{{$qk}}_points" class="text-sm">
                    <input type="number" wire:model.lazy="questions.{{$qk}}.points" class="text-sm w-16"> pts.
                </label>
{{--                <h3 class="title-sm bg-green-400 text-gray-900 py-1 px-2 rounded-full font-semibold">{{ $question['points'] }} pts.</h3>--}}
            </div>
            <x-error field="questions.{{$qk}}.body" class="error-xs"/>
            <x-error field="questions.{{$qk}}.points" class="error-xs"/>
            <textarea wire:model.defer="questions.{{$qk}}.body" cols="30" rows="4" class="resize-none w-full text-sm" placeholder="Question content..."></textarea>
            @if (in_array($question['type'],['identification', 'enumeration']))
                <div class="my-2">
                    <form wire:submit.prevent="add_answer({{$qk}})" class="flex flex-col md:flex-row items-stretch md:space-x-2">
                        <input wire:model.lazy="questions.{{$qk}}.answer" placeholder="Possible answer..." type="text" class="text-sm flex-1">
                        <button class="button-primary text-sm">Add Answer</button>
                    </form>
                    <h3 class="title-sm">Answers Key</h3>
                    <ul class="px-4">
                        @forelse ($question['answers'] as $ak => $answer)
                            <li class="font-medium text-sm">
                                <span>> {{ $answer }}</span>
                                <button wire:click="remove_answer({{$qk}},{{$ak}})"><x-gmdi-delete-r class="text-red-600"/></button>
                            </li>
                        @empty
                            <li class="font-medium text-sm">No answers provided</li>
                        @endforelse
                    </ul>
                </div>
            @endif
            @if (in_array($question['type'],['multiple choice', 'true or false']))
            <div class="my-2">
                <form wire:submit.prevent="add_choice({{$qk}})" class="flex flex-col md:flex-row items-stretch md:space-x-2">
                    <input wire:model.lazy="questions.{{$qk}}.choice" placeholder="Question choice..." type="text" class="text-sm flex-1">
                    <button class="button-primary text-sm">Add Choice</button>
                </form>
                <h3 class="title-sm">Choices</h3>
                <ul class="flex flex-col space-y-1">
                    @forelse ($question['choices'] as $ck => $choice)
                        <label class="cursor-pointer border border-gray-900 p-2 flex items-center space-x-2" for="question_{{$qk}}_choice_{{$ck}}">
                            <input wire:model="questions.{{$qk}}.answers" value="{{$choice}}" type="checkbox" id="question_{{$qk}}_choice_{{$ck}}"><span class="flex-1">{{$choice}}</span>
                            <button wire:click="remove_choice({{$qk}},{{$ck}})"><x-gmdi-delete-r class="text-red-600"/></button>
                        </label>
                    @empty
                        <li class="font-medium text-sm">No choices provided</li>
                    @endforelse
                </ul>
            </div>
            @endif
            <label class="cursor-pointer inline-block p-2" for="question_{{$qk}}_file_required">
                <input wire:model="questions.{{$qk}}.file_required" type="checkbox" id="question_{{$qk}}_file_required"><span class="title-sm ml-2">Require File Attachment</span>
            </label>
            <div x-data="{show:false}">
                <button x-show="!show" @click="show=true" class="button-primary">Show Attachments</button>
                <button x-show="show" x-cloak @click="show=false" class="button-primary">Hide Attachments</button>
                <div x-show="show" class="mt-1" x-cloak>
                    <x-filepond multiple wire:model="questions.{{$qk}}.attachments"/>
                </div>
            </div>
        </div>
    @empty
        <div class="mt-4 outline-primary p-4">
            <h3 class="title text-center">No questions created.</h3>
        </div>
    @endforelse
</div>
