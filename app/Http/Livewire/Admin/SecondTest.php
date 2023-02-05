<?php

namespace App\Http\Livewire\Admin;

use App\Models\test2;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SecondTest extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $id_peserta, $nama, $noujian, $item, $hgb, $ngb;
    public $result = 10;
    public $search = '';
    public function render()
    {
        return view('livewire.admin.second-test',[
            'peserta' => DB::table('members')
            ->get(),
            'data' => DB::table('test2s')
            ->leftJoin('members','members.id_peserta','test2s.id_peserta')
            ->orderBy('id_test2','desc')
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
        $this->item = '';
        $this->hgb = '';
        $this->ngb = '';
    }
    public function create(){
        $this->validate([
            'id_peserta' => 'required',
            'item' => 'required',
            'hgb' => 'required|numeric',
            'ngb' => 'required|numeric',
        ]);
        $hitung = DB::table('test2s')
                ->where('id_peserta', $this->id_peserta)
                ->where('item', $this->item)
                ->where('tahun', date('Y', strtotime(now())))
                ->count();

        if($hitung >=2){
                    $this->dispatchBrowserEvent('closeModal');
                    session()->flash('gagal', 'Maksimal test 2x dalam 1 tahun!');
                    $this->ClearForm();
        } else {
            $isiPeserta = [
                        'id_peserta' => $this->id_peserta,
                        'item' => $this->item,
                        'hgb' => $this->hgb,
                        'ngb' => $this->ngb,
                        'tahun' => date('Y', strtotime(now()))
                    ];
                    test2::create($isiPeserta);
                    $this->dispatchBrowserEvent('closeModal');
                    session()->flash('pesan', 'Data Berhasil Disimpan');
                    $this->ClearForm();
                    }


    }
    public function edit($id) {
        $user = DB::table('test2s')
                    ->where('id_test2',$id)
                    ->first();
        $this->id_test2 = $user->id_test2;
        $this->item = $user->item;
        $this->hgb = $user->hgb;
        $this->ngb = $user->ngb;

    }

    public function update() {
        $this->validate([
            'item' => 'required',
            'hgb' => 'required|numeric',
            'ngb' => 'required|numeric',
        ]);
        $isiPeserta = [
                    'item' => $this->item,
                    'hgb' => $this->hgb,
                    'ngb' => $this->ngb,
                    ];
        $get = test2::where('id_test2',$this->id_test2)->update($isiPeserta);
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('pesan', 'Data Berhasil Diedit');
        $this->ClearForm();
    }
    public function konfirmasiHapus($id)
    {
        $user = DB::table('test2s')
            ->where('id_test2', $id)
            ->first();

        $this->ids = $user->id_test2;
    }

    public function delete()
    {
            $user = test2::where('id_test2', $this->ids)->delete();

        session()->flash('pesan', 'Data Berhasil Dihapus');
        $this->dispatchBrowserEvent('closeModal');
        $this->ClearForm();
        // return redirect('operator/guru');
    }

}
