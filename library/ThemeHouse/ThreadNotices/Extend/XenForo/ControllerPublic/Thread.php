<?php

/**
 *
 * @see XenForo_ControllerPublic_Thread
 */
class ThemeHouse_ThreadNotices_Extend_XenForo_ControllerPublic_Thread extends XFCP_ThemeHouse_ThreadNotices_Extend_XenForo_ControllerPublic_Thread
{
    /**
     *
     * @see XenForo_ControllerPublic_Thread::actionEdit()
     */
    public function actionEdit()
    {
        $response = parent::actionEdit ();
        if ($response instanceof XenForo_ControllerResponse_View) {
        	if (XenForo_Visitor::getInstance ()->hasPermission ( 'forum', 'createEditThreadNotice' )) {
        		$response->params ['canEditThreadNotice'] = true;
        	}
        }
        return $response;
    } /* END actionEdit */
    /**
     * Updates an existing thread.
     *
     * @see XenForo_ControllerPublic_Thread::actionSave()
     */
    public function actionSave()
    {
    	$GLOBALS['XenForo_ControllerPublic_Forum'] = $this;
    	return parent::actionSave();
    } /* END actionSave */
}