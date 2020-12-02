<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Unit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitsController extends Controller
{
    public function __construct() {
        $this->middleware('check.permissions');
    }
    /**
     * Display a listing of Specialties.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $items = Unit::where('name', 'ilike', '%'.$search.'%')
            ->orderby('name', 'asc')->paginate(50);
        return view('admin.units.index', compact('items', 'search'));
    }
    /**
     * Show the form for creating new Unit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.units.create');
    }
    /**
     * Store a newly created Unit in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|unique:units|max:120',
            'code'=>'required|unique:units|max:120',
        ], [], [
            'name' => __('units.fields.name'),
            'code' => __('units.fields.name'),
        ]);
        Unit::create($request->all());
        return redirect()->route('admin.units.index')->with('success', __('global.app_msg_store_success'));
    }
    /**
     * Show the form for editing Unit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Unit::findOrFail($id);
        return view('admin.units.edit', compact('id', 'item'));
    }
    /**
     * Update Unit in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|unique:units,name,'.$id.'|max:120',
            'code'=>'required|unique:units,code,'.$id.'|max:120',
        ], [], [
            'name' => __('units.fields.name'),
            'code' => __('units.fields.code'),
        ]);
        $item = Unit::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.units.index')->with('success', __('global.app_msg_update_success'));
    }
    /**
     * Remove Unit from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Unit::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.units.index')->with('success', __('global.app_msg_destroy_success'));
    }
    /**
     * Delete all selected Specialties at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Unit::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $entry->delete();
            }
            return redirect()->route('admin.units.index')->with('success', __('global.app_msg_mass_destroy_success'));
        } else {
            return redirect()->route('admin.units.index')->with('error', __('global.app_msg_mass_destroy_error'));
        }
    }
}