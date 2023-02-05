<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Hasil extends Controller
{
    public function index($id)
    {
        $hasil = DB::table('test1s')
        ->where('id_peserta',$id)
        ->orderBy('id_peserta', 'desc')
        ->paginate(4);
        $putaran = DB::table('test1s')
        ->where('id_peserta',$id)
        ->average('putaran');
        $jarak = DB::table('test1s')
        ->where('id_peserta',$id)
        ->average('jarak');
        $gerakan = DB::table('test1s')
        ->where('id_peserta',$id)
        ->average('gerakan');
        $item = DB::table('test2s')
        ->where('id_peserta', $id)
        ->get();
        $b1hgb = DB::table('test2s')
        ->where('id_peserta', $id)
        ->where('item', 'b1')
        ->average('hgb');
        $b1ngb = DB::table('test2s')
        ->where('id_peserta', $id)
        ->where('item', 'b1')
        ->average('ngb');
        $b2hgb = DB::table('test2s')
        ->where('id_peserta', $id)
        ->where('item', 'b2')
        ->average('hgb');
        $b2ngb = DB::table('test2s')
        ->where('id_peserta', $id)
        ->where('item', 'b2')
        ->average('ngb');
        $b3hgb = DB::table('test2s')
        ->where('id_peserta', $id)
        ->where('item', 'b3')
        ->average('hgb');
        $b3ngb = DB::table('test2s')
        ->where('id_peserta', $id)
        ->where('item', 'b3')
        ->average('ngb');
        $b4hgb = DB::table('test2s')
        ->where('id_peserta', $id)
        ->where('item', 'b4')
        ->average('hgb');
        $b4ngb = DB::table('test2s')
        ->where('id_peserta', $id)
        ->where('item', 'b4')
        ->average('ngb');
        return view('hasil.score', [
            'putaran' => $putaran,
            'jarak' => $jarak,
            'gerakan' => $gerakan,
            'data' => DB::table('members')
            ->where('id_peserta', $id)
            ->first(),
            'hasil' => $hasil,
            'item' => $item,
            'b1hgb' => $b1hgb,
            'b1ngb' => $b1ngb,
            'b2hgb' => $b2hgb,
            'b2ngb' => $b2ngb,
            'b3hgb' => $b3hgb,
            'b3ngb' => $b3ngb,
            'b4hgb' => $b4hgb,
            'b4ngb' => $b4ngb,
        ]);
    }
    public function peserta(){
        $user = DB::table('users')
        ->leftJoin('members','members.id_user','users.id')
        ->where('id', Auth::user()->id)
        ->first();
        $hasil = DB::table('test1s')
        ->where('id_peserta',$user->id_peserta)
        ->orderBy('id_peserta', 'desc')
        ->paginate(4);
        $putaran = DB::table('test1s')
        ->where('id_peserta',$user->id_peserta)
        ->average('putaran');
        $jarak = DB::table('test1s')
        ->where('id_peserta',$user->id_peserta)
        ->average('jarak');
        $gerakan = DB::table('test1s')
        ->where('id_peserta',$user->id_peserta)
        ->average('gerakan');
        $item = DB::table('test2s')
        ->where('id_peserta', $user->id_peserta)
        ->get();
        $b1hgb = DB::table('test2s')
        ->where('id_peserta', $user->id_peserta)
        ->where('item', 'b1')
        ->average('hgb');
        $b1ngb = DB::table('test2s')
        ->where('id_peserta', $user->id_peserta)
        ->where('item', 'b1')
        ->average('ngb');
        $b2hgb = DB::table('test2s')
        ->where('id_peserta', $user->id_peserta)
        ->where('item', 'b2')
        ->average('hgb');
        $b2ngb = DB::table('test2s')
        ->where('id_peserta', $user->id_peserta)
        ->where('item', 'b2')
        ->average('ngb');
        $b3hgb = DB::table('test2s')
        ->where('id_peserta', $user->id_peserta)
        ->where('item', 'b3')
        ->average('hgb');
        $b3ngb = DB::table('test2s')
        ->where('id_peserta', $user->id_peserta)
        ->where('item', 'b3')
        ->average('ngb');
        $b4hgb = DB::table('test2s')
        ->where('id_peserta', $user->id_peserta)
        ->where('item', 'b4')
        ->average('hgb');
        $b4ngb = DB::table('test2s')
        ->where('id_peserta', $user->id_peserta)
        ->where('item', 'b4')
        ->average('ngb');
        return view('hasil.peserta', [
            'putaran' => $putaran,
            'jarak' => $jarak,
            'gerakan' => $gerakan,
            'data' => DB::table('members')
            ->leftJoin('users','users.id', 'members.id_user')
            ->where('id_user', Auth::user()->id)
            ->first(),
            'hasil' => $hasil,
            'item' => $item,
            'b1hgb' => $b1hgb,
            'b1ngb' => $b1ngb,
            'b2hgb' => $b2hgb,
            'b2ngb' => $b2ngb,
            'b3hgb' => $b3hgb,
            'b3ngb' => $b3ngb,
            'b4hgb' => $b4hgb,
            'b4ngb' => $b4ngb,
        ]);
    }
}
