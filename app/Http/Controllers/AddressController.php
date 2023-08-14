<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Log;

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
        $addresses = $this->address->all();
        $newAddress = new Address();
        if (!$address) {
            try {
                $msg = "Endereço adicionado para próxima busca.";
                $url = "https://viacep.com.br/ws/{$searchQuery}/json/";
                $response = file_get_contents($url);
                $apiResult = json_decode($response, true);
            } catch (\Exception $e) {
                return view('addresses', ['msg' => "Ocorreu um problema ao realizar a busca!", 'address' => [], 'addresses' => $addresses]);
            }
            if (!empty($apiResult) && !isset($apiResult['erro'])) {
                $newAddress->postal_code = $apiResult['cep'];
                $newAddress->street = isset($apiResult['logradouro']) ? $apiResult['logradouro'] : '';
                $newAddress->number = isset($apiResult['complemento']) ? $apiResult['complemento'] : '';
                $newAddress->city = isset($apiResult['localidade']) ? $apiResult['localidade'] : '';
                $newAddress->state = isset($apiResult['uf']) ? $apiResult['uf'] : '';
                $newAddress->save();
            }
        }
        $addresses = $this->address->all();
        
        return view('addresses', ['addresses' => $addresses, 'address' => $address, 'msg' => $msg]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data = $request->except('_token');
        $created = $this->address->create($data);
        $addresses = Address::all();

        if ($created) {
            return view('addresses', ['addresses' => $addresses, 'address' => [], 'msg' => 'Criado com sucesso!']);
        }

        return view('addresses', ['addresses' => $addresses, 'address' => [], 'msg' => 'Ocorreu um problema ao cadastrar!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $updated = $this->address->where('id', $id)->update($request->all());
        $addresses = Address::all();

        if ($updated) {
            return view('addresses', ['addresses' => $addresses, 'address' => [], 'msg' => 'Atualizado com sucesso!']);
        }

        return view('addresses', ['addresses' => $addresses, 'address' => [], 'msg' => 'Ocorreu um problema ao atualizar!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->address->where('id', $id)->delete();
        $addresses = $this->address->all();
        $address = null;

        return view('addresses', ['addresses' => $addresses, 'address' => $address, 'msg' => 'Sucesso ao excluir!']);
    }
}