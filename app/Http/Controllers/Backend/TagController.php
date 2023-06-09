<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $data = Tag::all();
            return view('backend.tag.index', compact('data'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $tag=Tag::create($request->all());
            if($tag){
                $request->session()->flash('success','Tag added successfuly');
            }else{
                $request->session()->flash('error','Tag addition failed');
            }
         }
         catch (\Exception $exception){
             $request->session()->flash('error','Error'.$exception->getMessage());
         }
         return redirect()->route('backend.tag.index');
     }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('backend.tag.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $tag = Tag::find($id);
            if(!$tag)
            {
               request()->session()->flash('error','Error:Invalid Request');
               return redirect()->route('backend.tag.index');
            }
        }
        catch(Exception $exception)
        {
           request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return view('backend.tag.edit',compact('tag'));
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
        try
       {
           $tag = Tag::find($id);
           if(!$tag)
           {
              request()->session()->flash('error','Error:Invalid Request');
              return redirect()->route('backend.tag.index');
           }
           if($tag->update($request->all()))
           {
            request()->session()->flash('success','Updated');
            
           }else
           {
            request()->session()->flash('error','Updated failed');
           }

         }
       catch(Exception $exception)
       {
          request()->session()->flash('error','Error:'.$exception->getMessage());
       }
       return redirect()->route('backend.tag.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
       {
           $tag = Tag::find($id);
           if($tag->delete())
           {
              request()->session()->flash('success','Employee Deleted Successfully!!');
           }
           else
           {
            request()->session()->flash('error','Employee Deleted Failed');
           }

       }
       catch(Exception $exception)
       {
          request()->session()->flash('error','Error:'.$exception->getMessage());
       }
       return redirect()->route('backend.tag.index');
    }
}
