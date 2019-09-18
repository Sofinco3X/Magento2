<?php
/**
 * Sofinco Epayment module for Magento
 *
 * Feel free to contact Sofinco at support@paybox.com for any
 * question.
 *
 * LICENSE: This source file is subject to the version 3.0 of the Open
 * Software License (OSL-3.0) that is available through the world-wide-web
 * at the following URI: http://opensource.org/licenses/OSL-3.0. If
 * you did not receive a copy of the OSL-3.0 license and are unable
 * to obtain it through the web, please send a note to
 * support@paybox.com so we can mail you a copy immediately.
 *
 * @version   1.0.7-psr
 * @author    BM Services <contact@bm-services.com>
 * @copyright 2012-2017 Sofinco
 * @license   http://opensource.org/licenses/OSL-3.0
 * @link      http://www.paybox.com/
 */

namespace Sofinco\Epayment\Block\Admin;

use Magento\Framework\View\Element\Template;

class Presentation extends Template
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate($this->getHtmlTemplate());
    }

    public function getHtmlTemplate()
    {
        $manager = \Magento\Framework\App\ObjectManager::getInstance();
        $config  = $manager->get('Sofinco\Epayment\Model\Config');
        $lang = $manager->get('Magento\Framework\Locale\Resolver');
        if (!empty($lang)) {
            $lang = preg_replace('#_.*$#', '', $lang->getLocale());
        }
        if (!in_array($lang, ['fr', 'en'])) {
            $lang = 'en';
        }
        return 'sfco/presentation/'.$lang.'.phtml';
    }
}
