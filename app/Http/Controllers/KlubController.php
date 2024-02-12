<?php

namespace App\Http\Controllers;

use App\Models\Klup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KlubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klub = Klup::orderBy('name', 'asc')->paginate(5);

        //render view with posts
        return view('klub', compact('klub'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('klub-add', [
            'id' => '',
            'nama' => '',
            'kota' => '',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:klubs'],
            'kota' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('klub')
                ->withErrors($validator)
                ->withInput();
        }


        Klup::updateOrCreate([
            'id' => $request->id
        ], [
            'name' => $request->name,
            'kota' => $request->kota,
        ]);

        if (empty($request->id)) {
            $pesan = 'Data Berhasil Disimpan!';
        } else {
            $pesan = 'Data Berhasil Diupdate!';
        }

        return redirect()->route('klub')->with(['success' => $pesan]);
        // return response()->json(['pesan' => 'Product saved successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Klup $klup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req)
    {
        $klup = Klup::find($req->id);
        return view('klub-add', [
            'id' => $klup->id,
            'nama' => $klup->name,
            'kota' => $klup->kota,
        ]);
    }

    // public function edit(Klup $klup)
    // {

    //     print_r($klup);
    //     // return view('klub-add', [
    //     //     'id' => $klup->id,
    //     //     'nama' => $klup->name,
    //     //     'kota' => $klup->kota,
    //     // ]);
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Klup $klup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $klup = Klup::findOrFail($request->id);
        $klup->delete();
        return redirect()->route('klub')
            ->with(['success' => 'Product is deleted successfully.']);
    }
}
