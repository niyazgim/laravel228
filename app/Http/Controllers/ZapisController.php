<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Zapis;
use Illuminate\Http\Request;

class ZapisController extends Controller
{
    public function index()
    {
        $roleId = auth()->user()->role_id;
        if ($roleId == 1)
            return view('zapis', ['zapises' => auth()->user()->zapises]);
        if ($roleId == 2)
            return view('zapis', ['zapises' => Zapis::all()]);
    }

    public function create()
    {
        return view("zapis-create", ['cars' => Car::all()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'car_id' => 'required|numeric|exists:cars,id',
            'address' => 'required|string',
            'quantity' => 'required|numeric|min:0',
        ]);

        Zapis::create(array_merge($data, ['status_id' => 1, 'user_id' => auth()->user()->id]));
        return redirect('/zapis');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'status_id' => 'required|numeric|exists:zapis_statuses,id',
        ]);

        $zapis = Zapis::findOrFail($id);
        $zapis->update(['status_id' => $request->status_id]);

        return redirect('/zapis');
    }
}
