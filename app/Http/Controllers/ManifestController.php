<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manifiesto;
use App\Http\Requests;
use Validator;

class ManifestController extends Controller
{
 public function storeManifestData( Request $postData ){
        $validator = Validator::make( $postData->all(), array(
            'manifestNo' => 'Required',
            'generatorId' => 'Required',
            'transporterId' => 'Required',
            'receptorId' => 'Required'
        ) );

        if( $validator->fails() ){
            
            return response( self::makeAjaxMessage( $validator ), 409 );
        }
        $manifest = new Manifiesto;
        $manifest->manifestNo = $postData->get('manifestNo');
        $manifest->generatorId = $postData->get('generatorId');
        $manifest->transporterId = $postData->get('transporterId');
        $manifest->receptorId = $postData->get('receptorId');
        $manifest->save();
        return 'El manifiesto ha sido guardado exitosamente.';
    }

    private function makeAjaxMessage( $validator ){
        $messages = $validator->errors();
        $tempString = '';
        foreach( $messages->all() as $message ){
            $tempString .= $message . '\n';
        }

        return $tempString;
    }
}
