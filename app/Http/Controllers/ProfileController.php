<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);
        return view('profile.show', compact('user'));
    }

    public function edit()
{
    $user = Auth::user();
    return view('profile.edit', ['user' => $user]);
}
public function update(Request $request)
{
    $request->validate([
        'bio' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
        'phone_number' => 'nullable|string',
        'website' => 'nullable|url',
        'profession' => 'nullable|string',
        'interests' => 'nullable|string',
        'location' => 'nullable|string',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'instagram' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user = Auth::user();
    $user->bio = $request->bio;
    $user->date_of_birth = $request->date_of_birth;
    $user->phone_number = $request->phone_number;
    $user->website = $request->website;
    $user->profession = $request->profession;
    $user->interests = $request->interests;
    $user->location = $request->location;
    $user->facebook = $request->facebook;
    $user->twitter = $request->twitter;
    $user->instagram = $request->instagram;
    $user->linkedin = $request->linkedin;

    if ($request->hasFile('profile_photo_path')) {
        $image = $request->file('profile_photo_path');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        
        if ($user->profile_photo_path) {
            File::delete(public_path('/images/' . $user->profile_photo_path));
        }

        $user->profile_photo_path = $name;
    }

    $user->save();

    return redirect()->route('profile.show', $user);
}


}
