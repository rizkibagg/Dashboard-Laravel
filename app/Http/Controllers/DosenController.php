<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Dosen::orderBy('nik', 'desc')->get();

        $chartData = [];
        $dosenByMatkul = [];

        foreach ($data as $dosen) {
            // dosen by prodi
            $chartData[$dosen->pstudi] = 0;
            
            // dosen by matkul
            $dosenByMatkul[$dosen->matkul] = 0;
        }

        foreach ($data as $dosen) {
            $chartData[$dosen->pstudi] = $chartData[$dosen->pstudi]+1;
            
            // dosen by matkul
            $dosenByMatkul[$dosen->matkul] = $dosenByMatkul[$dosen->matkul] + 1;
        }

        // data dosen by prodi
        $chartColumns = array_keys($chartData);
        $chartValues = array_values($chartData);

        $data->chart_column = json_encode($chartColumns);
        $data->chart_values = json_encode($chartValues);


        // data dosen by matkul
        $charDosenByMatkul = [];
        foreach ($dosenByMatkul as $key => $value) {
            $temp["name"] = $key;
            $temp["value"] = $value;

            $charDosenByMatkul[] = $temp;
        }

        $data->chart_dosen_by_matkul = json_encode($charDosenByMatkul);


        return view('Dashboard.datads',[
            "title" => "Data Dosen"
        ])->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.createds',[
            "title" => "Data Dosen"
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
        $data = [
            'nik' => $request->nik,
            'nama' => $request->nama,
            'pstudi' => $request->pstudi,
            'matkul' => $request->matkul,
        ];
        Dosen::create($data);
        return redirect('datads')->with('toast_success', 'Data Berhasil Tersimpan!');
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
        $data = Dosen::where('nik', $id)->first();
        return view('Dashboard.editds',[
            "title" => "Data Dosen"
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
            'pstudi' => $request->pstudi,
            'matkul' => $request->matkul,
        ];
        Dosen::where('nik',$id)->update($data);
        return redirect('datads')->with('toast_success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dosen::where('nik',$id)->delete();
        return redirect('datads')->with('toast_success', 'Data Berhasil Dihapus!');
    }
}
