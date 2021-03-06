<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guru;
use App\Models\User;
use App\Models\matpel;

use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Guru';
        $matpel = matpel::all();
        $query = Guru::with('matpel')->orderBy('nama_guru', 'asc');
        if (Input::has('cari_nama')) {
            $query->where('nama_guru','like','%'.Input::get('cari_nama').'%');
        }
        if (Input::has('cari_matpel')) {
            $query->where('id_matpel','=',Input::get('cari_matpel'));
        }
        $data = $query->orderBy('nama_guru', 'asc')->paginate(15);

        return view('guru.index', compact('title', 'data','matpel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $data['title'] = 'Tambah Guru';
        $data['data'] = matpel::orderBy('nama_matpel', 'asc')->get();
        return view('guru.create', $data);

    }

  
    public function store(Request $request)
    {
        $rules = array(
                    'nama_guru' => 'required',
                    'id_matpel' => 'required',
                    'alamat'    => 'required',
                    'tempat_lahir' => 'required',
                    'tanggal_lahir'    => 'required',
                    'jenis_kelamin' => 'required',
                  );

        $this->validate($request, $rules);
        $data = Guru::create($request->all());
        $file = $request->file('foto');
        $guru = Guru::all();
        $fileName = $file->getClientOriginalName();
        $i=0;
        foreach ($guru as $key) {
            if ($i.$fileName == $key['foto'] ) {
                $i++;
            }
        }
        $namafoto = $i.$fileName;
        $request->file('foto')->move("image/guru", $namafoto);
        $foto = Guru::where('id_guru',$data->id_guru);
        $foto->update(['foto'=>$namafoto]);

        $user = new User();
        $user->username = $request['username'];
        $user->password = bcrypt($request['password']);
        $user->no_induk = $request['no_induk_guru'];
        $user->level = 1;
        $user->save(); 
        return redirect('guru');
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

    public function edit($id)
    {
        $data['title'] = 'Edit Guru';
        $data['data'] = matpel::orderBy('nama_matpel', 'asc')->get();
        $data['guru'] = Guru::find($id);
        return view('guru.edit', $data);
    }

    public function update(Request $request, $id)
    {
         $rules = array(
            'nama_guru' => 'required',
            'id_matpel' => 'required',
            'alamat'    => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir'    => 'required',
            'jenis_kelamin' => 'required',
          );
        $data = Guru::find($id);
        $data->update($request->all());
        return redirect('guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
