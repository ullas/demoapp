<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EventReasons Controller
 *
 * @property \App\Model\Table\EventReasonsTable $EventReasons
 */
class EventReasonsController extends AppController
{
var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;

		$fields = array(array('name'=>'id','type'=>'int'),'name','description',array('name'=>'status','type'=>'bool'),array('name'=>'start_date','type'=>'date'),array('name'=>'end_date','type'=>'date'),'event','empl_status','implicit_position_action','external_code');
									  
		$output =$this->Datatable->getView($fields);
		echo json_encode($output);			
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $eventReasons = $this->paginate($this->EventReasons);

        $this->set(compact('eventReasons'));
        $this->set('_serialize', ['eventReasons']);
    }

    /**
     * View method
     *
     * @param string|null $id Event Reason id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventReason = $this->EventReasons->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('eventReason', $eventReason);
        $this->set('_serialize', ['eventReason']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventReason = $this->EventReasons->newEntity();
        if ($this->request->is('post')) {
            $eventReason = $this->EventReasons->patchEntity($eventReason, $this->request->data);
            if ($this->EventReasons->save($eventReason)) {
                $this->Flash->success(__('The event reason has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event reason could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EventReasons->Customers->find('list', ['limit' => 200]);
        $this->set(compact('eventReason', 'customers'));
        $this->set('_serialize', ['eventReason']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event Reason id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventReason = $this->EventReasons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventReason = $this->EventReasons->patchEntity($eventReason, $this->request->data);
            if ($this->EventReasons->save($eventReason)) {
                $this->Flash->success(__('The event reason has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event reason could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EventReasons->Customers->find('list', ['limit' => 200]);
        $this->set(compact('eventReason', 'customers'));
        $this->set('_serialize', ['eventReason']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event Reason id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventReason = $this->EventReasons->get($id);
        if ($this->EventReasons->delete($eventReason)) {
            $this->Flash->success(__('The event reason has been deleted.'));
        } else {
            $this->Flash->error(__('The event reason could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
