<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Residuo;
use App\Http\Requests;
use Validator;

class ResiduesController extends Controller
{
    public function index(){
        $residues = self::getAllResidueData();
        return view("residuos",[
            'residuos' => $residues
        ]);
    }

    public function storeResidueData( Request $postData ){
        $validator = Validator::make( $postData->all(), array(
            'name' => 'Required',
            'unit' => 'Required'
        ) );

        if( $validator->fails() ){
            
            return response( self::makeAjaxMessage( $validator ), 409 );
        }
        $residuo = new Residuo;
        $residuo->nombre = $postData->get('name');
        $residuo->unidad = $postData->get('unit');
        
        $residuo->save();
        return 'El residuo ha sido guardado exitosamente.';
    }

    private function makeAjaxMessage( $validator ){
        $messages = $validator->errors();
        $tempString = '';
        foreach( $messages->all() as $message ){
            $tempString .= $message . '\n';
        }

        return $tempString;
    }
    
    public function getAllResidueData(){
        $residues = Residuo::all();
        return $residues;    
    }
}
