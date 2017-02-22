<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Holidays Controller
 *
 * @property \App\Model\Table\HolidaysTable $Holidays
 */
class HolidaysController extends AppController
{
	var $components = array('ActionPopoupDatatable');
	
	public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		
		
		$usrfilter="";
        //msgdtime filter
        if( isset($this->request->query['holidaycalendar']) && ($this->request->query['holidaycalendar'])!=null ){
        	
			$usrfilter.="holiday_calendar_id ='" .$this->request->query['holidaycalendar']. "'";
		}
																	
		$contains= ['Customers', 'HolidayCalendars'];
									  
		$output =$this->ActionPopoupDatatable->getView($fields,$contains,$usrfilter);
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
            'contain' => ['Customers', 'HolidayCalendars']
        ];
        $holidays = $this->paginate($this->Holidays);

        $this->set(compact('holidays'));
        $this->set('_serialize', ['holidays']);
    }

    /**
     * View method
     *
     * @param string|null $id Holiday id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $holiday = $this->Holidays->get($id, [
            'contain' => ['Customers', 'HolidayCalendars', 'CalendarAssignments']
        ]);

        $this->set('holiday', $holiday);
        $this->set('_serialize', ['holiday']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		
        $holiday = $this->Holidays->newEntity();
        if ($this->request->is('post')) {
            $holiday = $this->Holidays->patchEntity($holiday, $this->request->data);
			$holiday['holiday_calendar_id'] = $this->request->query['hcid'];
            if ($this->Holidays->save($holiday)) {
                $this->Flash->success(__('The holiday has been saved.'));

                // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The holiday could not be saved. Please, try again.'));
            }
			$actionstring = substr($this->referer(), -3);
			if($actionstring==="add"){
				$urlstr = str_replace('add', 'edit/'.$holiday['holiday_calendar_id'], $this->referer());
				return $this->redirect($urlstr);
			}else{
				return $this->redirect($this->referer());
			}
			
        }
        $customers = $this->Holidays->Customers->find('list', ['limit' => 200]);
        $holidayCalendars = $this->Holidays->HolidayCalendars->find('list', ['limit' => 200]);
        $this->set(compact('holiday', 'customers', 'holidayCalendars'));
        $this->set('_serialize', ['holiday']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Holiday id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
	
        $holiday = $this->Holidays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $holiday = $this->Holidays->patchEntity($holiday, $this->request->data);
            if ($this->Holidays->save($holiday)) {
                $this->Flash->success(__('The holiday has been saved.'));

                // return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('The holiday could not be saved. Please, try again.'.$holiday));
				// return $this->redirect($this->referer());
            }
			$actionstring = substr($this->referer(), -3);
			if($actionstring==="add"){
				$urlstr = str_replace('add', 'edit/'.$holiday['holiday_calendar_id'], $this->referer());
				return $this->redirect($urlstr);
			}else{
				return $this->redirect($this->referer());
			}
        }
        $customers = $this->Holidays->Customers->find('list', ['limit' => 200]);
        $holidayCalendars = $this->Holidays->HolidayCalendars->find('list', ['limit' => 200]);
        $this->set(compact('holiday', 'customers', 'holidayCalendars'));
        $this->set('_serialize', ['holiday']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Holiday id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $holiday = $this->Holidays->get($id);
        if ($this->Holidays->delete($holiday)) {
            $this->Flash->success(__('The holiday has been deleted.'));
        } else {
            $this->Flash->error(__('The holiday could not be deleted. Please, try again.'));
        }
	return $this->redirect($this->referer());
    }
}
