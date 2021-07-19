<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Family;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class FamilyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $families = Family::select('id','name', 'email', 'created_at')
            ->paginate(3);

        return view('admin.family.index',
        compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.family.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:families',
            'password' => 'required|confirmed|min:8',
        ]);

        Family::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.family.index')
        ->with('message', '家族登録を完了しました。');
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
        $family = Family::findOrFail($id);
        return view('admin.family.edit', compact('family'));
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
        $family = Family::findOrFail($id);
        $family->name = $request->name;
        $family->email = $request->email;
        $family->password = Hash::make($request->password);
        $family->save();

        return redirect()
        ->route('admin.family.index')
        ->with(['message' => '家族情報を編集しました。',
        'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Family::findOrFail($id)->delete(); //ソフトデリート

        return redirect()
        ->route('admin.family.index')
        ->with(['message' => '家族情報を削除しました。',
        'status' => 'alert']);
    }

    public function suspendedFamilyIndex()
    {
        $suspendedFamilies = Family::onlyTrashed()->get();
        return view('admin.suspended-family', compact('suspendedFamilies'));
    }

    public function suspendedFamilyDestroy($id)
    {
        Family::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.suspended-family.index');
    }
}
