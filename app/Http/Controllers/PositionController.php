<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Position;
class PositionController extends Controller
{
    //

    public function __construct()
    {
        if(!Auth::check()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = Position::orderBy('updated_at','desc')->get();
        return view('master.position.index', ['data' => $data]);
    }

    public function add()
    {
        return view('master.position.add');
    }

    public function postAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:positions',
            'work_days' => 'required',
            'overtime' => 'required'
        ]);

        $position = Position::create([
            'name' => ucwords($request->name),
            'work_days' => $request->work_days,
            'overtime' => $request->overtime
        ]);

        if ($position) {
            return redirect('/position/add')->with('success','Data Posisi berhasil disimpan!');
        }

        return redirect('/position/add')->with('error','Data Posisi gagal disimpan!');
    }

    public function postDelete(Request $request)
    {
        $position = Position::find($request->id);
        if ($position) {
            $position->delete();
            return redirect('/position')->with('success','Data Posisi berhasil dihapus!');
        }
        return redirect('/position')->with('error', 'Data Posisi gagal dihapus!');
    }

    public function edit($id)
    {
        $position = Position::where("id", $id)->get()[0];
        if (!$position) {
            $position = array();
        }
        return view('master.position.edit', ['data'=> $position]);
    }

    public function postUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'work_days' => 'required',
            'overtime' => 'required'
        ]);

        $position = Position::where("name", $request->name)->get();
        if ($position && ($position[0]->id!= $request->id)) {
            return redirect('/position')->with("error", "Data sudah ada!");
        }
        $position = Position::find($request->id);
        $position->update([
            'name' => ucwords($request->name),
            'work_days' => $request->work_days,
            'overtime' => $request->overtime
        ]);

        return redirect('/position')->with("success", "Data berhasil diperbaharui!");
    }
}
