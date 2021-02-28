<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sidang;

class Sidang_controller extends Controller
{
    public function index()
    {
        $title = 'Input Sidang';
        return view('dashboard.sidang.index',compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required'
        ]);
            $data['nama'] = $request->nama;
            $data['ruangan'] = $request->ruangan;
            $data['nomor'] = $request->nomor;
            $data['agenda'] = $request->agenda;
            $data['pihak'] = $request->pihak;
            $data['hakim'] = $request->hakim;
            $data['pengganti'] = $request->pengganti;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

            $file = $request->file('photo');
            if ($file) {
                $file->move('galery', $file->getClientOriginalName());
                $data['photo'] = 'galery/'.$file->getClientOriginalName();
            }

            Sidang::insert($data);

            \Session::flash('sukses','Data Berhasil di Masukkan');

        return redirect()->back();
    }

    public function show()
    {
        $title = 'Data Sidang';
        $data = Sidang::paginate(5);

        return view('dashboard.sidang.show',compact('title','data'));
    }

    public function delete($id)
    {
        try {
            Sidang::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil di Hapups');
        } catch (\Throwable $th) {
            \Session::flash('gagal',$th->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $title = 'Edit Data';
        $dt = Sidang::find($id);

        return view('dashboard.sidang.edit',compact('title','dt'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama'=>'required'
        ]);
            $data['nama'] = $request->nama;
            $data['ruangan'] = $request->ruangan;
            $data['nomor'] = $request->nomor;
            $data['agenda'] = $request->agenda;
            $data['pihak'] = $request->pihak;
            $data['hakim'] = $request->hakim;
            $data['pengganti'] = $request->pengganti;
            //$data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

            $file = $request->file('photo');
            if ($file) {
                $file->move('galery', $file->getClientOriginalName());
                $data['photo'] = 'galery/'.$file->getClientOriginalName();
            }

            Sidang::where('id',$id)->update($data);

            \Session::flash('sukses','Data Berhasil di Update');

        return redirect()->back();
    }
}
