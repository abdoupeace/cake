<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LignesStations Controller
 *
 * @property \App\Model\Table\LignesStationsTable $LignesStations
 */
class LignesStationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Lignes', 'Stations']
        ];
        $this->set('lignesStations', $this->paginate($this->LignesStations));
        $this->set('_serialize', ['lignesStations']);
    }

    /**
     * View method
     *
     * @param string|null $id Lignes Station id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lignesStation = $this->LignesStations->get($id, [
            'contain' => ['Lignes', 'Stations']
        ]);
        $this->set('lignesStation', $lignesStation);
        $this->set('_serialize', ['lignesStation']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lignesStation = $this->LignesStations->newEntity();
        if ($this->request->is('post')) {
            $lignesStation = $this->LignesStations->patchEntity($lignesStation, $this->request->data);
            if ($this->LignesStations->save($lignesStation)) {
                $this->Flash->success(__('The lignes station has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The lignes station could not be saved. Please, try again.'));
            }
        }
        $lignes = $this->LignesStations->Lignes->find('list', ['limit' => 200]);
        $stations = $this->LignesStations->Stations->find('list', ['limit' => 200]);
        $this->set(compact('lignesStation', 'lignes', 'stations'));
        $this->set('_serialize', ['lignesStation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lignes Station id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lignesStation = $this->LignesStations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lignesStation = $this->LignesStations->patchEntity($lignesStation, $this->request->data);
            if ($this->LignesStations->save($lignesStation)) {
                $this->Flash->success(__('The lignes station has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The lignes station could not be saved. Please, try again.'));
            }
        }
        $lignes = $this->LignesStations->Lignes->find('list', ['limit' => 200]);
        $stations = $this->LignesStations->Stations->find('list', ['limit' => 200]);
        $this->set(compact('lignesStation', 'lignes', 'stations'));
        $this->set('_serialize', ['lignesStation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lignes Station id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lignesStation = $this->LignesStations->get($id);
        if ($this->LignesStations->delete($lignesStation)) {
            $this->Flash->success(__('The lignes station has been deleted.'));
        } else {
            $this->Flash->error(__('The lignes station could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
