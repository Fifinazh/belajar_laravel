<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // select * all from users
        $customers = Customer::get();
        $title = "Data Pelanggan Laundry";

        return view('pelanggan.index', compact('customers', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Pelanggan Laundry';
        return view('pelanggan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // bisa pilih salah satu enaknya gmn, fifi pilih yang bawah ke 1, makanya yg 2 di komentarin
        Customer::create($request->all());
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        Alert::success('Yuhuuuu', 'ada pelanggan baru nihh!');
        return redirect()->to('customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Pelanggan Laundry";
        //  select * from users where id= '$id
        $customer = Customer::find($id);

        return view('pelanggan.edit', compact('title', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        $customer->customer_name = $request->customer_name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        Alert::success('udah di edit', 'sudah diperbarui ya!');
        return redirect()->to('customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id)->delete();
        Alert::success('Dihapus', 'Data berhasil dihapus');
        return redirect()->to('customer');
    }

    public function delete($id)
    {
        $customer = Customer::find($id)->delete();
        return redirect()->to('customer');
    }
}
