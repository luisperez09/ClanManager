<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sanciones Controller
 *
 * @property \App\Model\Table\SancionesTable $Sanciones
 */
class SancionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sanciones = $this->paginate($this->Sanciones, ['order' => ['created' => 'DESC']]);

        $this->set(compact('sanciones'));
        $this->set('_serialize', ['sanciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Sancione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sancione = $this->Sanciones->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('sancione', $sancione);
        $this->set('_serialize', ['sancione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sancione = $this->Sanciones->newEntity();
        if ($this->request->is('post')) {
            $row = $this->Sanciones->Users->find('all', [
                'conditions' => ['Users.tag' => $this->request->data['user_tag']]])->first();
            $this->request->data['user_name'] = $row['name'];
            $sancione = $this->Sanciones->patchEntity($sancione, $this->request->data);
            if ($this->Sanciones->save($sancione)) {
                $this->Flash->success(__('La sanción se ha guardado.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se pudo guardar la sanción. Revise la informacion e intente de nuevo.'));
            }
        }
        $users = $this->Sanciones->Users->find('list', ['limit' => 200, 'order' => ['Users.name' => 'ASC']]);
        $this->set(compact('sancione', 'users'));
        $this->set('_serialize', ['sancione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sancione id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sancione = $this->Sanciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sancione = $this->Sanciones->patchEntity($sancione, $this->request->data);
            if ($this->Sanciones->save($sancione)) {
                $this->Flash->success(__('The sancione has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sancione could not be saved. Please, try again.'));
            }
        }
        $users = $this->Sanciones->Users->find('list', ['limit' => 200]);
        $this->set(compact('sancione', 'users'));
        $this->set('_serialize', ['sancione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sancione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sancione = $this->Sanciones->get($id);
        if ($this->Sanciones->delete($sancione)) {
            $this->Flash->success(__('The sancione has been deleted.'));
        } else {
            $this->Flash->error(__('The sancione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
