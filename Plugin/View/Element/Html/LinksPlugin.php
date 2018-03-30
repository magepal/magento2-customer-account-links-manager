<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.magepal.com | support@magepal.com
*/

namespace MagePal\CustomerAccountLinksManager\Plugin\View\Element\Html;

use MagePal\CustomerAccountLinksManager\Model\Config\Source\Action;

class LinksPlugin
{

    /** @var \MagePal\CustomerAccountLinksManager\Helper\Data */
    protected $_helperData;

    /**
     * LinksPlugin constructor.
     * @param \MagePal\CustomerAccountLinksManager\Helper\Data $helperData
     */
    public function __construct(
        \MagePal\CustomerAccountLinksManager\Helper\Data $helperData
    ) {
        $this->_helperData = $helperData;
    }

    public function aroundRenderLink(\Magento\Framework\View\Element\Html\Links $subject, \Closure $proceed, \Magento\Framework\View\Element\AbstractBlock $link)
    {
        $output = $proceed($link);

        if ($this->_helperData->isEnabled() && $subject->getNameInLayout() == 'customer_account_navigation') {
            if (Action::EXCLUDE_SELECTED == $this->_helperData->getAction()) {
                if (in_array($link->getNameInLayout(), $this->_helperData->getSectionList())) {
                    return '';
                }
            } elseif (Action::INCLUDE_SELECTED == $this->_helperData->getAction()) {
                if (!in_array($link->getNameInLayout(), $this->_helperData->getSectionList())) {
                    return '';
                }
            }
        }

        return $output;
    }
}
