<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kelas;
use App\Models\Guru;
use App\Models\siswa;
use App\Models\User;
use App\Models\matpel;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use PDF;

class SiswaController extends Controller
{
    
    public function index()
    {
        $data['title'] = 'Siswa';
        $matpel = kelas::all();
        $query = siswa::with('kelas')->orderBy('nama_siswa', 'asc');
        $data['data'] = siswa::join('kelas','kelas.id_kelas','=','siswas.id_kelas')->paginate(15);
        return view('siswa.index', $data);
    }


    public function add()
    {
        $data['title'] = 'Tambah Siswa';
        $data['kelas'] = kelas::orderBy('nama_kelas', 'asc')->get();
        return view('siswa.create', $data);
    }

  
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_induk_siswa' => 'required',
            'id_kelas' => 'required',
            'nama_siswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'alamat' => 'required',
            'foto' => 'required',
            'telepon' => 'required',
            'agama' => 'required',
            'username' => 'required|unique:users'
        ]);

        $file = $request->file('foto');
        $guru = siswa::all();
        $fileName = $file->getClientOriginalName();
        $i=0;
        foreach ($guru as $key) {
            if ($i.$fileName == $key['foto'] ) {
                $i++;
            }
        }
        $namafoto = $i.$fileName;
        $request->file('foto')->move("image/siswa", $namafoto);

        $query = array(
            'no_induk_siswa' => $request->input('no_induk_siswa'),
            'id_kelas' => $request->input('id_kelas'),
            'nama_siswa' => $request->input('nama_siswa'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'golongan_darah' => $request->input('golongan_darah'),
            'alamat' => $request->input('alamat'),
            'foto' => $namafoto,
            'telepon' => $request->input('telepon'),
            'agama' => $request->input('agama')
        );

        $sql = array(
            'no_induk' => $request->input('no_induk_siswa'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'level' => 2
        );

        $data = siswa::create($query);
        $data2 = User::create($sql);
        return redirect('siswa');
    }

  
    public function show($id)
    {
        
    }

  
    public function edit($id)
    {
        $data['title'] = 'Edit Siswa';
        $data['kelas'] = kelas::orderBy('nama_kelas', 'asc')->get();
        $data['data'] = siswa::where('id_siswa','=',$id)->join('kelas','kelas.id_kelas','=','siswas.id_kelas')->first();
        return view('siswa.edit', $data);
    }

 
    public function update(Request $request, $id)
    {
        $rules = array(
            'id_kelas' => 'required',
            'nama_siswa' => 'required',
            'tempat_lahir'    => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin'    => 'required',
            'golongan_darah' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'agama' => 'required'
          );
        $data = siswa::find($id_kelas);
        $data->update($request->all());
        return redirect('siswa');
    }

    public function pdf()
    {
        $data['title'] = 'Siswa';
        $data['data'] = siswa::join('kelas','kelas.id_kelas','=','siswas.id_kelas')->get();
        $pdf = PDF::loadView('siswa.pdf', $data);
        return $pdf->stream('Laporan-Data-Siswa.pdf');
        //return view('siswa.pdf', $data);
    }


    public function destroy($id)
    {
        //
    }
}