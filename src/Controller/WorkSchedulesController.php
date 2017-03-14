<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WorkSchedules Controller
 *
 * @property \App\Model\Table\WorkSchedulesTable $WorkSchedules
 */
class WorkSchedulesController extends AppController
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
		
		$contains=['Customers'];
		$usrfilter="WorkSchedules.customer_id ='".$this->loggedinuser['customer_id'] . "'";							  
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
            'contain' => ['Customers']
        ];
        $workSchedules = $this->paginate($this->WorkSchedules);
		
		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('workSchedules'));
        $this->set('_serialize', ['workSchedules']);
    }

    /**
     * View method
     *
     * @param string|null $id Work Schedule id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workSchedule = $this->WorkSchedules->get($id, [
            'contain' => ['Customers']
        ]);

		if($workSchedule['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set('workSchedule', $workSchedule);
        	$this->set('_serialize', ['workSchedule']);
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
        $workSchedule = $this->WorkSchedules->newEntity();
        if ($this->request->is('post')) {
            $workSchedule = $this->WorkSchedules->patchEntity($workSchedule, $this->request->data);
			$workSchedule['customer_id']=$this->loggedinuser['customer_id'];
			$workSchedule['emp_data_biographies_id']=$this->request->session()->read('sessionuser')['empdatabiographyid'];
            if ($this->WorkSchedules->save($workSchedule)) {
                $this->Flash->success(__('The work schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The work schedule could not be saved. Please, try again.'));
            }
        }
        $customers = $this->WorkSchedules->Customers->find('list', ['limit' => 200]);
        $this->set(compact('workSchedule', 'customers'));
        $this->set('_serialize', ['workSchedule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Work Schedule id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workSchedule = $this->WorkSchedules->get($id, [
            'contain' => []
        ]);
		
		if($workSchedule['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workSchedule = $this->WorkSchedules->patchEntity($workSchedule, $this->request->data);
            if ($this->WorkSchedules->save($workSchedule)) {
                $this->Flash->success(__('The work schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The work schedule could not be saved. Please, try again.'));
            }
        }
        $customers = $this->WorkSchedules->Customers->find('list', ['limit' => 200]);
        $this->set(compact('workSchedule', 'customers'));
        $this->set('_serialize', ['workSchedule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Work Schedule id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workSchedule = $this->WorkSchedules->get($id);
        if($workSchedule['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->WorkSchedules->delete($workSchedule)) {
            	$this->Flash->success(__('The work schedule has been deleted.'));
        	} else {
            	$this->Flash->error(__('The work schedule could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }

        return $this->redirect(['action' => 'index']);
    }
}
