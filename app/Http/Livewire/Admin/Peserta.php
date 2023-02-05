<?php

namespace App\Http\Livewire\Admin;

use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Peserta extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $noujian, $nama, $ttl, $jenkel, $tb, $alamat, $tensi, $putaran, $jarak, $gerakan;
    public $result = 10;
    public $search = '';
    public function render()
    {
        return view('livewire.admin.peserta',[
            'data' => DB::table('members')
            ->leftJoin('users','users.id','members.id_user')
            ->orderBy('id_peserta','desc')
            ->where('nama', 'like', '%'.$this->search.'%')
            ->paginate($this->result),
            'angka' => 45
        ])
        ->extends('layouts.admin.app')
        ->section('content');
    }
    public function ClearForm()
    {
        $this->noujian = '';
        $this->nama = '';
        $this->ttl = '';
        $this->jenkel = '';
        $this->tb = '';
        $this->alamat = '';
        $this->tensi = '';
    }
    public function create(){
        $this->validate([
            'noujian' => 'required|alpha_dash|unique:members',
            'nama' => 'required',
            'ttl' => 'required',
            'jenkel' => 'required',
            'tb' => 'required',
            'alamat' => 'required',
            'tensi' => 'required'
        ]);
        $isi = [
            'username' => strtolower($this->noujian),
            'password' => bcrypt('rahasia'),
            'level' => 'peserta',
        ];

        $user = User::create($isi);

        $isiPeserta = [
            'noujian' => $this->noujian,
            'nama' => $this->nama,
            'ttl' => $this->ttl,
            'jenkel' => $this->jenkel,
            'tb' => $this->tb,
            'alamat' => $this->alamat,
            'tensi' => $this->tensi,
            'id_user' => $user->id
        ];
        Member::create($isiPeserta);
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('pesan', 'Data Berhasil Disimpan');
        $this->ClearForm();
        // return redirect('operator/guru');
    }
    public function edit($id) {
        $user = DB::table('members')
                    ->where('id_peserta',$id)
                    ->first();
        $this->noujian = $user->noujian;
        $this->nama = $user->nama;
        $this->ttl = $user->ttl;
        $this->jenkel = $user->jenkel;
        $this->tb = $user->tb;
        $this->alamat = $user->alamat;
        $this->tensi = $user->tensi;
        $this->id_peserta = $user->id_peserta;
    }

    public function update() {
        $this->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'jenkel' => 'required',
            'tb' => 'required',
            'alamat' => 'required',
            'tensi' => 'required',
        ]);
        $isiPeserta = [
                    'nama' => $this->nama,
                    'ttl' => $this->ttl,
                    'jenkel' => $this->jenkel,
                    'tb' => $this->tb,
                    'alamat' => $this->alamat,
                    'tensi' => $this->tensi,
                    ];
        $get = Member::where('id_peserta',$this->id_peserta)->update($isiPeserta);
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('pesan', 'Data Berhasil Diedit');
        $this->ClearForm();
    }
    public function konfirmasiHapus($id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->first();

        $this->ids = $user->id;
    }

    public function delete()
    {
            $user = User::where('id', $this->ids)->delete();

        session()->flash('pesan', 'Data Berhasil Dihapus');
        $this->dispatchBrowserEvent('closeModal');
        $this->ClearForm();
        // return redirect('operator/guru');
    }
    public function hasil($id){
        $putaran = DB::table('test1s')
        ->where('id_peserta',$id)
        ->average('putaran');

        $jarak = DB::table('test1s')
        ->where('id_peserta',$id)
        ->average('jarak');

        $gerakan = DB::table('test1s')
        ->where('id_peserta',$id)
        ->average('gerakan');

        $this->putaran = round($putaran);
        $this->jarak = round($jarak);
        $this->gerakan = round($gerakan);
    }
}
