<?php
namespace App\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;
use Cake\I18n\Date;
use Cake\Database\Type;
use App\Controller\AppController;

/**
 * Locations Controller
 *
 * @property \App\Model\Table\LocationsTable $Locations
 */
class LocationsController extends AppController
{
	var $components = array('Datatable');
	
	
	public function initialize()
	{
    	parent::initialize();

    	// Time::setDefaultLocale('fr_FR'); // For any mutable DateTime
		// FrozenTime::setDefaultLocale('fr_FR'); // For any immutable DateTime
		// Date::setDefaultLocale('fr_FR'); // For any mutable Date
		// FrozenDate::setDefaultLocale('fr_FR'); // For any immutable Date

		// Time::setToStringFormat("dd/MM/YYYY"); // For any mutable DateTime
		// FrozenTime::setToStringFormat("dd/MM/YYYY"); // For any immutable DateTime
		// Date::setToStringFormat("dd/MM/YYYY"); // For any mutable Date
		// FrozenDate::setToStringFormat("dd/MM/YYYY"); // For any immutable Date
	}
	
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
        $locations = $this->paginate($this->Locations);

        $this->set(compact('locations'));
        $this->set('_serialize', ['locations']);
    }

    /**
     * View method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $location = $this->Locations->get($id, [
            'contain' => ['Customers', 'LegalEntities']
        ]);
		if($regions['customer_id']==$this->loggedinuser['customer_id']){
 			$this->set('location', $location);
        	$this->set('_serialize', ['location']);
 		}else{
		   $this->redirect(['action' => 'logout','controller'=>'users']);
        } 
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $location = $this->Locations->newEntity();
        if ($this->request->is('post')) {
            $location = $this->Locations->patchEntity($location, $this->request->data);
            if ($this->Locations->save($location)) {
                $this->Flash->success(__('The location has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The location could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Locations->Customers->find('list', ['limit' => 200]);
        $this->set(compact('location', 'customers'));
        $this->set('_serialize', ['location']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $location = $this->Locations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {   
            $location = $this->Locations->patchEntity($location, $this->request->data);
			
            if ($this->Locations->save($location)) {
                $this->Flash->success(__('The location has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The location could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Locations->Customers->find('list', ['limit' => 200]);
        $this->set(compact('location', 'customers'));
        $this->set('_serialize', ['location']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $location = $this->Locations->get($id);
        if ($this->Locations->delete($location)) {
            $this->Flash->success(__('The location has been deleted.'));
        } else {
            $this->Flash->error(__('The location could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
