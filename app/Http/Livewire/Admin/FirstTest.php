<?php

namespace App\Http\Livewire\Admin;

use App\Models\test1;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class FirstTest extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $id_peserta, $nama, $noujian, $putaran, $jarak, $gerakan;
    public $result = 10;
    public $search = '';
    public function render()
    {
        return view('livewire.admin.first-test',[
            'peserta' => DB::table('members')
            ->get(),
            'data' => DB::table('test1s')
            ->leftJoin('members','members.id_peserta','test1s.id_peserta')
            ->orderBy('id_test1','desc')
            ->where('nama', 'like', '%'.$this->search.'%')
            ->paginate($this->result)

        ])
        ->extends('layouts.admin.app')
        ->section('content');
    }
    public function ClearForm()
    {
        $this->noujian = '';
        $this->nama = '';
        $this->id_peserta = '';
        $this->putaran = '';
        $this->jarak = '';
        $this->gerakan = '';
    }
    public function create(){
        $this->validate([
            'id_peserta' => 'required',
            'putaran' => 'required|numeric',
            'jarak' => 'required|numeric',
            'gerakan' => 'required|numeric',
        ]);
        $hitung = DB::table('test1s')
                ->where('id_peserta', $this->id_peserta)
                ->where('tahun', date('Y', strtotime(now())))
                ->count();
        if($hitung >=2){
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('gagal', 'Maksimal test 2x dalam 1 tahun!');
        $this->ClearForm();
        } else {
        $isiPeserta = [
            'id_peserta' => $this->id_peserta,
            'putaran' => $this->putaran,
            'jarak' => $this->jarak,
            'gerakan' => $this->gerakan,
            'tahun' => date('Y', strtotime(now()))
        ];
        test1::create($isiPeserta);
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('pesan', 'Data Berhasil Disimpan');
        $this->ClearForm();
        }

    }
    public function edit($id) {
        $user = DB::table('test1s')
                    ->where('id_test1',$id)
                    ->first();
        $this->id_test1 = $user->id_test1;
        $this->putaran = $user->putaran;
        $this->jarak = $user->jarak;
        $this->gerakan = $user->gerakan;

    }

    public function update() {
        $this->validate([
            'putaran' => 'required|numeric',
            'jarak' => 'required|numeric',
            'gerakan' => 'required|numeric',
        ]);
        $isiPeserta = [
                    'putaran' => $this->putaran,
                    'jarak' => $this->jarak,
                    'gerakan' => $this->gerakan,
                    ];
        $get = test1::where('id_test1',$this->id_test1)->update($isiPeserta);
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('pesan', 'Data Berhasil Diedit');
        $this->ClearForm();
    }
    public function konfirmasiHapus($id)
    {
        $user = DB::table('test1s')
            ->where('id_test1', $id)
            ->first();

        $this->ids = $user->id_test1;
    }

    public function delete()
    {
            $user = test1::where('id_test1', $this->ids)->delete();

        session()->flash('pesan', 'Data Berhasil Dihapus');
        $this->dispatchBrowserEvent('closeModal');
        $this->ClearForm();
        // return redirect('operator/guru');
    }

}
