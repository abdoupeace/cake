<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Network\Exception\NotFoundException;
/**
 * Stations Controller
 *
 * @property \App\Model\Table\StationsTable $Stations
 */
class StationsController extends AppController
{

    /**
     * Index method
     * @throw Cake\Network\Exception\NotFoundException
     * @return json of list of satations by twins
     */
    public function index()
    {
        //get ligne id passed in url
        $ligne_id = $this->request->params['ligne_id'];
        //load ligne model
        $this->loadModel('Lignes');
        //get station of the ligne order by LignesStations.ordonation
        $stations = $this->Lignes
            ->find()
            ->select(['id'])
            ->contain(['Stations' => function($q){
                return $q->order(['LignesStations.ordonation' => 'ASC'])
                         ->contain('Cities');
            }])
            ->where(['id' => $ligne_id])
            ->first()
            ->stations;
        //if the stations empty throw 404 error
        if (empty($stations)) {
            throw new NotFoundException("ligne not found");
        }

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
                                "ville_name" => $stations[$k]->city->name,
                                "order" => $i,
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
                        "ville_name" => $stations[$k]->city->name,
                        "order" => $i,
                        "real_stations" => 
                            [
                                0 => $this->stic($stations[$k])
                            ]
                    ];
                $i++;
                array_push($d, $k);
            }
        }
        //end set up json

        //return the stations on json format
       $this->set('data',$s);

        //render any view
        //$this->autoRender = false;
    }

    private function stic($tab){
        $t = 
        [
            'id'    => $tab->id ,
            'name'  => $tab->name,
            'order' => $tab['_joinData']->ordonation ,
            'lon'   => $tab->lon ,
            'lat'   => $tab->lat ,
            'r'     => $tab->r ,

        ];
        return $t;
    }

    //=========================================
 
}
