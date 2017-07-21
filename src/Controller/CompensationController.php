<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Compensation Controller
 *
 * @property \App\Model\Table\CompensationTable $Compensation
 */
class CompensationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $compensation = $this->paginate($this->Compensation);

		$empTable = TableRegistry::get('Employees');
		$payrolldataTable = TableRegistry::get('PayrollData');
		$payGroupTable = TableRegistry::get('PayGroups');
		$payComponentTable = TableRegistry::get('PayComponents');
		$payComponentGroupTable = TableRegistry::get('PayComponentGroups');
		

		$query=$empTable->find('All')->where(['visible'=>'1','customer_id'=>$this->loggedinuser['customer_id']]);
		(isset($query)) ? $totalempcount=$query->count() : $totalempcount="";
		
		$query=$payrolldataTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']])->distinct(['empdatabiographies_id']);
		(isset($query)) ? $payrollheadcount=$query->count() : $payrollheadcount="";
		  
		$payGroups = $payGroupTable->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$payComponents = $payComponentTable->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payComponentGroups = $payComponentGroupTable->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
        $employees = $empTable->find('list',array('fields' => array('id'=>'Employees.id','name'=>'CONCAT(Empdatapersonals.first_name,Empdatapersonals.last_name)'),
    						'contain' => array('Empdatapersonals'), 'limit' => 200))
        					->where(['Employees.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['Employees.customer_id' => '0']);
							
		
		$this->set('employeearr', json_encode($employees));
		$this->set('paygrouparr', json_encode($payGroups));
		$this->set('paycomponentarr', json_encode($payComponents));
		$this->set('paycomponentgrouparr', json_encode($payComponentGroups));
		
        $this->set(compact('compensation','totalempcount','payrollheadcount'));
        $this->set('_serialize', ['compensation']);
    }
	public function calculateCompensation(){
		if($this->request->is('ajax')) {

			$this->autoRender=false;
			$output=[];
			if($this->request->data['selectedype']=="single"){
				if($this->request->data['paycomptype']=="paycomponent"){
					
					$this->loadModel('PayrollResult');
					$query=$this->PayrollResult->find('all', array('conditions' => array('employee_id'  => $this->request->data['employee'],'pay_component_id'  => $this->request->data['paycomponent'],
											'customer_id' => $this->loggedinuser['customer_id'] ) ))->order(['id' => 'DESC'])->first();

					$output['component_value']=$query['pay_component_value'];
					$output['paid_salary']=$query['paid_salary'];
					
					if($this->request->data['valuetype']=="amount"){
						if($this->request->data['toggleval']=="true"){
							$output['projected_value']=$query['pay_component_value']-$this->request->data['value'];
						}else{
							$output['projected_value']=$query['pay_component_value']+$this->request->data['value'];
						}
					}else if($this->request->data['valuetype']=="percentage"){
						if($this->request->data['toggleval']=="true"){
							$output['projected_value']=$query['pay_component_value']-($query['pay_component_value']%$this->request->data['value']);
						}else{
							$output['projected_value']=$query['pay_component_value']+($query['pay_component_value']%$this->request->data['value']);
						}
					}
					
				}
			}
			$this->response->body(json_encode($output));
	    	return $this->response;
		}
	}
    /**
     * View method
     *
     * @param string|null $id Compensation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $compensation = $this->Compensation->get($id, [
            'contain' => []
        ]);

        $this->set('compensation', $compensation);
        $this->set('_serialize', ['compensation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $compensation = $this->Compensation->newEntity();
        if ($this->request->is('post')) {
            $compensation = $this->Compensation->patchEntity($compensation, $this->request->data);
            if ($this->Compensation->save($compensation)) {
                $this->Flash->success(__('The compensation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The compensation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('compensation'));
        $this->set('_serialize', ['compensation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Compensation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $compensation = $this->Compensation->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $compensation = $this->Compensation->patchEntity($compensation, $this->request->data);
            if ($this->Compensation->save($compensation)) {
                $this->Flash->success(__('The compensation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The compensation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('compensation'));
        $this->set('_serialize', ['compensation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Compensation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $compensation = $this->Compensation->get($id);
        if ($this->Compensation->delete($compensation)) {
            $this->Flash->success(__('The compensation has been deleted.'));
        } else {
            $this->Flash->error(__('The compensation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
