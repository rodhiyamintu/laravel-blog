<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "status"=>200,
            "category"=>Category::all()
        ];
        return $data;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                "status"=>404,
                "errors"=>$validator->errors(),
            ];
            return $data;
        }

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        $data = [
            "status"=>200,
            "errors"=>"",
            "message"=>"Category Saved!"
        ];
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            "status"=>200,
            "category"=>Category::find($id)
        ];
        return $data;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                "status"=>404,
                "errors"=>$validator->errors(),
            ];
            return $data;
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        $data = [
            "status"=>200,
            "errors"=>"",
            "message"=>"Category Updated!"
        ];
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();        
        $data = [
            "status"=>200,
            "errors"=>"",
            "message"=>"Category Deleted!"
        ];
        return $data;
    }
}
