<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmployeeClasses Controller
 *
 * @property \App\Model\Table\EmployeeClassesTable $EmployeeClasses
 */
class EmployeeClassesController extends AppController
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
		$contains=['Customers'];
									  
		$usrfilter="EmployeeClasses.customer_id ='".$this->loggedinuser['customer_id'] . "'";								  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);
		
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $employeeClasses = $this->paginate($this->EmployeeClasses);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('employeeClasses'));
        $this->set('_serialize', ['employeeClasses']);
    }

    /**
     * View method
     *
     * @param string|null $id Employee Class id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeeClass = $this->EmployeeClasses->get($id, [
            'contain' => ['Customers']
        ]);

		if($employeeClass['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set('employeeClass', $employeeClass);
        	$this->set('_serialize', ['employeeClass']);
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
        $employeeClass = $this->EmployeeClasses->newEntity();
        if ($this->request->is('post')) {
            $employeeClass = $this->EmployeeClasses->patchEntity($employeeClass, $this->request->data);
            $employeeClass['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->EmployeeClasses->save($employeeClass)) {
                $this->Flash->success(__('The employee class has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee class could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EmployeeClasses->Customers->find('list', ['limit' => 200]);
        $this->set(compact('employeeClass', 'customers'));
        $this->set('_serialize', ['employeeClass']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee Class id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeClass = $this->EmployeeClasses->get($id, [
            'contain' => []
        ]);
		
		if($employeeClass['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeClass = $this->EmployeeClasses->patchEntity($employeeClass, $this->request->data);
            if ($this->EmployeeClasses->save($employeeClass)) {
                $this->Flash->success(__('The employee class has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee class could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EmployeeClasses->Customers->find('list', ['limit' => 200]);
        $this->set(compact('employeeClass', 'customers'));
        $this->set('_serialize', ['employeeClass']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee Class id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeClass = $this->EmployeeClasses->get($id);
		if($employeeClass['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->EmployeeClasses->delete($employeeClass)) {
            	$this->Flash->success(__('The employee class has been deleted.'));
        	} else {
            	$this->Flash->error(__('The employee class could not be deleted. Please, try again.'));
        	}
		}else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }

        return $this->redirect(['action' => 'index']);
    }
	public function deleteAll($id=null){
    	
		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->EmployeeClasses->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->EmployeeClasses->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected employee classes has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The employee classes could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
