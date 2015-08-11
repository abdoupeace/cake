<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Lignes Controller
 *
 * @property \App\Model\Table\LignesTable $Lignes
 */
class LignesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index(){
        echo json_encode($this->getLigneOf($this->request->params['city_id']));

        $this->autoRender = false;
    }

    /**
     *
     *
     *
     */
    public function search(){
        $p = $this->request->params;

        $l = $this->getLigneOf($p['from_city_id']);

        $lignes = [];

        foreach ($l as $k => $v) {
            foreach ($l[$k]['villes'] as $kk => $vv) {
                if($l[$k]['villes'][$kk]['id'] == $p['to_city_id']){
                    $stations = json_decode($this->requestAction([
                        'controller' => 'Stations' , 
                        'action' => 'index' , 
                        'prefix' => 'api' , 
                        '_ext' => 'json',
                        'ligne_id' => $l[$k]['id']
                    ]));
                    $from = false;
                    $to = false;
                    foreach ($stations as $station) {
                        if ($station->name == $p['from_station'] ) {
                            $from = true;
                        }else if($station->name == $p['to_station']){
                            $to = true;
                        }
                    }
                    if($from & $to){
                        array_push($lignes, [ 'id' => $l[$k]['id'] , 'name' => $l[$k]['name'] ]);
                    }
                }
            }
        }

        if (empty($lignes)) {
            $this->set('data',['todo'=>'nead more than ligne']);
        }else{
            $this->set('data',$lignes);
        }

    }


    /**
     *
     *
     */
    private function getLigneOf($city_id){
        $this->loadModel('Cities');
        $lignes = $this->Cities
            ->find()
            ->select(['id'])
            ->contain([
                'Lignes' => [
                    'Cities' => [ 'fields' => ['Cities.id','Cities.name','CitiesLignes.ligne_id'] ],
                    'fields' =>['Lignes.id','Lignes.name','Lignes.station_count','CitiesLignes.ligne_id','CitiesLignes.city_id']
                ]
            ])
            ->where(['Cities.id' => $city_id])
            ->first()
            ->toArray()['lignes'];

        foreach ($lignes as $k => $v) {
            foreach ($lignes[$k]['cities'] as $kk => $vv) {
                $lignes[$k]['villes'][$kk] = $lignes[$k]['cities'][$kk];
                $lignes[$k]['villes'][$kk]['order'] = $lignes[$k]['cities'][$kk]['_joinData']['ordonation'];
                unset($lignes[$k]['villes'][$kk]['_joinData']);
            }
            unset($lignes[$k]['cities']);
            unset($lignes[$k]['_joinData']);
        }
    return $lignes;
    }

}
