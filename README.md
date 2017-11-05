## Customer Account Links Manager for Magento2
Customer Account Links Manager allows you to quickly and easily remove unwanted links added by either default magento or other third party extensions from the sidebar navigation in customer dashboard.

![Customer Account Links Manager for Magento2](https://cloud.githubusercontent.com/assets/1415141/25197024/7f7dea2c-2510-11e7-9785-780d7f2fc7b0.png)

![Customer Account Links Manager for Magento2](https://cloud.githubusercontent.com/assets/1415141/25233635/8354aa4e-25ad-11e7-87ae-55fcee1a4194.png)

### Features
 - Remove navigation links from account dashboard sidebar added by:
   - default Magento 
   - third party extensions
   
 - No code or template modification 
 
 - Switch on/off menu dashboard links easily via Magento backend.
 
 #### Remove Customer Account Links
 - NewsLetter Subscriptions
 - Billing Agreements / Subscription
 - My Product Reviews
 - Stored Payment Methods
 - My wish List
 - My Downloadable Products
 - Customer Balance
 - My Credit Cards
 - Gift Card
 - Gift Registry
 - Reward points
 - Order by SKU

## Installation

#### Step 1 - Installation Customer Account Links Manager

##### Using Composer  (recommended)

```
composer require magepal/magento2-customeraccountlinksmanager
```

##### Manually
 * Download the extension
 * Unzip the file
 * Create a folder {Magento 2 root}/app/code/MagePal/CustomerAccountLinksManager
 * Copy the content from the unzip folder

#### Step 2 - Enable Customer Account Links Manager (from {Magento root} folder)
 * php -f bin/magento module:enable --clear-static-content MagePal_CustomerAccountLinksManager
 * php -f bin/magento setup:upgrade

#### Step 3 - Configure Customer Account Links Manager

Log into your Magento 2 Admin, then goto Stores -> Configuration -> MagePal -> Customer Account Links Manager

Contribution
---
Want to contribute to this extension? The quickest way is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).


Support
---
If you encounter any problems or bugs, please open an issue on [GitHub](https://github.com/magepal/magento2-customeraccountlinksmanager/issues).

Need help setting up or want to customize this extension to meet your business needs? Please email support@magepal.com and if we like your idea we will add this feature for free or at a discounted rate.

© MagePal LLC.
