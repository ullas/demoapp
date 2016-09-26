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
	
	public function ajaxData() {
		$this->autoRender= False;

		$fields = array('calendar','assignmentyear',array('name'=>'assignmentdate','type'=>'date'),array('name'=>'user_id','type'=>'bigint'),array('name'=>'holiday_id','type'=>'bigint'));
									  
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
            'contain' => ['Users', 'Holidays', 'Customers']
        ];
        $calendarAssignments = $this->paginate($this->CalendarAssignments);

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
            'contain' => ['Users', 'Holidays', 'Customers']
        ]);

        $this->set('calendarAssignment', $calendarAssignment);
        $this->set('_serialize', ['calendarAssignment']);
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
            if ($this->CalendarAssignments->save($calendarAssignment)) {
                $this->Flash->success(__('The calendar assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calendar assignment could not be saved. Please, try again.'));
            }
        }
        $users = $this->CalendarAssignments->Users->find('list', ['limit' => 200]);
        $holidays = $this->CalendarAssignments->Holidays->find('list', ['limit' => 200]);
        $customers = $this->CalendarAssignments->Customers->find('list', ['limit' => 200]);
        $this->set(compact('calendarAssignment', 'users', 'holidays', 'customers'));
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $calendarAssignment = $this->CalendarAssignments->patchEntity($calendarAssignment, $this->request->data);
            if ($this->CalendarAssignments->save($calendarAssignment)) {
                $this->Flash->success(__('The calendar assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The calendar assignment could not be saved. Please, try again.'));
            }
        }
        $users = $this->CalendarAssignments->Users->find('list', ['limit' => 200]);
        $holidays = $this->CalendarAssignments->Holidays->find('list', ['limit' => 200]);
        $customers = $this->CalendarAssignments->Customers->find('list', ['limit' => 200]);
        $this->set(compact('calendarAssignment', 'users', 'holidays', 'customers'));
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
        if ($this->CalendarAssignments->delete($calendarAssignment)) {
            $this->Flash->success(__('The calendar assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The calendar assignment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
