<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Collection\Collection;


/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 */
class CitiesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index(){
        $cities = $this->Cities
            ->find()
            ->select(['id','name'])
            ->where(['type' => 1,'ligne_count >' => 0])
            ->all();
        echo json_encode($cities);
        $this->autoRender = false;
    }


    public function with_stations(){
        $wilaya_id = $this->request->params['wilaya_id'];
        $cities = $this->Cities
            ->find()
            ->contain(['Stations'])
            ->where(['parrent_id'=> $wilaya_id])
            ->all()
            ->toArray();
        $villes = [];
        foreach ($cities as $k => $v) {
            $villes[$k]['id'] = $cities[$k]['id'];
            $villes[$k]['name'] = $cities[$k]['name'];
            $villes[$k]['stations'] =$this->setUpStations($cities[$k]->stations);
        }
        
        echo json_encode($villes);
        $this->autoRender = false ;
    }




private function setUpStations($stations){
    $s = [];
    $i = 0;
    $d = [];
    //set up the json like in the charge fille
    foreach ($stations as $k => $v) {
        if($stations[$k]->has_twin & !in_array($k, $d)){
            foreach ($stations as $kk => $vv) {
                if($stations[$kk]->name == $stations[$k]->name & $stations[$kk]->id != $stations[$k]->id){
                    $s[$i] = 
                        [
                            "name" => $stations[$kk]->name,
                            "real_stations" => 
                                [
                                    0 => $this->stic($stations[$kk]),
                                    1 => $this->stic($stations[$k])
                                ]
                        ];
                    $i++;
                    array_push($d, $kk);
                }
            }
        }else if(!in_array($k, $d)){
            $s[$i] = 
                [
                    "name" => $stations[$k]->name,
                    "real_stations" => 
                        [
                            0 => $this->stic($stations[$k])
                        ]
                ];
            $i++;
            array_push($d, $k);
        }
    }
    return $s;
}
private function stic($tab){
    $t = 
    [
        'id'    => $tab->id ,
        'name'  => $tab->name,
        'lon'   => $tab->lon ,
        'lat'   => $tab->lat ,
        'r'     => $tab->r ,

    ];
    return $t;
}

}

