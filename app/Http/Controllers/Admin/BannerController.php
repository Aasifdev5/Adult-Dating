<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    public function index()
    {
        if (Session::has('LoggedIn')) {


            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $banners = Banner::all();
            return view('admin.banners.index', compact('banners', 'user_session'));
        }
    }

    public function create()
    {
        if (Session::has('LoggedIn')) {


            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            return view('admin.banners.create', compact('user_session'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/banners'), $imageName);

        Banner::create([
            'title' => $request->title,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully');
    }
    public function edit($id)
    {
        if (Session::has('LoggedIn')) {


            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $banner = Banner::findOrFail($id);
            return view('admin.banners.edit', compact('banner', 'user_session'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = Banner::findOrFail($id);

        $banner->title = $request->title;

        if ($request->hasFile('image')) {
            // Delete old image
            $oldImagePath = public_path('images/banners/' . $banner->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/banners'), $imageName);
            $banner->image = $imageName;
        }

        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully');
    }
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Delete the associated image file
        $imagePath = public_path('images/banners/' . $banner->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the banner from the database
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully');
    }
}
