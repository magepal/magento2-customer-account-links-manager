<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MagePal\CustomerAccountLinksManager\Helper;


class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    const XML_PATH_ACTIVE = 'customeraccountlinksmanager/general/active';

    /**
     * Whether Tag Manager is ready to use
     *
     * @return bool
     */
    public function isEnabled() {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ACTIVE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }


    /**
     * @return mixed
     */
    public function getAction(){
        return $this->scopeConfig->getValue('customeraccountlinksmanager/general/action', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     *
     * @return Array
     */
    public function getSectionList()
    {
        $list = $this->scopeConfig->getValue('customeraccountlinksmanager/general/sections', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        return empty($list) ? [] : explode(',', $list);
    }


}