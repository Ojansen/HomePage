<?php

namespace App\Http\Controllers;

use App\User;
use App\Bookmark;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class StartController extends Controller
{
    public function Index()
    {
    	$user = Auth::user();
    	$bookmarks = Bookmark::where('userId', $user->id)->get();
    	// dd(Bookmark::find($user->id));
    	$group = collect($bookmarks)->groupBy('category');
    	// dd($group);
        $colors = collect([1 => '#2CBB00', 2 => '#FFBB00', 3 => '#ff730e', 4 => '#7B0099', 5 => '#146EB4', 6 => '#ED1C16']);
        $colors = $colors->random();
    	return view('/Home.index', compact('bookmarks', 'group', 'colors'));
    }

    public function Add(Request $request)
    {
    	$bookmark = new Bookmark;
    	$bookmark->userId = Auth::id();
    	$bookmark->href = $request->input('href');
    	$bookmark->label = $request->input('label');
    	if (is_null($request->input('category'))) {
    		$bookmark->category = $request->input('newCategory');
    	} else {
    		$bookmark->category = $request->input('category');
    	}
    	$bookmark->save();
    	return redirect()->route('home');
    }

    public function Remove($id)
    {
        // dd("hoi");
    	$bookmark = Bookmark::where('id', $id);
    	$bookmark->delete();
    	return redirect()->route('home');
    }
}
