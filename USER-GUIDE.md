## Documentation

- Installation guide: https://www.mpdextensions.com/install-magento-2-extension/#solution-1-ready-to-paste
- User Guide: https://docs.mpdextensions.com/login-as-customer/
- Product page: https://www.mpdextensions.com/magento-2-login-as-customer/
- FAQs: https://www.mpdextensions.com/faqs/
- Get Support: https://www.mpdextensions.com/contact.html or support@mpdextensions.com
- Changelog: https://www.mpdextensions.com/releases/login-as-customer/
- License agreement: https://www.mpdextensions.com/LICENSE.txt

## How to install

### Install ready-to-paste package (Recommended)

- Installation guide: https://www.mpdextensions.com/install-magento-2-extension/

## How to upgrade

1. Backup

Backup your Magento code, database before upgrading.

2. Remove LoginAsCustomer folder

In case of customization, you should backup the customized files and modify in newer version.
Now you remove `app/code/Mpdextensions/LoginAsCustomer` folder. In this step, you can copy override LoginAsCustomer folder but this may cause of compilation issue. That why you should remove it.

3. Upload new version
Upload this package to Magento root directory

4. Run command line:

```
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

## Support

- FAQs: https://www.mpdextensions.com/faqs/
- https://support.mpdextensions.com/
- support@mpdextensions.com
