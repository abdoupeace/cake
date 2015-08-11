<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CitiesLignes Controller
 *
 * @property \App\Model\Table\CitiesLignesTable $CitiesLignes
 */
class CitiesLignesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Lignes', 'Cities']
        ];
        $this->set('citiesLignes', $this->paginate($this->CitiesLignes));
        $this->set('_serialize', ['citiesLignes']);
    }

    /**
     * View method
     *
     * @param string|null $id Cities Ligne id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $citiesLigne = $this->CitiesLignes->get($id, [
            'contain' => ['Lignes', 'Cities']
        ]);
        $this->set('citiesLigne', $citiesLigne);
        $this->set('_serialize', ['citiesLigne']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $citiesLigne = $this->CitiesLignes->newEntity();
        if ($this->request->is('post')) {
            $citiesLigne = $this->CitiesLignes->patchEntity($citiesLigne, $this->request->data);
            if ($this->CitiesLignes->save($citiesLigne)) {
                $this->Flash->success(__('The cities ligne has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cities ligne could not be saved. Please, try again.'));
            }
        }
        $lignes = $this->CitiesLignes->Lignes->find('list', ['limit' => 200]);
        $cities = $this->CitiesLignes->Cities->find('list', ['limit' => 200]);
        $this->set(compact('citiesLigne', 'lignes', 'cities'));
        $this->set('_serialize', ['citiesLigne']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cities Ligne id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $citiesLigne = $this->CitiesLignes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $citiesLigne = $this->CitiesLignes->patchEntity($citiesLigne, $this->request->data);
            if ($this->CitiesLignes->save($citiesLigne)) {
                $this->Flash->success(__('The cities ligne has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cities ligne could not be saved. Please, try again.'));
            }
        }
        $lignes = $this->CitiesLignes->Lignes->find('list', ['limit' => 200]);
        $cities = $this->CitiesLignes->Cities->find('list', ['limit' => 200]);
        $this->set(compact('citiesLigne', 'lignes', 'cities'));
        $this->set('_serialize', ['citiesLigne']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cities Ligne id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $citiesLigne = $this->CitiesLignes->get($id);
        if ($this->CitiesLignes->delete($citiesLigne)) {
            $this->Flash->success(__('The cities ligne has been deleted.'));
        } else {
            $this->Flash->error(__('The cities ligne could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
