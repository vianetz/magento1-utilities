Vianetz Utilities Extension for Magento
=======================================

Facts
-----
- version: 1.0.4
- extension key: Vianetz_Utilities

Description
-----------
This module for the Magento online shop software offers several single enhancements under one extension, i.e.
- activate block caching for navigation, breadcrumbs and product list
- change costly getSortedAttributes() call
- add helper method to remove links from customer navigation
- helper method for referrer url
- 

Requirements
------------
- PHP >= 5.2.0
- Mage_Core

Compatibility
-------------
- Magento >= 1.7

Installation Instructions
-------------------------
For installation notes please see also http://www.vianetz.com/en/faq/how-to-install-the-magento-extension.html.

1. Do a backup of your Magento installation for safety reasons.
2. Disable Magento compilation feature (if activated): System->Tools->Compiler
3. Unzip the setup package and copy the contents of the src/ folder into the Magento root folder. (The folder structure
   is the same as in your Magento installation. No files will be overwritten.)
   Please assure that the files are uploaded with the same file user permissions as the Magento installation!
4. Clear the Magento cache (and related caches like APC if available)
5. Logout from the admin panel and then login again
6. Enable the Magento compilation feature (if it was activated before): System->Tools->Compiler

As an alternative you can install the module via modman.
Please find more information about that installation method at https://github.com/colinmollenhour/modman
(Thanks @colinmollenhour)

We also offer paid installation services. If you are interested please contact me at support@vianetz.com.

Uninstallation
--------------
1. Remove the folder app/code/community/Vianetz/CustomerUtilities
2. Remove the file app/etc/modules/Vianetz/CustomerUtilities.xml

Frequently Asked Questions
--------------------------
Please find the Frequently Asked Questions on our website www.vianetz.com/en/faq.

Support
-------
If you have any issues or suggestions with this extension, please do not hesitate to
contact me at https://www.vianetz.com/en/contacts or support@vianetz.com.

Developer
---------
Christoph Massmann
[http://www.vianetz.com](http://www.vianetz.com)
[@vianetz](https://twitter.com/vianetz)

Licence
-------
[GNU GENERAL PUBLIC LICENSE](http://www.gnu.org/licenses/gpl-2.0.txt)

Copyright
---------
(c) 2008-15 vianetz

This Magento Extension uses Semantic Versioning - please find more information at http://semver.org.
