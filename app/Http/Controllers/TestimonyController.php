<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Testimony;

class TestimonyController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function getAll()
  {
    $testimonies = Testimony::orderBy('created_at','desc')->get();
    foreach ($testimonies as $testimony) {
      $testimony->picture = Storage::url($testimony->picture);
    }
    return view('admin.testimony', compact('testimonies'));
  }

  public function add()
  {
    return view('admin.add-testimony');
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
        'name' => 'string',
        'occupation' => 'string',
        'origin' => 'string',
        'testimony' => 'string',
        'photo' => 'image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $testimony = new Testimony;
    $testimony->name = $request->name;
    $testimony->occupation = $request->occupation;
    $testimony->origin = $request->origin;
    $testimony->testimony = $request->testimony;
    $testimony->picture = $request->file('photo')->store('public/testimonies');
    $testimony->save();

    return redirect()->route('show-testimony');
  }

  public function getOne($id)
  {
    $testimony = Testimony::findOrFail($id);
    $testimony->picture = Storage::url($testimony->picture);
    return view('admin.edit-testimony', compact('testimony'));
  }

  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
        'name' => 'string',
        'occupation' => 'string',
        'origin' => 'string',
        'testimony' => 'string',
        'photo' => 'image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $testimony = Testimony::findOrFail($id);
    $testimony->name = $request->name;
    $testimony->occupation = $request->occupation;
    $testimony->origin = $request->origin;
    $testimony->testimony = $request->testimony;
    Storage::delete($testimony->picture);
    $testimony->picture = $request->file('photo')->store('public/testimonies');
    $testimony->save();

    return redirect()->route('show-testimony');
  }

  public function delete($id)
  {
    $testimony = Testimony::findOrFail($id);
    Storage::delete($testimony->picture);
    $testimony->forceDelete();

    return redirect()->route('show-testimony');
  }

}
