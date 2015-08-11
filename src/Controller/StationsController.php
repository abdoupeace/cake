<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stations Controller
 *
 * @property \App\Model\Table\StationsTable $Stations
 */
class StationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $ligne_id = $this->request->params['ligne_id'];
        $this->loadModel('Lignes');
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

        $s = [];
        $i = 0;
        $d = [];
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

        debug($s);

        //=============================
        /*
        $this->paginate = [
            'contain' => ['Cities']
        ];
        $this->set('stations', $this->paginate($this->Stations));
        $this->set('_serialize', ['stations']);
        */
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
    /**
     * View method
     *
     * @param string|null $id Station id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $station = $this->Stations->get($id, [
            'contain' => ['Cities', 'Lignes']
        ]);
        $this->set('station', $station);
        $this->set('_serialize', ['station']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $station = $this->Stations->newEntity();
        if ($this->request->is('post')) {
            $station = $this->Stations->patchEntity($station, $this->request->data);
            if ($this->Stations->save($station)) {
                $this->Flash->success(__('The station has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The station could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Stations->Cities->find('list', ['limit' => 200]);
        $lignes = $this->Stations->Lignes->find('list', ['limit' => 200]);
        $this->set(compact('station', 'cities', 'lignes'));
        $this->set('_serialize', ['station']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Station id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $station = $this->Stations->get($id, [
            'contain' => ['Lignes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $station = $this->Stations->patchEntity($station, $this->request->data);
            if ($this->Stations->save($station)) {
                $this->Flash->success(__('The station has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The station could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Stations->Cities->find('list', ['limit' => 200]);
        $lignes = $this->Stations->Lignes->find('list', ['limit' => 200]);
        $this->set(compact('station', 'cities', 'lignes'));
        $this->set('_serialize', ['station']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Station id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $station = $this->Stations->get($id);
        if ($this->Stations->delete($station)) {
            $this->Flash->success(__('The station has been deleted.'));
        } else {
            $this->Flash->error(__('The station could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
