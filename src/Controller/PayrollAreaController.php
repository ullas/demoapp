<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayrollArea Controller
 *
 * @property \App\Model\Table\PayrollAreaTable $PayrollArea
 */
class PayrollAreaController extends AppController
{
	var $components = array('Datatable');
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		$contains=['LegalEntities', 'BusinessUnits', 'Divisions', 'Locations', 'Customers'];
									  
		$usrfilter="";						  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $this->paginate = [
            'contain' => ['LegalEntities', 'BusinessUnits', 'Divisions', 'Locations', 'Customers']
        ];
        $payrollArea = $this->paginate($this->PayrollArea);

        $this->set(compact('payrollArea'));
        $this->set('_serialize', ['payrollArea']);
    }

    /**
     * View method
     *
     * @param string|null $id Payroll Area id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payrollArea = $this->PayrollArea->get($id, [
            'contain' => ['LegalEntities', 'BusinessUnits', 'Divisions', 'Locations', 'Customers', 'PayrollRecord', 'PayrollStatus']
        ]);

        $legalEntities = $this->PayrollArea->LegalEntities->find('list', ['limit' => 200]);
        $businessUnits = $this->PayrollArea->BusinessUnits->find('list', ['limit' => 200]);
        $divisions = $this->PayrollArea->Divisions->find('list', ['limit' => 200]);
        $locations = $this->PayrollArea->Locations->find('list', ['limit' => 200]);
        $customers = $this->PayrollArea->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payrollArea', 'legalEntities', 'businessUnits', 'divisions', 'locations', 'customers'));
        $this->set('_serialize', ['payrollArea']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payrollArea = $this->PayrollArea->newEntity();
        if ($this->request->is('post')) {
            $payrollArea = $this->PayrollArea->patchEntity($payrollArea, $this->request->data);
            if ($this->PayrollArea->save($payrollArea)) {
                $this->Flash->success(__('The payroll area has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll area could not be saved. Please, try again.'));
            }
        }
        $legalEntities = $this->PayrollArea->LegalEntities->find('list', ['limit' => 200]);
        $businessUnits = $this->PayrollArea->BusinessUnits->find('list', ['limit' => 200]);
        $divisions = $this->PayrollArea->Divisions->find('list', ['limit' => 200]);
        $locations = $this->PayrollArea->Locations->find('list', ['limit' => 200]);
        $customers = $this->PayrollArea->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payrollArea', 'legalEntities', 'businessUnits', 'divisions', 'locations', 'customers'));
        $this->set('_serialize', ['payrollArea']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payroll Area id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payrollArea = $this->PayrollArea->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payrollArea = $this->PayrollArea->patchEntity($payrollArea, $this->request->data);
            if ($this->PayrollArea->save($payrollArea)) {
                $this->Flash->success(__('The payroll area has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll area could not be saved. Please, try again.'));
            }
        }
        $legalEntities = $this->PayrollArea->LegalEntities->find('list', ['limit' => 200]);
        $businessUnits = $this->PayrollArea->BusinessUnits->find('list', ['limit' => 200]);
        $divisions = $this->PayrollArea->Divisions->find('list', ['limit' => 200]);
        $locations = $this->PayrollArea->Locations->find('list', ['limit' => 200]);
        $customers = $this->PayrollArea->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payrollArea', 'legalEntities', 'businessUnits', 'divisions', 'locations', 'customers'));
        $this->set('_serialize', ['payrollArea']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payroll Area id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payrollArea = $this->PayrollArea->get($id);
        if ($this->PayrollArea->delete($payrollArea)) {
            $this->Flash->success(__('The payroll area has been deleted.'));
        } else {
            $this->Flash->error(__('The payroll area could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
