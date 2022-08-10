<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Companies; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;


class ComController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pagination
        $data = Companies::paginate(10);
        return view('Companies', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
        {
            return view ('add_companies') ;
         }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Name'=>'required|max:10',
            'Address'=>'required|max:30',
            'Email'=>'required',
        ]);
       /* if($request->hasFile('Logo')){
            $file = $request->Logo;
            $new_file = time().$file->getClientOriginalName();
            $file->move('storage/app/public',$new_file);
        }*/
        $data = new Companies;
        if($request->hasfile('Logo'))
        {
            $file = $request->file('Logo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/app/public', $filename);
            $data->Logo = $filename;
        }

        companies::create([
            "Name" => $request ->Name,
            "Address" => $request ->Address,
            "Logo" => $request -> Logo,
            "Website" => $request ->Website,
            "Email" => $request ->Email,
           

        ]);

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
            $data = Companies::find($id);
        
            return view('edit_companies',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Companies::find($id);
        $data->Name = $request->input('Name');
        $data->Address = $request->input('Address');
        $data->Logo = $request->input('Logo');
        $data->Website = $request->input('Website');
        $data->Email = $request->input('Email');
        $data->update();
        return redirect()->back()->with('status','company Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Companies::find($id);
        $data->delete();
        return redirect()->back()->with('status','Student Deleted Successfully');
    }
}
