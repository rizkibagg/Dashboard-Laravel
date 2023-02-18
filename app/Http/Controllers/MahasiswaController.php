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
        $dataMhs = Mahasiswa::orderBy('nim', 'desc')->get(); Mahasiswa::with('matkul')->get();
        // $totalkelas = Mahasiswa::all('kelas');

        // foreach($totalkelas as $kls){
        //     $kelas[$kls->kelas] = $kls->kelas;
        // }

        // $array_kelas = array_values($kelas);
        // $data = [];
        // $data["mhs"] = $mhs;
        // $data["kelas"] = $array_kelas;   

        $kelas = [];
        foreach ($dataMhs as $mhs) {
            $kelas[$mhs->kelas][] = $mhs;
        }
        
        $array_kelas = array_keys($kelas);

        sort($array_kelas);

        $array_count = [];
       
        foreach ($array_kelas as $arr_kls) {
            // echo $arr_kls;
            $array_count[$arr_kls] = count($kelas[$arr_kls]);
        }    
        

        $array_count = array_values($array_count);
        // echo json_encode($test); die;
        // echo json_encode($array_kelas);die;

        // dd($totalkelas);

        $data["mhs"] = $dataMhs;
        $data["kelas"] = $array_kelas;
        $data["count_kelas"] = json_encode($array_count);

        // echo json_encode($data);die;

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
        return redirect('datamhs')->with('toast_success', 'Data Berhasil Tersimpan!');
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
        $data = Mahasiswa::where('nim', $id)->first();
        $dataDosen = Dosen::orderBy('id', 'asc')->get();

        $data->dataDosen = $dataDosen;
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
        return redirect('datamhs')->with('toast_success', 'Data Berhasil Diubah!');
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
        return redirect('datamhs')->with('toast_success', 'Data Berhasil Dihapus!');
    }
}
