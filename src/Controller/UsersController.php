<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $api_key = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjE0MWYxZTkxLWJhYzQtNGZiMS1hOTUzLWYyNDc2ZDU4NWIxNCIsImlhdCI6MTQ3Mzk4MDUyNywic3ViIjoiZGV2ZWxvcGVyL2UxNzU4MmNmLWMzNGUtMmZiNC04NWQzLWMzZTc4MWE0ZGFjZSIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjMxLjE3MC4xNjAuODQiLCIxOTAuMjA0LjQzLjE0NiJdLCJ0eXBlIjoiY2xpZW50In1dfQ.lk6j6E-XS8rVhYm3yC0XB7F-A5YZTKrcblQ53ywPjKRmso3iB--lrb4xlBg_YoFwdVV6spNLT3Lr6kLDzI-gRw';
        $url = 'https://api.clashofclans.com/v1/clans/%239G929L8Q';

        $headers = array(
        'Accept: application/json',
        'Authorization: Bearer ' . $api_key
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL,$url);

        $result = curl_exec($ch);
        $response = json_decode($result,true);
        $response_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch); 

        if ($response_status == 200) {

            $highest_donation = $response['memberList'][0]['donations'];
            $lowest_donation = $response['memberList'][0]['donations'];

            foreach ($response['memberList'] as $key => $member) {
                if (isset($response['memberList'])) {
                    // Chequea si el usuario del tag actual no existe y lo agrega a la base de datos
                    // también se trae cualquier sanción asociada a éste
                    $row = $this->Users->find('all', ['conditions' => ['tag' => $member['tag']], 
                        'contain' => ['sanciones']])->first();
                    if (is_null($row)) {
                        $user = $this->Users->newEntity();
                        $this->request->data['users']['User'][$key]['name'] = $member['name'];
                        $this->request->data['users']['User'][$key]['tag'] = $member['tag'];
                        $user = $this->Users->patchEntity($user, $this->request->data['users']['User'][$key]);
                        $this->Users->save($user);
                        $response['memberList'][$key]['sancionado'] = false;
                    } else {
                        // TODO: si el usuario existe, comprobar estado de sanción y setearlo al view
                        if (!empty($row['sanciones'])) {
                            $response['memberList'][$key]['sancion_data'] = $row['sanciones'][0];
                            $response['memberList'][$key]['sancionado'] = true;
                        } else {
                            $response['memberList'][$key]['sancionado'] = false;

                        }                        
                    }
                }
            }
        }
        $this->set(compact('response', 'response_status'));
    }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
