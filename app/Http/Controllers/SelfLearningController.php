<?php

namespace App\Http\Controllers;

use App\Models\SelfLearning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Inertia\Inertia;

class SelfLearningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function website()
    {
        return Inertia::render('Trainings/Internal', [
            'selfs' => SelfLearning::all()
                ->transform(fn ($self) => [
                    'id' => $self->id,
                    'type' => $self->type,
                    'type_slug' => $self->type_slug,
                    'category' => $self->category,
                    'category_slug' => $self->category_slug,
                    'properties' => json_decode($self->properties),
                    'photo' => $self->photo_path ? URL::route('image', ['path' => $self->photo_path, 'w' => 400, 'fit' => 'fill']) : null,

                ]),
        ]);
    }
    // 'type', 'type_slug', 'category', 'category_slug', 'properties',
    
    public function index()
    {
        return Inertia::render('Admin/Training/self', [
            'selfs' => SelfLearning::all()
                ->transform(fn ($self) => [
                    'id' => $self->id,
                    'type' => $self->type,
                    'type_slug' => $self->type_slug,
                    'category' => $self->category,
                    'category_slug' => $self->category_slug,
                    'properties' => json_decode($self->properties),
                ]),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'type' => 'required',
            'title' => 'required',
            'link' => 'required'
        ]);

        $video = $request->id == 0 ? new SelfLearning : SelfLearning::findOrFail($request->id);
        $properties = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'link' => $request->link,
        ];
        $video->type = $request->type;
        $video->type_slug = Str::slug($request->type);
        $video->category = $request->category;
        $video->category_slug = Str::slug($request->category);
        $video->type = $request->type;
        $video->properties = json_encode($properties);
        if($request->photo)
            $video->photo_path = $request->photo->store('selfs');

        $video->save();

        return Redirect::route('self-learning.index')->with('success', 'Video Saved.');
    }
}
