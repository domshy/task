<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('announcement.announcement');
    }
    public function show()
    {
        $announcement = Announcement::all();
        return view('announcement.viewancnmnt')->with('announcement', $announcement);
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'description' => ['required'],
        ]);

        $image = array();
        if ($files = $request->file('image'))
            foreach ($files as $file) {
                $image_name = md5(rand(10, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = '/multiple_image/';
                $image_url = $upload_path . $image_full_name;
                $file->move(public_path($upload_path), $image_full_name);
                $image[] = $image_url;
            }

        $announcement = new Announcement;
        $announcement->title = $request->title;
        $announcement->description = $request->description;
        $announcement->posted_by = auth()->user()->id;
        $announcement->images = implode('|', $image);
        $announcement->save();

        Alert()->success('Succes', 'Student Successfully Added!');
        return back();
    }
}
