<?php
namespace App\Controller;

use App\Controller\AppController;

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
    public function index()
    {
        $this->set('lignes', $this->paginate($this->Lignes));
        $this->set('_serialize', ['lignes']);
    }

    /**
     * View method
     *
     * @param string|null $id Ligne id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ligne = $this->Lignes->get($id, [
            'contain' => ['Cities', 'Stations']
        ]);
        $this->set('ligne', $ligne);
        $this->set('_serialize', ['ligne']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ligne = $this->Lignes->newEntity();
        if ($this->request->is('post')) {
            $ligne = $this->Lignes->patchEntity($ligne, $this->request->data);
            if ($this->Lignes->save($ligne)) {
                $this->Flash->success(__('The ligne has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ligne could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Lignes->Cities->find('list', ['limit' => 200]);
        $stations = $this->Lignes->Stations->find('list', ['limit' => 200]);
        $this->set(compact('ligne', 'cities', 'stations'));
        $this->set('_serialize', ['ligne']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ligne id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ligne = $this->Lignes->get($id, [
            'contain' => ['Cities', 'Stations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ligne = $this->Lignes->patchEntity($ligne, $this->request->data);
            if ($this->Lignes->save($ligne)) {
                $this->Flash->success(__('The ligne has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ligne could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Lignes->Cities->find('list', ['limit' => 200]);
        $stations = $this->Lignes->Stations->find('list', ['limit' => 200]);
        $this->set(compact('ligne', 'cities', 'stations'));
        $this->set('_serialize', ['ligne']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ligne id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ligne = $this->Lignes->get($id);
        if ($this->Lignes->delete($ligne)) {
            $this->Flash->success(__('The ligne has been deleted.'));
        } else {
            $this->Flash->error(__('The ligne could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
