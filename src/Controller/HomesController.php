<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Homes Controller
 *
 * @property \App\Model\Table\HomesTable $Homes
 */
class HomesController extends AppController
{
	public function initialize()
    {
    	parent::initialize();
	}
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

		//redirect to the stepform wizard 
		if( (isset($this->counts['legalentity']) && $this->counts['legalentity'] <1) || (isset($this->counts['businessunit']) && $this->counts['businessunit'] <1) || 
			(isset($this->counts['division']) && $this->counts['division'] <1) || (isset($this->counts['department']) && $this->counts['department'] <1) ||
			(isset($this->counts['costcenter']) && $this->counts['costcenter'] <1) || (isset($this->counts['position']) && $this->counts['position'] <1) || 
			(isset($this->counts['employee']) && $this->counts['employee'] <1))
		{
			return $this->redirect( ['controller' => 'LegalEntities', 'action' => 'addwizard'] );
		}
    	//legalentities
       $legalEntities = $this->paginate($this->LegalEntities);


		//get empid from session var
		$empid=$this->request->session()->read('sessionuser')['employee_id'];
		
		$this->loadModel('EmpDataBiographies');
		$emparr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $empid),'contain' => []])->toArray();
		isset($emparr[0]) ? $posid = $emparr[0]['position_id'] : $posid = "" ; 
		
		$myteam = $this->EmpDataBiographies->find('all')->where(['position_id >' => $posid])->toArray();
		$this->set('myteam',$myteam);
		// $this->loadModel('Positions');
		// $myteam = $this->Positions->find('all')->where(['id >=' => $posid])->toArray();
		// $this->log(json_encode($myteam));
        
		//homes
        $homes = $this->paginate($this->Homes);

        $this->set(compact('homes'));
        $this->set('_serialize', ['homes']);
    }

    /**
     * View method
     *
     * @param string|null $id Home id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $home = $this->Homes->get($id, [
            'contain' => []
        ]);

        $this->set('home', $home);
        $this->set('_serialize', ['home']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $home = $this->Homes->newEntity();
        if ($this->request->is('post')) {
            $home = $this->Homes->patchEntity($home, $this->request->data);
            if ($this->Homes->save($home)) {
                $this->Flash->success(__('The home has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The home could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('home'));
        $this->set('_serialize', ['home']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Home id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $home = $this->Homes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $home = $this->Homes->patchEntity($home, $this->request->data);
            if ($this->Homes->save($home)) {
                $this->Flash->success(__('The home has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The home could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('home'));
        $this->set('_serialize', ['home']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Home id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $home = $this->Homes->get($id);
        if ($this->Homes->delete($home)) {
            $this->Flash->success(__('The home has been deleted.'));
        } else {
            $this->Flash->error(__('The home could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
