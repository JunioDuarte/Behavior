<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Address;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        echo "<h1>Dados do Usuário</h1><br>";
        echo "Nome do usuário: {$user->name}<br>";
        echo "E-mail: {$user->email}<br>";

        $userAddress = $user->addressDelivery()->get()->first();

        if($userAddress)
        {
            echo "<h1>Endereço de Entrega</h1><br>";
            echo "Endereço: {$userAddress->address}, {$userAddress->number}<br>";
            echo "Complemento: {$userAddress->complement} CEP: {$userAddress->zipcode}<br>";
            echo "Cidade/Estado: {$userAddress->city}/{$userAddress->state}";
        }

        $addressTest = new Address([

            'address' => 'Rua numero 2',
            'number' => '0',
            'complement' => 'apt 123',
            'zipcode' => '88000-000',
            'city' => 'Ipaba',
            'state' => 'MG'
        ]);

        $address = new Address();

        $address->address = 'Rua numero 1';
        $address->number = '534';
        $address->complement = 'Casa3';
        $address->zipcode = '12548-521';
        $address->city = 'Caratinga';
        $address->state = 'MG';


        //$user->addressDelivery()->save($address);
        $user->addressDelivery()->saveMany([$addressTest, $address]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
