<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', [
            'categories' => Category::all()
        ]);
    }

    public function fetch()
    {
        return view('dataPlants', [
            'plants' => Plant::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'desc' => 'required|min:5|max:255',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('ImgPlants');
        }

        $result = Plant::create($validateData);

        if($result){
            return response()->json([
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'status' => 500,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
		$id = $request->id;
		$data = Plant::find($id);
		return response()->json([
            'plant' => $data,
            'category' =>$data->category->keterangan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
		$id = $request->id;
		$data = Plant::find($id);
		return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'desc' => 'required'
        ];

        $validateData = $request->validate($rules);
        $plant = Plant::find($request->idEdit);

        if($request->file('image')){
            if ($plant->image){
                Storage::delete($plant->image);
            }
            $validateData['image'] = $request->file('image')->store('ImgPlants');
        }

        $result = Plant::where('id', $plant->id)->update($validateData);

        if($result){
            return response()->json([
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'status' => 500,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

		$result = Plant::destroy($id);

        if($result){
            return response()->json([
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'status' => 500,
            ]);
        }
    }
}
