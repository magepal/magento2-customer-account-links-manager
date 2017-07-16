## Customer Account Links Manager for Magento2
Customer Account Links Manager allows you to quickly and easily remove unwanted links added by either default magento or other third party extensions from the sidebar navigation in customer dashboard.

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

#### 1 - Installation Customer Account Links Manager
##### Manually
 * Download the extension
 * Unzip the file
 * Create a folder {Magento 2 root}/app/code/MagePal/CustomerAccountLinksManager
 * Copy the content from the unzip folder

##### Using Composer

```
composer require magepal/magento2-customeraccountlinksmanager
```

#### 2 - Enable Customer Account Links Manager (from {Magento root} folder)
 * php -f bin/magento module:enable --clear-static-content MagePal_CustomerAccountLinksManager
 * php -f bin/magento setup:upgrade

#### 3 - Configure Customer Account Links Manager

Log into your Magetno 2 Admin, then goto Stores -> Configuration -> MagePal -> Customer Account Links Manager

![image](https://cloud.githubusercontent.com/assets/1415141/25197024/7f7dea2c-2510-11e7-9785-780d7f2fc7b0.png)

![image](https://cloud.githubusercontent.com/assets/1415141/25233635/8354aa4e-25ad-11e7-87ae-55fcee1a4194.png)

