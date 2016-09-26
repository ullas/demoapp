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

		$fields = array(array('name'=>'id','type'=>'int'),'ws_name ',array('name'=>'flex_request_allowed','type'=>'bool'),
									  'country',array('name'=>'hours_day','type'=>'int'),array('name'=>'hours_week','type'=>'int'),array('name'=>'hours_month','type'=>'int'),array('name'=>'hours_year','type'=>'int'),
									  array('name'=>'days_week','type'=>'int'),array('name'=>'ws_days','type'=>'int'),'model',array('name'=>'start_date','type'=>'date'),array('name'=>'day1_planhours','type'=>'numeric'),
									  array('name'=>'day2_planhours','type'=>'numeric'),array('name'=>'day3_planhours','type'=>'numeric'),array('name'=>'day4_planhours','type'=>'numeric'),array('name'=>'day5_planhours','type'=>'numeric'),
									  array('name'=>'day5_planhours','type'=>'numeric'),array('name'=>'day7_planhours','type'=>'numeric'),array('name'=>'day_n_hours','type'=>'numeric'),
									  'employee','time_rec_variant_1','category',array('name'=>'day','type'=>'numeric'),array('name'=>'start_time time','type'=>'time'),
									  array('name'=>'end_time','type'=>'time'),'shift_class',array('name'=>'planned_hours','type'=>'numeric'),array('name'=>'planned_hours_minutes','type'=>'time'),
									  'day_model','time_rec_variant_2','search_field',array('name'=>'starting_date','type'=>'date'),'period_model','time_rec_variant_3',
									  'ws_code');
									  
		$output =$this->Datatable->getView($fields);
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
            'contain' => ['Customers']
        ];
        $workSchedules = $this->paginate($this->WorkSchedules);

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

        $this->set('workSchedule', $workSchedule);
        $this->set('_serialize', ['workSchedule']);
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
        if ($this->WorkSchedules->delete($workSchedule)) {
            $this->Flash->success(__('The work schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The work schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
