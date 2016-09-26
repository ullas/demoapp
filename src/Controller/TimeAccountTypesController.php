<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TimeAccountTypes Controller
 *
 * @property \App\Model\Table\TimeAccountTypesTable $TimeAccountTypes
 */
class TimeAccountTypesController extends AppController
{
var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;

		$fields = array(array('name'=>'id','type'=>'int'),
									  'name','unit','perm_reccur',array('name'=>'start_date','type'=>'date'),array('name'=>'valid_from','type'=>'date'),array('name'=>'valid_from_day','type'=>'date'),
									 array('name'=>'account_booking_off','type'=>'numeric'),'freq_period',array('name'=>'start_accrual','type'=>'numeric'),'accrual_base',array('name'=>'min_balance','type'=>'numeric'),'posting_order',array('name'=>'time_to_accrual','type'=>'numeric'),array('name'=>'proration_used','type'=>'bool'),
									 array('name'=>'rounding_used','type'=>'bool'),'update_rule','payout_eligiblity ','code',array('name'=>'pay_component','type'=>'bigint'),'time_to_actual_unit',array('name'=>'pay_component_group_id','type'=>'bigint'));
									  
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
            'contain' => ['PayComponents', 'PayComponentGroups', 'Customers']
        ];
        $timeAccountTypes = $this->paginate($this->TimeAccountTypes);

        $this->set(compact('timeAccountTypes'));
        $this->set('_serialize', ['timeAccountTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Time Account Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timeAccountType = $this->TimeAccountTypes->get($id, [
            'contain' => ['PayComponents', 'PayComponentGroups', 'Customers']
        ]);

        $this->set('timeAccountType', $timeAccountType);
        $this->set('_serialize', ['timeAccountType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timeAccountType = $this->TimeAccountTypes->newEntity();
        if ($this->request->is('post')) {
            $timeAccountType = $this->TimeAccountTypes->patchEntity($timeAccountType, $this->request->data);
            if ($this->TimeAccountTypes->save($timeAccountType)) {
                $this->Flash->success(__('The time account type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The time account type could not be saved. Please, try again.'));
            }
        }
        $payComponents = $this->TimeAccountTypes->PayComponents->find('list', ['limit' => 200]);
        $payComponentGroups = $this->TimeAccountTypes->PayComponentGroups->find('list', ['limit' => 200]);
        $customers = $this->TimeAccountTypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('timeAccountType', 'payComponents', 'payComponentGroups', 'customers'));
        $this->set('_serialize', ['timeAccountType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Time Account Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timeAccountType = $this->TimeAccountTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timeAccountType = $this->TimeAccountTypes->patchEntity($timeAccountType, $this->request->data);
            if ($this->TimeAccountTypes->save($timeAccountType)) {
                $this->Flash->success(__('The time account type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The time account type could not be saved. Please, try again.'));
            }
        }
        $payComponents = $this->TimeAccountTypes->PayComponents->find('list', ['limit' => 200]);
        $payComponentGroups = $this->TimeAccountTypes->PayComponentGroups->find('list', ['limit' => 200]);
        $customers = $this->TimeAccountTypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('timeAccountType', 'payComponents', 'payComponentGroups', 'customers'));
        $this->set('_serialize', ['timeAccountType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Time Account Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timeAccountType = $this->TimeAccountTypes->get($id);
        if ($this->TimeAccountTypes->delete($timeAccountType)) {
            $this->Flash->success(__('The time account type has been deleted.'));
        } else {
            $this->Flash->error(__('The time account type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
