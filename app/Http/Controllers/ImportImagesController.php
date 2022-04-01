<?php

namespace App\Http\Controllers;
use App\Jobs\importPics;
use App\Models\Pictures;
use Illuminate\Http\Request;
use App\Models\Descriptions;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImportImagesController extends Controller
{
    /**
     * Download, descompacta e insere os XMLs da avantio no banco de dados
     * @param Request $req
     */
    public function index(Request $req)
    {

        \DB::table('pictures')->truncate();
        echo "tabela de imagens apagada<br>";

        /**
         * Download
        XMLS PRODUÇÃO
        http://feeds.avantio.com/descriptions/d807af156c55ae077e0735dd607863e5

        XMLS TESTE
        http://feeds.avantio.com/descriptions/836efa4efbe7fa63f2ebbae30d7b965f
         */

        if(config('app.env') == 'production'){
            $hash = "d807af156c55ae077e0735dd607863e5";// produção
        }else{
            $hash = "836efa4efbe7fa63f2ebbae30d7b965f";// testes
        }

        $files = array('descriptions');

        foreach($files as $file){
            $url='http://feeds.avantio.com/'.$file.'/'.$hash;
            copy($url,public_path().'/xml/'.$file.'.zip');
            echo $file." baixado<br>";
            $zip = \Zip::open(public_path().'/xml/'.$file.'.zip');
            $zip->extract(public_path() . '/xml');
            echo $file." descompactado<br>";
        }

        $descriptionsXML = file_get_contents(public_path('xml/Descriptions.xml'));
        $descriptionsObj = simplexml_load_string($descriptionsXML);
        $descriptionsJson = json_encode($descriptionsObj);
        $descriptionsArray = json_decode($descriptionsJson, true);

        //File::makeDirectory(public_path() . '/accommodation-pics/', 0777, true, true);

        if(count($descriptionsArray['Accommodation']) > 0){

            $dataArray = array();
            $j = 0;

            foreach($descriptionsArray['Accommodation'] as $index => $data){

                echo "<h1>Accommodation id: ".$data['AccommodationId']."</h1>";

                foreach ($data['Pictures']['Picture'] as $pic) {

                    if (!empty($pic['OriginalURI'])) {

                        $original = $pic['OriginalURI'];

                        //job
                        importPics::dispatch($original)->delay(now());
                        echo "Download do arquivo " . $original . " adicionado ao job!<br>";
                        $j++;

                        $urlchunks = explode("/",$original);
                        $dirname = $urlchunks[count($urlchunks)-2];
                        $filename = $urlchunks[count($urlchunks)-1];
                        $filepath = 'accommodation-pics/' . $dirname . '/';
                        $local = public_path() . $filepath . $filename;

                        $dataArray[] = [
                            "accommodationId" => $data['AccommodationId'],
                            "original" => $filepath.$filename,
                            "thumbnail" => $filepath.'th_'.$filename,
                        ];

                    }
                }
                echo "<hr>";
            }

            Pictures::insert($dataArray);

            echo $j." jobs adicionados!<br>";
        }
        echo "fim!";
        //return view("xml-data");
    }
}
