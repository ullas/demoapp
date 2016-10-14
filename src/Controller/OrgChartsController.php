<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrgCharts Controller
 *
 * @property \App\Model\Table\OrgChartsTable $OrgCharts
 */
class OrgChartsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        // $orgCharts = $this->paginate($this->OrgCharts);
// 
        // $this->set(compact('orgCharts'));
        // $this->set('_serialize', ['orgCharts']);
        $list = $this->OrgCharts->find('treeList');
		
		$orgCharts = $this->OrgCharts->find('threaded', array(
                    'order' => array('OrgCharts.lft'))
            );
			
			$this->set('orgCharts', $orgCharts);
    }

    /**
     * View method
     *
     * @param string|null $id Org Chart id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orgChart = $this->OrgCharts->get($id, [
            'contain' => []
        ]);

        $this->set('orgChart', $orgChart);
        $this->set('_serialize', ['orgChart']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orgChart = $this->OrgCharts->newEntity();
        if ($this->request->is('post')) {
            $orgChart = $this->OrgCharts->patchEntity($orgChart, $this->request->data);
            if ($this->OrgCharts->save($orgChart)) {
                $this->Flash->success(__('The org chart has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The org chart could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('orgChart'));
        $this->set('_serialize', ['orgChart']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Org Chart id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orgChart = $this->OrgCharts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orgChart = $this->OrgCharts->patchEntity($orgChart, $this->request->data);
            if ($this->OrgCharts->save($orgChart)) {
                $this->Flash->success(__('The org chart has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The org chart could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('orgChart'));
        $this->set('_serialize', ['orgChart']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Org Chart id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orgChart = $this->OrgCharts->get($id);
        if ($this->OrgCharts->delete($orgChart)) {
            $this->Flash->success(__('The org chart has been deleted.'));
        } else {
            $this->Flash->error(__('The org chart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
