<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Log
 * @subpackage Formatter
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
<<<<<<< HEAD
 * @version    $Id: Firebug.php 23648 2011-01-21 19:04:20Z intiilapa $
 */

/** Zend_Log_Formatter_Abstract */
require_once 'Zend/Log/Formatter/Abstract.php';
=======
 * @version    $Id: Firebug.php 20096 2010-01-06 02:05:09Z bkarwin $
 */

/** Zend_Log_Formatter_Interface */
require_once 'Zend/Log/Formatter/Interface.php';
>>>>>>> added Zend Framework library (1.11 branch)

/**
 * @category   Zend
 * @package    Zend_Log
 * @subpackage Formatter
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
<<<<<<< HEAD
class Zend_Log_Formatter_Firebug extends Zend_Log_Formatter_Abstract
{
    /**
	 * Factory for Zend_Log_Formatter_Firebug classe
	 *
     * @param array|Zend_Config $options useless
	 * @return Zend_Log_Formatter_Firebug
     */
    public static function factory($options)
    {
        return new self;
    }

    /**
=======
class Zend_Log_Formatter_Firebug implements Zend_Log_Formatter_Interface
{
    /**
>>>>>>> added Zend Framework library (1.11 branch)
     * This method formats the event for the firebug writer.
     *
     * The default is to just send the message parameter, but through
     * extension of this class and calling the
     * {@see Zend_Log_Writer_Firebug::setFormatter()} method you can
     * pass as much of the event data as you are interested in.
     *
     * @param  array    $event    event data
     * @return mixed              event message
     */
    public function format($event)
    {
        return $event['message'];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> added Zend Framework library (1.11 branch)
