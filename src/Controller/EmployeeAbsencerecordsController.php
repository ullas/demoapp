<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmployeeAbsencerecords Controller
 *
 * @property \App\Model\Table\EmployeeAbsencerecordsTable $EmployeeAbsencerecords
 */
class EmployeeAbsencerecordsController extends AppController
{

   var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		
		$usrfilter="";
        if( isset($this->request->session()->read('sessionuser')['empdatabiographyid']) && ($this->request->session()->read('sessionuser')['empdatabiographyid'])!=null ){
      
			$usrfilter.="emp_data_biographies_id ='" .$this->request->session()->read('sessionuser')['empdatabiographyid']. "' and EmployeeAbsencerecords.customer_id ='".$this->loggedinuser['customer_id'] . "'";
		}else{
			$usrfilter="EmployeeAbsencerecords.customer_id ='".$this->loggedinuser['customer_id'] . "'";
		}
		
		$contains=['Empdatabiographies', 'TimeTypes', 'Users','Customers'];
		
		
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
		
        $this->paginate = [
            'contain' => ['Empdatabiographies', 'TimeTypes', 'Users','Customers']
        ];
        $employeeAbsencerecords = $this->paginate($this->EmployeeAbsencerecords);

        $this->set(compact('employeeAbsencerecords'));
        $this->set('_serialize', ['employeeAbsencerecords']);
    }

    /**
     * View method
     *
     * @param string|null $id Employee Absencerecord id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeeAbsencerecord = $this->EmployeeAbsencerecords->get($id, [
            'contain' => ['Empdatabiographies', 'TimeTypes', 'Users','Customers']
        ]);
		if($address['customer_id']==$this->loggedinuser['customer_id'])
		{
			$timeTypes = $this->EmployeeAbsencerecords->TimeTypes->find('list', ['limit' => 200]);
			$this->set(compact('employeeAbsencerecord', 'timeTypes'));
        	$this->set('employeeAbsencerecord', $employeeAbsencerecord);
        	$this->set('_serialize', ['employeeAbsencerecord']);
		}else{
			$this->Flash->error(__('You are not Authorized.'));
			return $this->redirect(['action' => 'index']);
       }
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employeeAbsencerecord = $this->EmployeeAbsencerecords->newEntity();
        if ($this->request->is('post')) {
        	
            $employeeAbsencerecord = $this->EmployeeAbsencerecords->patchEntity($employeeAbsencerecord, $this->request->data);
			$employeeAbsencerecord['customer_id']=$this->loggedinuser['customer_id'];
			$employeeAbsencerecord["emp_data_biographies_id"] = $this->request->session()->read('sessionuser')['empdatabiographyid'] ; 
			$employeeAbsencerecord["created_by"] = $this->request->session()->read('sessionuser')['id'];
			$employeeAbsencerecord["status"] = "0";
            if ($this->EmployeeAbsencerecords->save($employeeAbsencerecord)) {
                $this->Flash->success(__('The employee absencerecord has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee absencerecord could not be saved. Please, try again.'));
            }
        }
        $empdatabiographies = $this->EmployeeAbsencerecords->Empdatabiographies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $timeTypes = $this->EmployeeAbsencerecords->TimeTypes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $users = $this->EmployeeAbsencerecords->Users->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('employeeAbsencerecord', 'empdatabiographies', 'timeTypes', 'users'));
        $this->set('_serialize', ['employeeAbsencerecord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee Absencerecord id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeAbsencerecord = $this->EmployeeAbsencerecords->get($id, [
            'contain' => []
        ]);
		
		if($employeeAbsencerecord['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeAbsencerecord = $this->EmployeeAbsencerecords->patchEntity($employeeAbsencerecord, $this->request->data);
			$employeeAbsencerecord["modified_by"] = $this->request->session()->read('sessionuser')['id'] ; 
            if ($this->EmployeeAbsencerecords->save($employeeAbsencerecord)) {
                $this->Flash->success(__('The employee absencerecord has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee absencerecord could not be saved. Please, try again.'));
            }
        }
        $empdatabiographies = $this->EmployeeAbsencerecords->Empdatabiographies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $timeTypes = $this->EmployeeAbsencerecords->TimeTypes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $users = $this->EmployeeAbsencerecords->Users->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('employeeAbsencerecord', 'empdatabiographies', 'timeTypes', 'users'));
        $this->set('_serialize', ['employeeAbsencerecord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee Absencerecord id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeAbsencerecord = $this->EmployeeAbsencerecords->get($id);
		if($employeeAbsencerecord['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->EmployeeAbsencerecords->delete($employeeAbsencerecord)) {
            	$this->Flash->success(__('The employee absencerecord has been deleted.'));
        	} else {
            	$this->Flash->error(__('The employee absencerecord could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }
        return $this->redirect(['action' => 'index']);
    }
}