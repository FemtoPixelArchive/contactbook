<?php
/**
 * Save contact sharing updates
 *
 */
class Ajax_UpdatesharecontactController extends Zend_Controller_Action {

	protected function _setAnswer($message) {
		$response = $this->getResponse();
		$response->clearBody();
		$response->setHeader('Content-Type', 'text/html; charset=UTF-8', true);
		$response->setBody($message);
	}
	/**
	 * Default action called by AjaxController
	 *
	 * Match the posted ID to the right action to do
	 */
	public function indexAction() {
		$this->getHelper('viewRenderer')->setNoRender(true);
		$this->view->setLayout ( 'default' );
		$this->view->setCacheLife(0);
		$user = new Annuaire_Contact((int)$_POST['id']);
		$uid = Annuaire_User::getCurrentUserId();
		$share = new Annuaire_Share();
		if (!$share->allowContact($user->getId())) {
			$this->_setAnswer (t_("Not your contact"));
			return;
		}

		$this->getHelper('viewRenderer')->setNoRender(false);
		$result = $share->getSharedByContactId($user->getId());
		$shared = Array();
		foreach ($result as $item) {
			$shared[$item['USER_ID']]['shareid'] = $item['SHARE_ID'];
			$shared[$item['USER_ID']]['id'] = $item['USER_ID'];
			$shared[$item['USER_ID']]['mail'] = $item['USER_MAIL'];
			$shared[$item['USER_ID']]['modify'] = (($item['WRITEABLE'] == '1') ? 'true' : 'false');
		}
		$this->view->id = $user->getId();
		$this->view->admin = (($user->getUserId() == $uid) ? 1 : 0);
		$this->view->sharearray = $shared;
		$this->view->delete = t_('Delete');
		$this->view->modify = t_('Modifiable');
	}
}