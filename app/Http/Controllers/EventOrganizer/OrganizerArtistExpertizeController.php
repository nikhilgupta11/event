<?php

namespace App\Http\Controllers\EventOrganizer;

use App\Http\Controllers\Controller;
use App\Models\Expertize;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class OrganizerArtistExpertizeController extends Controller
{
  
    public function index()
    {
        $data = Expertize::where('user_id', Auth::user()->id)->get();
        return view('EventOrgnizer/Pages/ArtistExpertize/Index', compact('data'));
    }

    public function create()
    {
        return view('EventOrgnizer/Pages/ArtistExpertize/Create');
    }

    public function store(Request $request)
    {
        // print_r($request->all()); die;
        $validator = FacadesValidator::make($request->all(), [
            'expertize' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }
        if ($request->image) {
            $image = time() . '.' . request()->file('image')->getClientOriginalExtension();

            request()->image->move(public_path('Assets/images'), $image);
        } else {
            $image = "";
        }

        $data = new Expertize();
        $data->name = $request->expertize;
        $data->description = $request->description;
        $data->user_id = Auth::user()->id;
        $data->type = '2';
        $data->image = $image;
        if ($request->status == 'on') {
            $data->status = 1;
        } else {
            $data->status = 0;
        }
        $data->save();
        return redirect()->route('OrganizerArtistExpertize')
            ->with('success', 'Expertize has been created successfully.');
    }

    public function edit($id)
    {
        $data = Expertize::find($id);
        return view('EventOrgnizer/Pages/ArtistExpertize/Edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Expertize::find($id);
        if ($request->status == 'on') {
            $data->status = '1';
        } else {
            $data->status = '0';
        }

        $image = $request->hidden_Image;

        if ($request->image != '') {
            $image = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('Assets/images'), $image);
        }

        $data->name = $request->expertize;
        $data->description = $request->description;
        $data->image = $image;
        $data->save();
        return redirect()->route('OrganizerArtistExpertize')
            ->with('success', 'Artist Expertize has been updated successfully');
    }

    public function show($id)
    {
        $data = Expertize::where('id', $id)->get();
        return view('EventOrgnizer/Pages/ArtistExpertize/Show', compact('data'));
    }

    public function delete($id)
    {
        $del = Expertize::where('id', $id)->delete();
        return redirect()->route('ArtistExpertize')->with('error', 'Expertize Has Been Deleted successfully');
    }
}
