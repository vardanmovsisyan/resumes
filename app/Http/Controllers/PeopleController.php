<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' =>'required',
            'last_name' =>'required',
            'keywords' =>'required',
            'resume' =>'required|mimes:pdf,doc,docx,txt',
        ]);
        $resume=$request->resume;
        $resume_name=time().$resume->getClientOriginalName();
        $resume->move('uploads/resumes', $resume_name);
        Person::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'keywords'=>preg_replace('!\s+!', ' ', $request->keywords),
            'resume'=>'uploads/resumes/'.$resume_name
        ]);
        Session::flash('success','Resume created successfully.');
        return redirect()->back();
    }


    public function search(Request $request)
    {
        $this->validate($request, [
            'first_name' =>'required_without_all:last_name,keywords',
            'last_name' =>'required_without_all:first_name,keywords',
            'keywords' =>'required_without_all:first_name,last_name'
        ]);

        $first_name=$request->first_name?$request->first_name:"";
        $last_name=$request->last_name?$request->last_name:"";
        $keywords=$request->keywords?$request->keywords:"";
        $data=DB::table('people')
                ->where([
                    ['first_name', 'LIKE', '%'.$first_name.'%'],
                    ['last_name', 'LIKE', '%'.$last_name.'%'],
                    ['keywords', 'LIKE', '%'.$keywords.'%']
                ])->get();
        return view('index')->with('people', $data);
    }

}
