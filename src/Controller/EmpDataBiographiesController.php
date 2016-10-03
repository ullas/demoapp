<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmpDataBiographies Controller
 *
 * @property \App\Model\Table\EmpDataBiographiesTable $EmpDataBiographies
 */
class EmpDataBiographiesController extends AppController
{
	var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;

		$fields = array(array('name'=>'id','type'=>'int'),'name',array('name'=>'date_of_birth','type'=>'date'),'country_of_birth','region_of_birth','place_of_birth','birth_name',array('name'=>'date_of_death ','type'=>'date'),'person_id_external');
									  
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
        $empDataBiographies = $this->paginate($this->EmpDataBiographies);

        $this->set(compact('empDataBiographies'));
        $this->set('_serialize', ['empDataBiographies']);
    }

    /**
     * View method
     *
     * @param string|null $id Emp Data Biography id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $empDataBiography = $this->EmpDataBiographies->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('empDataBiography', $empDataBiography);
        $this->set('_serialize', ['empDataBiography']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $empDataBiography = $this->EmpDataBiographies->newEntity();
        if ($this->request->is('post')) {
            $empDataBiography = $this->EmpDataBiographies->patchEntity($empDataBiography, $this->request->data);
            if ($this->EmpDataBiographies->save($empDataBiography)) {
                $this->Flash->success(__('The emp data biography has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emp data biography could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EmpDataBiographies->Customers->find('list', ['limit' => 200]);
        $this->set(compact('empDataBiography', 'customers'));
        $this->set('_serialize', ['empDataBiography']);
    }
    public function addwizard()
    {
        $empDataBiography = $this->EmpDataBiographies->newEntity();
        if ($this->request->is('post')) {
            $empDataBiography = $this->EmpDataBiographies->patchEntity($empDataBiography, $this->request->data);
			$empDataBiography['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->EmpDataBiographies->save($empDataBiography)) {
                $this->Flash->success(__('The emp data biography has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emp data biography could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EmpDataBiographies->Customers->find('list', ['limit' => 200]);
        $this->set(compact('empDataBiography', 'customers'));
        $this->set('_serialize', ['empDataBiography']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Emp Data Biography id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empDataBiography = $this->EmpDataBiographies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empDataBiography = $this->EmpDataBiographies->patchEntity($empDataBiography, $this->request->data);
            if ($this->EmpDataBiographies->save($empDataBiography)) {
                $this->Flash->success(__('The emp data biography has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emp data biography could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EmpDataBiographies->Customers->find('list', ['limit' => 200]);
        $this->set(compact('empDataBiography', 'customers'));
        $this->set('_serialize', ['empDataBiography']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Emp Data Biography id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empDataBiography = $this->EmpDataBiographies->get($id);
        if ($this->EmpDataBiographies->delete($empDataBiography)) {
            $this->Flash->success(__('The emp data biography has been deleted.'));
        } else {
            $this->Flash->error(__('The emp data biography could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
