# Magento 2 Login As Customer extension FREE

[Magento 2 Login as Customer by MpdExtensions] supports the store admin to login to customers' account and automatically save that login data. In many cases, customers face some difficulty or inconvenience in My Account page, or right in the checkout step. Login as Customer module will be a great solution for such these circumstances. The store can have a quick view after access as a customer, as a result, this can save a significant amount of time for both administrator and customers.



## 1. How to install Magento 2 Login as Customer extension
- Install via composer (recommend)
- Run the following command in Magento 2 root folder:

### 1.1 Install

```
composer require mpdextensions/module-login-as-customer
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

### 1.2 Upgrade

```
composer update mpdextensions/module-login-as-customer
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

Run compile if your store in Product mode:

```
php bin/magento setup:di:compile
```
```