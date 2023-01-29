<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::orderBy('nim', 'desc')->get(); Mahasiswa::with('matkul')->get();
        return view('Dashboard.data',[
            "title" => "Data Mahasiswa"
        ])->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Dosen::orderBy('id', 'asc')->get();
        return view('Dashboard.create',[
            "title" => "Data Mahasiswa"
        ])->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'matkul_id' => $request->matkul_id,
        ];
        Mahasiswa::create($data);
        return redirect('data');
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
        $data = Mahasiswa::where('nim', $id)->first(); Dosen::orderBy('id', 'asc')->get();
        return view('Dashboard.edit',[
            "title" => "Data Mahasiswa"
        ])->with('data', $data);
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
        $data = [
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'matkul_id' => $request->matkul_id,
        ];
        Mahasiswa::where('nim',$id)->update($data);
        return redirect('data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::where('nim',$id)->delete();
        return redirect('data');
    }
}
