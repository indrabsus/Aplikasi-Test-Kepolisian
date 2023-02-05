<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.index',[
            'pria' => DB::table('members')
            ->where('jenkel','l')
            ->count(),
            'wanita' => DB::table('members')
            ->where('jenkel','p')
            ->count(),
            'test1' => DB::table('test1s')
            ->count(),
            'test2' => DB::table('test2s')
            ->count(),
            'rata1' => DB::table('test1s')
            ->paginate(4),
            'rata2' => DB::table('test2s')
            ->paginate(4)
        ])
        ->extends('layouts.admin.app')
        ->section('content');
    }
}
