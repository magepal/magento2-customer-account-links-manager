<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.magepal.com | support@magepal.com
*/

namespace MagePal\CustomerAccountLinksManager\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_ACTIVE = 'customeraccountlinksmanager/general/active';

    /**
     * Whether Tag Manager is ready to use
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ACTIVE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->scopeConfig->getValue(
            'customeraccountlinksmanager/general/action',
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     *
     * @return Array
     */
    public function getSectionList()
    {
        $list = $this->scopeConfig->getValue(
            'customeraccountlinksmanager/general/sections',
            ScopeInterface::SCOPE_STORE
        );

        return empty($list) ? [] : explode(',', $list);
    }
}
