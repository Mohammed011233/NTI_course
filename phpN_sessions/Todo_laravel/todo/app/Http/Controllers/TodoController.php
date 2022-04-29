<?php

namespace App\Http\Controllers;

use App\todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkExpiredDate')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = todo::all();
        return view('todo.tasks' ,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        //
        $data = $this->validate($request,[
            "title"   => "required|min:5",
            "content" => "required|min:15",
            "image"   => "required|image|mimes:png,jpg",
            "start_date" => "required|date|after_or_equal:today",
            "end_date" => "required|date|after_or_equal:start_date"
        ]);


         # Rename Image ....
         $FinalName = uniqid() . '.' . $request->image->extension();

         if ($request->image->move(public_path('/task_image'), $FinalName)) {
             $data['image'] = $FinalName;
         }


         $op =   DB :: table('todo')->insert($data);

         if($op){
             $message = "Raw Inserted";
         }else{
             $message = "Error Try Again";
         }

         session()->flash('Message',$message);

         return redirect(url('/ToDo'));



        // $stor_data = todo::create($data);

        // if($stor_data){
        //     return redirect('/ToDo');
        // }else{
        //     dd('error');
        // }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        todo::destroy($id);

       return redirect(url('/ToDo'));
    }
}
