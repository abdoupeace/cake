<?php
namespace App\Controller;

use App\Controller\AppController;

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
    public function index()
    {   
        $ligne_id = 1;

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

        debug($lives);
        //$this->autoRender = false;
        /*
        $this->paginate = [
            'contain' => ['Lignes', 'Stations']
        ];
        $this->set('busesLive', $this->paginate($this->BusesLive));
        $this->set('_serialize', ['busesLive']);
        */
    }

    /**
     * View method
     *
     * @param string|null $id Buses Live id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $busesLive = $this->BusesLive->get($id, [
            'contain' => ['Lignes', 'Stations']
        ]);
        $this->set('busesLive', $busesLive);
        $this->set('_serialize', ['busesLive']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $busesLive = $this->BusesLive->newEntity();
        if ($this->request->is('post')) {
            $busesLive = $this->BusesLive->patchEntity($busesLive, $this->request->data);
            if ($this->BusesLive->save($busesLive)) {
                $this->Flash->success(__('The buses live has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The buses live could not be saved. Please, try again.'));
            }
        }
        $lignes = $this->BusesLive->Lignes->find('list', ['limit' => 200]);
        $stations = $this->BusesLive->Stations->find('list', ['limit' => 200]);
        $this->set(compact('busesLive', 'lignes', 'stations'));
        $this->set('_serialize', ['busesLive']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Buses Live id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $busesLive = $this->BusesLive->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $busesLive = $this->BusesLive->patchEntity($busesLive, $this->request->data);
            if ($this->BusesLive->save($busesLive)) {
                $this->Flash->success(__('The buses live has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The buses live could not be saved. Please, try again.'));
            }
        }
        $lignes = $this->BusesLive->Lignes->find('list', ['limit' => 200]);
        $stations = $this->BusesLive->Stations->find('list', ['limit' => 200]);
        $this->set(compact('busesLive', 'lignes', 'stations'));
        $this->set('_serialize', ['busesLive']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Buses Live id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $busesLive = $this->BusesLive->get($id);
        if ($this->BusesLive->delete($busesLive)) {
            $this->Flash->success(__('The buses live has been deleted.'));
        } else {
            $this->Flash->error(__('The buses live could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
