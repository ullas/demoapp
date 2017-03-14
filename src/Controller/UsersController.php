<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

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
        $users = $this->paginate($this->Users);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add','logout']);
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
            	
				//to check if the employee is visible or not
				$this->loadModel('Employees');
				$emparr=$this->Employees->find('all',['conditions' => array('id' => $user['employee_id']),'contain' => []])->toArray();
				(isset($emparr[0])) ? $visible = $emparr[0]['visible'] : $visible = "" ;
				
				if($visible=="1"){
					$this->Auth->setUser($user);
                	return $this->redirect($this->Auth->redirectUrl());
				}else{
					$this->Flash->error(__('Employee has been deleted !'));
				}
                
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Customers', 'CalendarAssignments']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
            	//sending confirmation email
				$email = new Email();
        		$email->transport('webmail');

				$mailop ="and the confirmation mail sent.";
				$msg="Hello,\n\n    Thank you for registering at MayHaw. \n\nYour account: \n\n Username:" .$user['username']. " \n Password:" .$user['password']. " \n\nBest, \nMayHaw Team.";
        		try {
            		$res = $email->to(['renjith@maptell.com' => 'noreply@mayhaw.com'])
                  		->subject('MayHaw')                   
                 		 ->send($msg);

       		 	} catch (Exception $e) {

            		echo 'Exception : ',  $e->getMessage(), "\n";
					$mailop ="and the confirmation mail not sent.";
        		}
		
                $this->Flash->success(__('The user has been saved.'.$mailop));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Users->Customers->find('list', ['limit' => 200]);
        $this->set(compact('user', 'customers'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user preferences has been updated! ...Please login to continue'));

                return $this->redirect(['action' => 'logout','controller'=>'Users']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Users->Customers->find('list', ['limit' => 200]);
        $this->set(compact('user', 'customers'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function deleteAll($id=null){
    	
		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->Users->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Users->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Users has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Users could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
