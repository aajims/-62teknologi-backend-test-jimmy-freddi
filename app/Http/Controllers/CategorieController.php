<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Validator;

class CategorieController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function list() {
        $data = Categorie::OrderBy('id', 'DESC')->get();
        return response()->json([
            'code' => 200,
            'data' => $data,
            'Message' => 'Success Show Data',
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $data = new Categorie;
        $data->title = $request->title;
        $data->alias = Str::of($request->title)->lower();
        $data->save();
        return response()->json(
            $data
        );
    }

    public function detail(Request $request) {
        $data = Categorie::where('id', $request->id)->first();
        return response()->json([
            'code' => 200,
            'data' => $data,
            'message' => 'Success Detail Data',
        ]);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $data = Categorie::where('id', $request->id)->first();
        $data->title = $request->title;
        $data->alias = Str::of($request->title)->lower();
        $data->save();
        return response()->json([
            'code' => 200,
            'data' => $data,
            'message' => 'Success Update Data',
        ]);
    }

    public function delete(Request $request)
    {
        $data = Categorie::where('id', $request->id)->first();
        $data->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Success delete Data',
        ]);
    }
}
