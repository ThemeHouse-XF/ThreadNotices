<?php

/**
 *
 * @see XenForo_DataWriter_Discussion_Thread
 */
class ThemeHouse_ThreadNotices_Extend_XenForo_DataWriter_Discussion_Thread extends XFCP_ThemeHouse_ThreadNotices_Extend_XenForo_DataWriter_Discussion_Thread {
	
	/**
	 *
	 * @see XenForo_DataWriter_Discussion_Thread::_getFields()
	 */
	protected function _getFields() {
		$fields = parent::_getFields ();
		$fields ['xf_thread'] ['thread_notice_th'] = array (
				'type' => self::TYPE_STRING,
				'default' => '',
		        'maxLength' => 255,
		);
		return $fields;
	} /* END _getFields */
	
	/**
	 *
	 * @see XenForo_DataWriter_Discussion_Thread::_discussionPreSave()
	 */
	protected function _discussionPreSave() {
		if (isset ( $GLOBALS ['XenForo_ControllerPublic_Forum'] )) {
			/* @var $controller XenForo_ControllerPublic_Forum */
			$controller = $GLOBALS ['XenForo_ControllerPublic_Forum'];
			$threadNotice = $controller->getInput ()->filterSingle ( 'thread_notice_th', XenForo_Input::STRING );
			if (isset ( $threadNotice )) {
				$this->set ( 'thread_notice_th', $threadNotice );
			}
		}
		return parent::_discussionPreSave ();
	} /* END _discussionPreSave */
}