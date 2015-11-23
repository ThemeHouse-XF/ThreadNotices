<?php

class ThemeHouse_ThreadNotices_Install_Controller extends ThemeHouse_Install
{
    
    protected $_resourceManagerUrl = 'http://xenforo.com/community/resources/thread_notices.3688/';
    
    /**
     * @see ThemeHouse_Install::_getTableChanges()
     */
    protected function _getTableChanges()
    {
    	return array(
    			'xf_thread' => array(
    					'thread_notice_th' => 'VARCHAR(255) NOT NULL DEFAULT \'\'', /* END 'thread_notice_th' */
    			), /* END 'xf_thread' */
    	);
    } /* END _getTableChanges */


    protected function _postInstall()
    {
        $addOn = $this->getModelFromCache('XenForo_Model_AddOn')->getAddOnById('YoYo_');
        if ($addOn) {
            $db->query("
                UPDATE xf_thread
                    SET thread_notice_th=waindigoread_notice_waindigo");
        }
    }
}