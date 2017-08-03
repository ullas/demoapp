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
	
	public function ajaxData(){
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
		
		( strlen($usrfilter)>3 ) ? $usrfilter.=" and " : $usrfilter.= "";
			
		$usrfilter.="Holidays.customer_id ='".$this->loggedinuser['customer_id'] . "'";												
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

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
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

        if($holiday['customer_id']==$this->loggedinuser['customer_id'])
		{
       	   $this->set('holiday', $holiday);
        	$this->set('_serialize', ['holiday']);
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
		
        $holiday = $this->Holidays->newEntity();
        if ($this->request->is('post')) {
            $holiday = $this->Holidays->patchEntity($holiday, $this->request->data);
			$holiday['holiday_calendar_id'] = $this->request->query['hcid'];
			$holiday['customer_id']=$this->loggedinuser['customer_id'];
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
        $holidayCalendars = $this->Holidays->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
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
		
		if($holiday['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
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
        $holidayCalendars = $this->Holidays->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
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
        if($holiday['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->Holidays->delete($holiday)) {
            	$this->Flash->success(__('The holiday has been deleted.'));
        	} else {
            	$this->Flash->error(__('The holiday could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }
		$actionstring = substr($this->referer(), -3);
			if($actionstring==="add"){
				$urlstr = str_replace('add', 'edit/'.$holiday['holiday_calendar_id'], $this->referer());
				return $this->redirect($urlstr);
			}else{
				return $this->redirect($this->referer());
			}
    }
	public function deleteAll($id=null){
    	
		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
		
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->Holidays->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Holidays->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Holidays has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Holidays could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect($this->referer());
           // return $this->redirect(['action' => 'index']);	
     }
}
