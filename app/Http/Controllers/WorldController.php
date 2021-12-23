<?php

namespace App\Http\Controllers;
use App\Models\Cities;
use App\Models\States;
use Illuminate\Http\Request;

class WorldController extends Controller
{
    public function states($country_id){
        $states = States::select('nome', 'id', 'uf')
            ->where('pais', '=', $country_id)
            ->get();
        if(count($states) > 1) {
            echo '<option disabled>Estado</option>';
            foreach ($states as $state) {
                echo '<option rel="'.$state['uf'].'" value="' . $state['id'] . '">' . $state['nome'] . '</option>';
            }
        }else{
            echo '<option>Exterior</option>';
        }

    }

    public function cities($state_id){
        $cities = Cities::select('nome', 'id')
            ->where('uf', '=', $state_id)
            ->get();

            echo '<option disabled>Cidade</option>';
            foreach ($cities as $city) {
                echo '<option rel="'.$city['nome'].'" value="' . $city['id'] . '">' . $city['nome'] . '</option>';
            }
    }
}
