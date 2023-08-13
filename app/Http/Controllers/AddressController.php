<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{

    public readonly Address $address;

    public function __construct()
    {
        $this->address = new Address();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $addresses = $this->address->all();
        $address = null;
        return view('addresses', ['addresses' => $addresses, 'address' => $address, 'msg' => '']);
    }

    public function search(Request $request)
{
    $searchQuery = $request->input('search_query');
    

    $address = Address::where('postal_code', $searchQuery)->first();
    $msg = null;
    $newAddress = new Address();
    if (!$address) {
        $msg = "Endereço não encontrado!";
        $url = "https://viacep.com.br/ws/{$searchQuery}/json/";
        $response = file_get_contents($url);
        $apiResult = json_decode($response, true);

        if (!empty($apiResult) && !isset($apiResult['erro'])) {
            $newAddress->postal_code = $apiResult['cep'];
            $newAddress->street = isset($apiResult['logradouro']) ? $apiResult['logradouro'] : '';
            $newAddress->number = isset($apiResult['complemento']) ? $apiResult['complemento'] : '';
            $newAddress->city = isset($apiResult['localidade']) ? $apiResult['localidade'] : '';
            $newAddress->state = isset($apiResult['uf']) ? $apiResult['uf'] : '';
            $newAddress->save();
        }
    }

    $addresses = Address::all();
    return view('addresses', ['addresses' => $addresses, 'address' => $address, 'msg' => $msg]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('address_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');
        $created = $this->address->create($data);

        if ($created) {
            return redirect()->back()->with('message', 'Successfully created');
        }

        return redirect()->back()->with('message', 'Error create address');
    }

    /**
     * Display the specified resource.
     */
    public function show(address $address)
    {
        //
        return view('address_show', ['address' => $address]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
        return view('address_edit', ['address' => $address]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $updated = $this->address->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->back()->with('message', 'Successfully updated');
        }

        return redirect()->back()->with('message', 'Error updating address');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->address->where('id', $id)->delete();
        return redirect()->route('addresses.index');
    }
}