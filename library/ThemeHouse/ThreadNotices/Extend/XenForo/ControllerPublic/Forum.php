<?php

/**
 *
 * @see XenForo_ControllerPublic_Forum
 */
class ThemeHouse_ThreadNotices_Extend_XenForo_ControllerPublic_Forum extends XFCP_ThemeHouse_ThreadNotices_Extend_XenForo_ControllerPublic_Forum {
	
	/**
	 *
	 * @see XenForo_ControllerPublic_Forum::actionCreateThread()
	 */
	public function actionCreateThread() {
		$response = parent::actionCreateThread ();
		if ($response instanceof XenForo_ControllerResponse_View) {
			if (XenForo_Visitor::getInstance ()->hasPermission ( 'forum', 'createEditThreadNotice' )) {
				$response->params ['canEditThreadNotice'] = true;
			}
		}
        return $response;
	} /* END actionCreateThread */
	
	/**
	 *
	 * @see XenForo_ControllerPublic_Forum::actionAddThread()
	 */
	public function actionAddThread() {
		$GLOBALS ['XenForo_ControllerPublic_Forum'] = $this;
		return parent::actionAddThread ();
	} /* END actionAddThread */
}