<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController
{

  	var $components = array('Datatable');
	
	public function beforeFilter() {

        if($this->Auth->user('role')=='root'){
           parent::beforeFilter();
           $this->Auth->allow(array('view', 'index','edit','add','delete','deleteAll'));
        } else {
           $this->Auth->deny(array('view', 'index','edit','add','delete','deleteAll'));
           $this->redirect(array('controller' => 'Homes' , 'action' => 'index'));
        }
    }
	public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		
		$contains=[];
									  
		$usrfilter="";							  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);				
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));
        $this->set('_serialize', ['customers']);
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Addresses', 'BusinessUnits', 'CalendarAssignments', 'ContactInfos', 'CorporateAddresses', 'CostCentres', 'Departments', 'Dependents', 'Divisions', 'Empdatabiographies', 'Empdatapersonals', 'Employmentinfos', 'EventReasons', 'Frequencies', 'HolidayCalendars', 'Holidays', 'Identities', 'Jobclasses', 'Jobfunctions', 'Jobinfos', 'LegalEntities', 'Locations', 'PayComponentGroups', 'PayComponents', 'PayGrades', 'PayGroups', 'PayRanges', 'Picklists', 'Positions', 'Regions', 'TimeAccountTypes', 'TimeTypeProfiles', 'TimeTypes', 'Users', 'WorkSchedules']
        ]);

        $this->set('customer', $customer);
        $this->set('_serialize', ['customer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('customer'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('customer'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
