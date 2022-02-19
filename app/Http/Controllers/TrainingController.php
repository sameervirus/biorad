<?php

namespace App\Http\Controllers;

use App\Models\SelfLearning;
use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use Illuminate\Support\Str;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function website()
    {
        return Inertia::render('Trainings/Index', [
            'filters' => Request::all('search', 'category'),
            'trainings' => Training::filter(Request::only('search', 'category'))
                ->whereDate('training_date', '>', Carbon::yesterday())
                ->orderBy('training_date')
                ->get()
                ->transform(fn ($training) => [
                    'id' => $training->id,
                    'name' => $training->name,
                    'category' => $training->category,
                    'category_slug' => $training->category_slug,
                    'type' => $training->type,
                    'by' => $training->by,
                    'area' => $training->area,
                    'short_desc' => $training->short_desc,
                    'description' => $training->description,
                    'training_date' => $training->training_date,
                    'training_time' => $training->training_time,
                    'photo' => $training->photo_path ? URL::route('image', ['path' => $training->photo_path, 'h' => 200, 'fit' => 'fill']) : null
                ]),
                'selfs' => SelfLearning::select('type_slug', 'type')->groupBy('type_slug', 'type')->get()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Training/Index', [
            'filters' => Request::all('search'),
            'trainings' => Training::filter(Request::only('search'))
                ->paginate(15)
                ->withQueryString()
                ->through(fn ($training) => [
                    'id' => $training->id,
                    'name' => $training->name,
                    'category' => $training->category,
                    'category_slug' => $training->category_slug,
                    'type' => $training->type,
                    'by' => $training->by,
                    'area' => $training->area,
                    'short_desc' => $training->short_desc,
                    'description' => $training->description,
                    'training_date' => $training->training_date,
                    'training_time' => $training->training_time
                ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Training/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // 'name', 'type', 'by', 'area', 'training_date', 'training_time', 'description'
        Request::validate([
            'name' => ['required', 'max:250'],
            'category' => ['required', 'max:250'],
            'type' => ['nullable'], 
            'by' => ['nullable'],
            'area' => ['nullable'],
            'training_date' => ['required'],
            'training_time' => ['required'],
            'short_desc' => ['nullable'],
            'description' => ['nullable'],
            'photo' => ['nullable', 'image'],
        ]);

        Training::create([
            'name' => Request::get('name'),
            'category' => Request::get('category'),
            'category_slug' => Str::slug(Request::get('category')),
            'type' => Request::get('type'),
            'by' => Request::get('by'),
            'area' => Request::get('area'),
            'training_date' => date('Y-m-d', strtotime(Request::get('training_date'))),
            'training_time' => Request::get('training_time'),
            'short_desc' => Request::get('short_desc'),
            'description' => Request::get('description'),
            'photo_path' => Request::file('photo') ? Request::file('photo')->store('trainings') : null,
        ]);

        return Redirect::route('trainings.index')->with('success', 'Training created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        return Inertia::render('Admin/Training/Edit', [
            'training' => [
                'id' => $training->id,
                'name' => $training->name,
                'category' => $training->category,
                'category_slug' => $training->category_slug,
                'type' => $training->type,
                'by' => $training->by,
                'area' => $training->area,
                'short_desc' => $training->short_desc,
                'description' => $training->description,
                'training_date' => $training->training_date,
                'training_time' => $training->training_time,
                'photo' => $training->photo_path ? URL::route('image', ['path' => $training->photo_path, 'w' => 300, 'h' => 300, 'fit' => 'fill']) : null,
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        // 'name', 'type', 'by', 'area', 'training_date', 'training_time', 'description'
        Request::validate([
            'name' => ['required', 'max:250'],
            'category' => ['required', 'max:250'],
            'type' => ['nullable'],
            'by' => ['nullable'],
            'area' => ['nullable'],
            'training_date' => ['required'],
            'training_time' => ['required'],
            'short_desc' => ['nullable'],
            'description' => ['nullable'],
            'photo' => ['nullable', 'image'],
        ]);

        $training->update(Request::only('name','category','type', 'by', 'area', 'training_time', 'short_desc','description'));
        $training->update(['training_date' => date('Y-m-d', strtotime(Request::get('training_date')))]);
        $training->update(['category_slug' => Str::slug('category')]);

        if (Request::file('photo')) {
            $training->update(['photo_path' => Request::file('photo')->store('trainings')]);
        }

        return Redirect::route('trainings.index')->with('success', 'Training updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        if($training->delete()) {
            Storage::delete($training->photo_path);
        }
        return Redirect::route('trainings.index')->with('success', 'Training deleted.');
    }
}
