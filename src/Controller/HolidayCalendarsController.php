<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HolidayCalendars Controller
 *
 * @property \App\Model\Table\HolidayCalendarsTable $HolidayCalendars
 */
class HolidayCalendarsController extends AppController
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
									  
		$output =$this->Datatable->getView($fields,$contains);
		echo json_encode($output);		
    }
	
	public function createajaxData()
	{
    	
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			
			$holidayCalendar = $this->HolidayCalendars->newEntity();
			$this->request->data['calendar']=$this->request->query['calendar'];
            $this->request->data['name']=$this->request->query['name'];
            $this->request->data['country']=$this->request->query['country'];
			$this->request->data['valid_from']=$this->request->query['validfrom'];
            $this->request->data['valid_to']=$this->request->query['validto'];
            $holidayCalendar=$this->HolidayCalendars->patchEntity($holidayCalendar,$this->request->data);
			if ($this->HolidayCalendars->save($holidayCalendar)) {

                $this->response->body($holidayCalendar['id']);
	    		return $this->response;
            } else {
                $this->response->body("error");
	    		return $this->response;
            }
		}  
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
        $holidayCalendars = $this->paginate($this->HolidayCalendars);

        $this->set(compact('holidayCalendars'));
        $this->set('_serialize', ['holidayCalendars']);
    }


	public function addWeekOff()
	{
    	
      	
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			$this->loadModel('Holidays');
			foreach(json_decode($this->request->query['content'])  as $d){
    		
				$items="";
    			$items=explode("^",$d);
				
				$holiday = $this->Holidays->newEntity();
            	$this->request->data['name']=$items[1];
           	 	$this->request->data['date']=$items[0];
				$this->request->data['holiday_code']=$items[3].$items[2];
            	$this->request->data['holiday_calendar_id']=$items[2];
				$this->request->data['holiday_class']="2";
            	$holiday=$this->Holidays->patchEntity($holiday,$this->request->data);
				if ($this->Holidays->save($holiday)) {

               	 	// $this->response->body("success");
	    			// return $this->response;
            	} else {
                	// $this->response->body("error");
	    			// return $this->response;
            	}
				
			}
			
		}
        
    }
	public function deleteWeekOff()
	{
    	
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;

			$this->loadModel('Holidays');
			if ($this->Holidays->deleteAll(array('holiday_class' => '2','holiday_calendar_id' => $this->request->query['holidaycalendar']))) {

                $this->response->body("success");
	    		return $this->response;
            } else {
                $this->response->body("error");
	    		return $this->response;
            }
		}
        
    }
    /**
     * View method
     *
     * @param string|null $id Holiday Calendar id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Holidays'])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $holidayCalendar = $this->HolidayCalendars->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('holidayCalendar', $holidayCalendar);
		$this->set('calid', $id);
        $this->set('_serialize', ['holidayCalendar']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		
		$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Holidays'])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
        
        if ($this->request->is(['patch', 'post', 'put'])) {
			// $id=$this->request->data['holidaycalendarid'];
			$holidayCalendar = $this->HolidayCalendars->get($id, [
           	 	'contain' => []
        	]);
            $holidayCalendar = $this->HolidayCalendars->patchEntity($holidayCalendar, $this->request->data);
            if ($this->HolidayCalendars->save($holidayCalendar)) {
                $this->Flash->success(__('The holiday calendar has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The holiday calendar could not be saved. Please, try again.'));
            }
        }
        $customers = $this->HolidayCalendars->Customers->find('list', ['limit' => 200]);
        $this->set(compact('holidayCalendar', 'customers'));
        $this->set('_serialize', ['holidayCalendar']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Holiday Calendar id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Holidays'])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
		
        $holidayCalendar = $this->HolidayCalendars->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $holidayCalendar = $this->HolidayCalendars->patchEntity($holidayCalendar, $this->request->data);
            if ($this->HolidayCalendars->save($holidayCalendar)) {
                $this->Flash->success(__('The holiday calendar has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The holiday calendar could not be saved. Please, try again.'));
            }
        }
        $customers = $this->HolidayCalendars->Customers->find('list', ['limit' => 200]);
        $this->set(compact('holidayCalendar', 'customers'));
		$this->set('calid', $id);
        $this->set('_serialize', ['holidayCalendar']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Holiday Calendar id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $holidayCalendar = $this->HolidayCalendars->get($id);
        if ($this->HolidayCalendars->delete($holidayCalendar)) {
            $this->Flash->success(__('The holiday calendar has been deleted.'));
        } else {
            $this->Flash->error(__('The holiday calendar could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
