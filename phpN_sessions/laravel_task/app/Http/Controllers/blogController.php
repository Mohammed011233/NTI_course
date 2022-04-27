<?php

namespace App\Http\Controllers;

use App\blog_DB;
use Illuminate\Http\Request;

class blogController extends Controller
{
    //
    function create()
    {
        return view('create');
    }

    function store(Request $request)
    {

        $title   = $request->title;
        $content = $request->content;
        $image   = $request->image;

        $data = $this->validate($request, [
            'title'   => "required|string",
            'content' => "required|min:50",
            'image'   => "required|file|image"
        ]);

        $extenion = $image->getClientOriginalExtension();
        $fileName = uniqid() . "." . $extenion;

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $fileName);

        blog_DB::create($data);

        setcookie('title', $title, time() + 60 * 60, "/");
        setcookie('content', $content, time() + 60 * 60, "/");
        setcookie('image', $fileName, time() + 60 * 60, "/");



        echo "Done Save Data <br>";
        echo "Title is" . $_COOKIE['title'] . "<br>";
        echo "Content is" . $_COOKIE['content'] . "<br>";
        echo "image is <br>";
        echo " <img src=" . url('images/' . $_COOKIE['image']) . " width='150px' height='150px'>";
    }
}
