<?php

class ThemeHouse_ThreadNotices_Listener_LoadClass extends ThemeHouse_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'ThemeHouse_ThreadNotices' => array(
                'datawriter' => array(
                    'XenForo_DataWriter_Discussion_Thread'
                ), /* END 'datawriter' */
                'controller' => array(
                    'XenForo_ControllerPublic_Forum',
                    'XenForo_ControllerPublic_Thread'
                ), /* END 'controller' */
            ), /* END 'ThemeHouse_ThreadNotices' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassDataWriter($class, array &$extend)
    {
        $extend = self::createAndRun('ThemeHouse_ThreadNotices_Listener_LoadClass', $class, $extend, 'datawriter');
    } /* END loadClassDataWriter */

    public static function loadClassController($class, array &$extend)
    {
        $extend = self::createAndRun('ThemeHouse_ThreadNotices_Listener_LoadClass', $class, $extend, 'controller');
    } /* END loadClassController */
}