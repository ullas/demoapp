<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayGrades Controller
 *
 * @property \App\Model\Table\PayGradesTable $PayGrades
 */
class PayGradesController extends AppController
{

var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;

		$fields = array(array('name'=>'id','type'=>'int'),'name','description',array('name'=>'status','type'=>'bool'),array('name'=>'start_date','type'=>'date'),array('name'=>'end_date','type'=>'date'),array('name'=>'pay_grade_level','type'=>'numeric'),
		'external_code');
		
						  
									  
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
        $payGrades = $this->paginate($this->PayGrades);

        $this->set(compact('payGrades'));
        $this->set('_serialize', ['payGrades']);
    }

    /**
     * View method
     *
     * @param string|null $id Pay Grade id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payGrade = $this->PayGrades->get($id, [
            'contain' => ['Customers', 'JobClasses']
        ]);

        $this->set('payGrade', $payGrade);
        $this->set('_serialize', ['payGrade']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payGrade = $this->PayGrades->newEntity();
        if ($this->request->is('post')) {
            $payGrade = $this->PayGrades->patchEntity($payGrade, $this->request->data);
            if ($this->PayGrades->save($payGrade)) {
                $this->Flash->success(__('The pay grade has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay grade could not be saved. Please, try again.'));
            }
        }
        $customers = $this->PayGrades->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payGrade', 'customers'));
        $this->set('_serialize', ['payGrade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Grade id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payGrade = $this->PayGrades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payGrade = $this->PayGrades->patchEntity($payGrade, $this->request->data);
            if ($this->PayGrades->save($payGrade)) {
                $this->Flash->success(__('The pay grade has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay grade could not be saved. Please, try again.'));
            }
        }
        $customers = $this->PayGrades->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payGrade', 'customers'));
        $this->set('_serialize', ['payGrade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Grade id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payGrade = $this->PayGrades->get($id);
        if ($this->PayGrades->delete($payGrade)) {
            $this->Flash->success(__('The pay grade has been deleted.'));
        } else {
            $this->Flash->error(__('The pay grade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
