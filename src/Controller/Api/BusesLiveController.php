<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * BusesLive Controller
 *
 * @property \App\Model\Table\BusesLiveTable $BusesLive
 */
class BusesLiveController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index(){
        $ligne_id = $this->request->params['ligne_id'];

        $lives = $this->BusesLive
            ->find()
            ->select(['id','lon','lat','state'])
            ->contain([
                'LignesStations' => [
                    'conditions' => ['LignesStations.ligne_id' => $ligne_id ],
                    'fields'     => ['ordonation']
                ]
            ])
            ->contain([
                'Stations' => [
                    'fields' => ['Stations.id','Stations.name','Stations.lon','Stations.lat','Cities.name'],
                    'Cities'
                ]
            ])
            ->where(['BusesLive.ligne_id' =>$ligne_id])
            ->all()
            ->toArray();
        if(empty($lives)){
            throw new NotFoundException("non live for this ligne");
        }
        foreach ($lives as $k => $v) {
            $lives[$k]['station']['ville_name'] = $lives[$k]['station']['city']['name'];
            unset($lives[$k]['station']['city']);

            $lives[$k]['station']['order'] = $lives[$k]['lignes_station']['ordonation'];
            unset($lives[$k]['lignes_station']);
        }
        echo json_encode($lives);
        $this->autoRender = false;
    }

}
