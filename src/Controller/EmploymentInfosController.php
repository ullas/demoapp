<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmploymentInfos Controller
 *
 * @property \App\Model\Table\EmploymentInfosTable $EmploymentInfos
 */
class EmploymentInfosController extends AppController
{
var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;

		$fields = array(array('name'=>'id','type'=>'int'),array('name'=>'start_date','type'=>'date'),array('name'=>'first_date_worked','type'=>'date'),array('name'=>'original_start_date','type'=>'date'),'company',array('name'=>'is_primary','type'=>'bool'),array('name'=>'seniority_date','type'=>'date'),array('name'=>'benefits_eligibility_start_date','type'=>'date'),'prev_employeeid',array('name'=>'eligible_for_stock','type'=>'bool'),array('name'=>'service_date','type'=>'date'),array('name'=>'initial_stock_grant','type'=>'numeric'),array('name'=>'initial_option_grant','type'=>'numeric'),'job_credit','notes',array('name'=>'is_contingent_worker','type'=>'bool'),array('name'=>'end_date','type'=>'date'),array('name'=>'ok_to_rehire','type'=>'bool'),array('name'=>'pay_roll_end_date','type'=>'date'),array('name'=>'last_date_worked','type'=>'date'),array('name'=>'regret_termination','type'=>'bool'),array('name'=>'eligible_for_sal_continuation','type'=>'bool'),array('name'=>'bonus_pay_expiration_date','type'=>'date'),array('name'=>'stock_end_date','type'=>'date'),array('name'=>'salary_end_date','type'=>'date'),array('name'=>'benefits_end_date','type'=>'date'));
									  
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
        $employmentInfos = $this->paginate($this->EmploymentInfos);

        $this->set(compact('employmentInfos'));
        $this->set('_serialize', ['employmentInfos']);
    }

    /**
     * View method
     *
     * @param string|null $id Employment Info id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employmentInfo = $this->EmploymentInfos->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('employmentInfo', $employmentInfo);
        $this->set('_serialize', ['employmentInfo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employmentInfo = $this->EmploymentInfos->newEntity();
        if ($this->request->is('post')) {
            $employmentInfo = $this->EmploymentInfos->patchEntity($employmentInfo, $this->request->data);
            if ($this->EmploymentInfos->save($employmentInfo)) {
                $this->Flash->success(__('The employment info has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employment info could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EmploymentInfos->Customers->find('list', ['limit' => 200]);
        $this->set(compact('employmentInfo', 'customers'));
        $this->set('_serialize', ['employmentInfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employment Info id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employmentInfo = $this->EmploymentInfos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employmentInfo = $this->EmploymentInfos->patchEntity($employmentInfo, $this->request->data);
            if ($this->EmploymentInfos->save($employmentInfo)) {
                $this->Flash->success(__('The employment info has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employment info could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EmploymentInfos->Customers->find('list', ['limit' => 200]);
        $this->set(compact('employmentInfo', 'customers'));
        $this->set('_serialize', ['employmentInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employment Info id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employmentInfo = $this->EmploymentInfos->get($id);
        if ($this->EmploymentInfos->delete($employmentInfo)) {
            $this->Flash->success(__('The employment info has been deleted.'));
        } else {
            $this->Flash->error(__('The employment info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
