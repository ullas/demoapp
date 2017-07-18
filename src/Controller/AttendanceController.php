<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Attendance Controller
 *
 * @property \App\Model\Table\AttendanceTable $Attendance
 */
class AttendanceController extends AppController
{

    var $components = array('Attendancetable');
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
		$contains=['Employees'];
									  
		$usrfilter="Attendance.employee_id='".$this->loggedinuser['employee_id'] . "' and Attendance.customer_id ='".$this->loggedinuser['customer_id'] . "'";	 
		
		$limit=false;
		
		if( isset($this->request->query['filter']) && ($this->request->query['filter'])!=null && strlen($usrfilter)>3){
      
			if($this->request->query['filter'] == "five"){$limit=TRUE;}
			else if($this->request->query['filter'] == "week"){$usrfilter.=" and ((DATE(time_in) BETWEEN 
							NOW()::DATE-EXTRACT(DOW FROM NOW())::INTEGER   AND NOW()::DATE-EXTRACT(DOW from NOW())::INTEGER+6) OR (DATE(time_out) BETWEEN 
							NOW()::DATE-EXTRACT(DOW FROM NOW())::INTEGER   AND NOW()::DATE-EXTRACT(DOW from NOW())::INTEGER+6))";}
			else if($this->request->query['filter'] == "month"){$usrfilter.=" and ((EXTRACT(MONTH FROM time_in) = EXTRACT(month FROM CURRENT_DATE)) 
																												OR (EXTRACT(MONTH FROM time_out) = EXTRACT(month FROM CURRENT_DATE)))";}
		}
		
		$output =$this->Attendancetable->getView($fields,$contains,$usrfilter,$limit);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);
		
		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);
		
        $this->paginate = [
            'contain' => ['Employees']
        ];
        $attendance = $this->paginate($this->Attendance);

        $this->set(compact('attendance'));
        $this->set('_serialize', ['attendance']);
		
		$this->loadModel('Attendance');
		$attendances=$this->Attendance->find('all')->where(['employee_id' => $this->loggedinuser['employee_id'],'Attendance.customer_id' => $this->loggedinuser['customer_id']])->order(['id' => 'DESC'])->toArray();	
		$clockstatus=FALSE;
		if(isset($attendances[0])){
			if(isset($attendances[0]['time_out'])){
				$clockstatus=FALSE;
			}else{
				if(isset($attendances[0]['time_in'])){
					$clockstatus=TRUE;
				}else{
					$clockstatus=FALSE;
				}
			}
		}
		$this->set('clockstatus', json_encode($clockstatus));
    }
	public function clockinout(){
		$this->autoRender= False;
		if($this->request->is('ajax')) {
						
			if ($this->request->data['clockstatus'] == "true"){
				$attendance = $this->Attendance->newEntity();
				$attendance['time_in']=date("Y-m-d h:i:sa");
			}else if ($this->request->data['clockstatus'] == "false"){
				
				$arr = $this->Attendance->find('all',[ 'conditions' => array('employee_id' => $this->loggedinuser['employee_id'],'customer_id'=>$this->loggedinuser['customer_id'] )])->order(['id' => 'DESC'])->toArray();
				isset($arr[0]) ? $attendance = $arr[0] : $attendance = $this->Attendance->newEntity();
				$attendance = $this->Attendance->patchEntity($attendance, $this->request->data);
            
				$attendance['time_out']=date("Y-m-d h:i:sa");
			}
			$attendance['employee_id']=$this->loggedinuser['employee_id'];
			// $attendance['date']=date("Y-m-d");
			$attendance['customer_id']=$this->loggedinuser['customer_id'];
			
            if ($this->Attendance->save($attendance)){
            	$this->response->body("success");
	    		return $this->response;
			}else{
				$this->response->body("error");
	    		return $this->response;
			}	
		}
	}
    /**
     * View method
     *
     * @param string|null $id Attendance id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attendance = $this->Attendance->get($id, [
            'contain' => ['Employees']
        ]);

        $this->set('attendance', $attendance);
        $this->set('_serialize', ['attendance']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attendance = $this->Attendance->newEntity();
        if ($this->request->is('post')) {
            $attendance = $this->Attendance->patchEntity($attendance, $this->request->data);
            if ($this->Attendance->save($attendance)) {
                $this->Flash->success(__('The attendance has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The attendance could not be saved. Please, try again.'));
            }
        }
        $employees = $this->Attendance->Employees->find('list', ['limit' => 200]);
        $this->set(compact('attendance', 'employees'));
        $this->set('_serialize', ['attendance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attendance id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attendance = $this->Attendance->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attendance = $this->Attendance->patchEntity($attendance, $this->request->data);
            if ($this->Attendance->save($attendance)) {
                $this->Flash->success(__('The attendance has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The attendance could not be saved. Please, try again.'));
            }
        }
        $employees = $this->Attendance->Employees->find('list', ['limit' => 200]);
        $this->set(compact('attendance', 'employees'));
        $this->set('_serialize', ['attendance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attendance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attendance = $this->Attendance->get($id);
        if ($this->Attendance->delete($attendance)) {
            $this->Flash->success(__('The attendance has been deleted.'));
        } else {
            $this->Flash->error(__('The attendance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
