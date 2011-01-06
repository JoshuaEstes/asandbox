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
 * @package    Zend_View
 * @subpackage Helper
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
<<<<<<< HEAD
 * @version    $Id: RenderToPlaceholder.php 23651 2011-01-21 21:51:00Z mikaelkael $
=======
 * @version    $Id: RenderToPlaceholder.php 20096 2010-01-06 02:05:09Z bkarwin $
>>>>>>> added Zend Framework library (1.11 branch)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

/** Zend_View_Helper_Abstract.php */
require_once 'Zend/View/Helper/Abstract.php';

/**
 * Renders a template and stores the rendered output as a placeholder
 * variable for later use.
 *
 * @package    Zend_View
 * @subpackage Helper
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

class Zend_View_Helper_RenderToPlaceholder extends Zend_View_Helper_Abstract
{

    /**
     * Renders a template and stores the rendered output as a placeholder
     * variable for later use.
     *
<<<<<<< HEAD
     * @param string $script The template script to render
     * @param string $placeholder The placeholder variable name in which to store the rendered output
=======
     * @param $script The template script to render
     * @param $placeholder The placeholder variable name in which to store the rendered output
>>>>>>> added Zend Framework library (1.11 branch)
     * @return void
     */
    public function renderToPlaceholder($script, $placeholder)
    {
        $this->view->placeholder($placeholder)->captureStart();
        echo $this->view->render($script);
        $this->view->placeholder($placeholder)->captureEnd();
    }
}
