<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class TransOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // select * all from users
        $orders = Order::with('customer')->get();
        $title = "Data Transaksi Laundry";

        return view('order.index', compact('orders', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Transaksi Laundry';
        $order = Order::get()->last();
        $id_order = $order->id ?? '';
        $id_order++;
        $order_code = "LND" . date('dmY') . sprintf("%03s", $id_order);
        $customers = Customer::get();
        $services = Service::get();
        return view('order.create', compact('title', 'order_code', 'customers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $order = Order::create($request->all());
        foreach ($request->id_paket as $key => $val) {
            OrderDetail::create([
                'id_order'      => $order->id,
                'id_service'    => $request->id_paket[$key],
                'price_service' => $request->price_service[$key],
                'qty'           => $request->qty[$key],
                'subtotal'      => $request->subtotal[$key]
            ]);
        }
        // return $request;
        Alert::success('Yuhuuuu', 'ada orderan baru nihh!');
        return redirect()->to('trans_order');
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

    public function getPaket($id_paket)
    {
        // bisa pilih salah satu enaknya gmn, fifi pilih yang bawah ke 2, makanya yg 1 di komentarin
        // $paket = Service::where('id', $id_paket)->first();
        $paket = Service::find($id_paket);
        return response()->json($paket);
    }
}
