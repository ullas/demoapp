<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CalendarAssignments Controller
 *
 * @property \App\Model\Table\CalendarAssignmentsTable $CalendarAssignments
 */
class CalendarAssignmentsController extends AppController
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
		$contains=['Users', 'Holidays', 'Customers','HolidayCalendars'];
									  
		$usrfilter="CalendarAssignments.customer_id ='".$this->loggedinuser['customer_id'] . "'";						  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
		$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
        
        $this->paginate = [
            'contain' => ['Users', 'Holidays', 'Customers','HolidayCalendars']
        ];
        $calendarAssignments = $this->paginate($this->CalendarAssignments);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('calendarAssignments'));
        $this->set('_serialize', ['calendarAssignments']);
    }

    /**
     * View method
     *
     * @param string|null $id Calendar Assignment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $calendarAssignment = $this->CalendarAssignments->get($id, [
            'contain' => ['Users', 'Holidays', 'Customers','HolidayCalendars']
        ]);

        $holidays = $this->CalendarAssignments->Holidays->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$holidayCalendars = $this->CalendarAssignments->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->CalendarAssignments->Customers->find('list', ['limit' => 200]);
        
		if($calendarAssignment['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set(compact('calendarAssignment', 'holidays', 'customers','holidayCalendars'));
        	$this->set('_serialize', ['calendarAssignment']);
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
        $calendarAssignment = $this->CalendarAssignments->newEntity();
        if ($this->request->is('post')) {
            $calendarAssignment = $this->CalendarAssignments->patchEntity($calendarAssignment, $this->request->data);
			$calendarAssignment['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->CalendarAssignments->save($calendarAssignment)) {
                $this->Flash->success(__('The calendar assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calendar assignment could not be saved. Please, try again.'));
            }
        }
        $users = $this->CalendarAssignments->Users->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $holidays = $this->CalendarAssignments->Holidays->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$holidayCalendars = $this->CalendarAssignments->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->CalendarAssignments->Customers->find('list', ['limit' => 200]);
        $this->set(compact('calendarAssignment', 'users', 'holidays', 'customers','holidayCalendars'));
        $this->set('_serialize', ['calendarAssignment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calendar Assignment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $calendarAssignment = $this->CalendarAssignments->get($id, [
            'contain' => []
        ]);
		
		if($calendarAssignment['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $calendarAssignment = $this->CalendarAssignments->patchEntity($calendarAssignment, $this->request->data);
            if ($this->CalendarAssignments->save($calendarAssignment)) {
                $this->Flash->success(__('The calendar assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calendar assignment could not be saved. Please, try again.'));
            }
        }
        $users = $this->CalendarAssignments->Users->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $holidays = $this->CalendarAssignments->Holidays->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $holidayCalendars = $this->CalendarAssignments->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->CalendarAssignments->Customers->find('list', ['limit' => 200]);
        $this->set(compact('calendarAssignment', 'users', 'holidays', 'customers','holidayCalendars'));
        $this->set('_serialize', ['calendarAssignment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calendar Assignment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $calendarAssignment = $this->CalendarAssignments->get($id);
		if($calendarAssignment['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->CalendarAssignments->delete($calendarAssignment)) {
            	$this->Flash->success(__('The calendar assignment has been deleted.'));
        	} else {
            	$this->Flash->error(__('The calendar assignment could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }
        return $this->redirect(['action' => 'index']);
    }
}
