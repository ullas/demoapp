<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Addresses Controller
 *
 * @property \App\Model\Table\AddressesTable $Addresses
 */
class ActionsController extends AppController
{
	public function terminate($id = null) {

		$this->autoRender=FALSE;
		$this->loadModel('EmploymentInfos');
		$emp = $this->EmploymentInfos->get($id, [
            'contain' => []
        ]);
		
		$emp['is_contingent_worker']=FALSE;
		$returnstr='';
        if ($this->EmploymentInfos->save($emp)) {
        	 $returnstr='The employee has been terminated.';
        }else {
        	$returnstr='The employee could not be terminated. Please, try again.';
        }
		echo $returnstr;
	}
	public function addnote($id = null) {

		$this->autoRender=FALSE;
		$this->loadModel('EmploymentInfos');
		$emp = $this->EmploymentInfos->get($id, [
            'contain' => []
        ]);
		
		$emp['notes']=FALSE;
		$returnstr='';
        if ($this->EmploymentInfos->save($emp)) {
        	 $returnstr='The employee has been terminated.';
        }else {
        	$returnstr='The employee could not be terminated. Please, try again.';
        }
		echo $returnstr;
	}
}
	