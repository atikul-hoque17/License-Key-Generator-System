<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use Response;
use DB;

class Questions extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = Question::paginate(5);
       //  $users = DB::table('questions')->paginate(2);
         return response()->json($users);
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
         $validatedData = $request->validate([
        'name' => 'required',        
         ]);

         $Questions= new Question();
                      // $categoryEntry->categoryName =$request->categoryName;
                      // $categoryEntry->shortDescription =$request->shortdescription;
                      // $categoryEntry->publicationStatus =$request->publicationstatus;      
                      // $Questions->create($request->all());
         $Questions=Question::create($request->all());

            // $data=array();
            // $data['types']=$request->types;
            // $data['name']=$request->name;
            // $data['descriptions']=$request->descriptions;
            // $data['answer']=$request->answer;
            // $insert=DB::table('questions')->insert($data);

         return response()->json(["message" => "Inserted successfully"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Question = Question::where('id',$id)->first();
        // return response()->json($productsbyId);
        return response()->json($Question);
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
        if (Question::where('id', $id)->exists()) {
                
                    $Question = Question::find($id);
                    // $category->categoryName =$request->name;
                    // $category->shortDescription =$request->shortdescription;
                    // $category->publicationStatus =$request->publicationstatus;   $category->save();

                    $Question->update($request->all());

                    return response()->json([
                        "message" => "records updated successfully"
                    ], 200);
            } 
            else {
                    return response()->json([
                        "message" => "Record not found"
                    ], 404);
                
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Question::where('id', $id)->exists()) {
                
                    $Question = Question::where('id', $id)->firstOrFail();          
                    $Question-> delete();   

                    return response()->json([
                        "message" => "records deleted"
                    ], 200);
         }
         else {
                    return response()->json([
                        "message" => " not found"
                    ], 404);
                
         }
    }
}
