<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index()
    {
        $agencies = Agency::all();
        return view('index', compact('agencies'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'code' => 'required|unique:agency,code',
                'phone' => 'required|min:10|max:11',
                'email' => 'required|email|unique:agency,email',
                'address' => 'required',
                'manager_name' => 'required',
                'status' => 'required'
            ]);
        $agency = new Agency();
        $agency->code = $request->code;
        $agency->name = $request->name;
        $agency->phone = $request->phone;
        $agency->email = $request->email;
        $agency->address = $request->address;
        $agency->manager_name = $request->manager_name;
        $agency->status = $request->status;
        $agency->save();
        return redirect()->route('agency.index')->with('store_success', 'Thêm mới agency thành công');
    }

    public function edit($id)
    {
        $agency = Agency::where('id', $id)->first();
        return view('edit', compact('agency'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'code' => 'required',
                'phone' => 'required|min:10|max:11',
                'email' => 'required',
                'address' => 'required',
                'manager_name' => 'required',
                'status' => 'required'
            ]);
        $agency = Agency::where('id', $id)->first();
        $agency->code = $request->code;
        $agency->name = $request->name;
        $agency->phone = $request->phone;
        $agency->email = $request->email;
        $agency->address = $request->address;
        $agency->manager_name = $request->manager_name;
        $agency->status = $request->status;
        $agency->update();
        return redirect()->route('agency.index')->with('update_success', 'Sửa thành công');
    }

    public function delete($id)
    {
        $agency = Agency::where('id', $id)->first();
        $agency->delete();
        return redirect()->route('agency.index')->with('delete_success', 'Xoá đại lý thành công');
    }

    public function search(Request $request)
    {
        $agencySearch = $request->search;
        $agencies = Agency::where('name', 'LIKE', "%" . $agencySearch . "%")->get();
        return view('index', compact('agencies'));
    }
}
