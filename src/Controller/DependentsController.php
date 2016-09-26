<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dependents Controller
 *
 * @property \App\Model\Table\DependentsTable $Dependents
 */
class DependentsController extends AppController
{
var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;

		$fields = array('relationship_type',array('name'=>'is_accompanying_dependent','type'=>'bool'), array('name'=>'is_beneficiary','type'=>'bool'),'first_name','last_name','middle_name','salutation', array('name'=>'date_of_birth','type'=>'date'), 'country_of_birth', 'country');
									  
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
            'contain' => ['EmpDataBiographies', 'Customers']
        ];
        $dependents = $this->paginate($this->Dependents);

        $this->set(compact('dependents'));
        $this->set('_serialize', ['dependents']);
    }

    /**
     * View method
     *
     * @param string|null $id Dependent id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dependent = $this->Dependents->get($id, [
            'contain' => ['EmpDataBiographies', 'Customers']
        ]);

        $this->set('dependent', $dependent);
        $this->set('_serialize', ['dependent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dependent = $this->Dependents->newEntity();
        if ($this->request->is('post')) {
            $dependent = $this->Dependents->patchEntity($dependent, $this->request->data);
            if ($this->Dependents->save($dependent)) {
                $this->Flash->success(__('The dependent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dependent could not be saved. Please, try again.'));
            }
        }
        $empDataBiographies = $this->Dependents->EmpDataBiographies->find('list', ['limit' => 200]);
        $customers = $this->Dependents->Customers->find('list', ['limit' => 200]);
        $this->set(compact('dependent', 'empDataBiographies', 'customers'));
        $this->set('_serialize', ['dependent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dependent id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dependent = $this->Dependents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dependent = $this->Dependents->patchEntity($dependent, $this->request->data);
            if ($this->Dependents->save($dependent)) {
                $this->Flash->success(__('The dependent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dependent could not be saved. Please, try again.'));
            }
        }
        $empDataBiographies = $this->Dependents->EmpDataBiographies->find('list', ['limit' => 200]);
        $customers = $this->Dependents->Customers->find('list', ['limit' => 200]);
        $this->set(compact('dependent', 'empDataBiographies', 'customers'));
        $this->set('_serialize', ['dependent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dependent id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dependent = $this->Dependents->get($id);
        if ($this->Dependents->delete($dependent)) {
            $this->Flash->success(__('The dependent has been deleted.'));
        } else {
            $this->Flash->error(__('The dependent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
