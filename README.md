# USPS Shipping (RESTful) for Zen Cart

![ZC-USPSRestful](https://socialify.git.ci/retched/ZC-USPSRestful-PHP5/image?custom_description=A%20USPS%20shipping%20module%20for%20ZenCart%2C%20for%20PHP5%20users&description=1&font=Inter&forks=1&issues=1&language=1&name=1&owner=0&pattern=Signal&pulls=1&stargazers=1&theme=Auto)

![Coded with PHP](https://img.shields.io/badge/php-purple?style=flat&logo=php&logoColor=white&labelColor=black)  ![License via GPL 3.0](https://img.shields.io/badge/license-GPL-black?style=flat&logoColor=black&label=license&labelColor=black&color=851185) ![Last Commit](https://badgen.net/github/last-commit/retched/ZC-USPSRestful-PHP5?color=851185&labelColor=white)  ![Latest Release](https://badgen.net/github/release/retched/ZC-USPSRestful-PHP5/stable?color=851185&labelColor=black&labelColor=white)

This module provides ZenCart sellers the ability to offer United States Postal Service (USPS) shipping rates to their customers during checkout. This is done by pulling the rates directly from the USPS RestAPI.

This module will work with PHP 5 only. It has been tested with Zencart 1.3.8 up to ZenCart version 1.5.4.

For the PHP 7/8 version, please visit the [original USPSRestful repository](https://github.com/retched/ZC-USPSRestful).

## Module Version

- Latest Release: -NONE-
  _Still in development._

### Version/Release History

- 0.0.0  
  _Development version. This version contains an incomplete thought and should not be used in production unless you are sure what you are doing. The version from the ZenCart Module database [was only a placeholder](https://www.zen-cart.com/showthread.php?230478-pluginID-of-yet-to-be-submitted-encapsulated-plugin). Pulling from the repository is not recommended. Use the [Releases](https://github.com/retched/ZC-USPSRestful-PHP5/releases) instead._

## Additional Links

- [ZC-USPSRestful Wiki](https://github.com/retched/ZC-USPSRestful-PHP5/wiki/) - The wiki for the project.
- [USPS API Documentation](https://developers.usps.com/apis) - This API takes advantage of five APIs: _Domestic Prices 3.0, International Prices 3.0, Service Standards 3.0, and OAuth 3.0._
- [ZenCart Support Thread](https://www.zen-cart.com/showthread.php?230512-USPS-Shipping-(RESTful)-(USPSr)) - This thread is only for THIS version of the USPS module. For assistance with the original USPS module, which uses the WebTools API, you should post in [its megathread](https://www.zen-cart.com/showthread.php?227284-USPS-Shipping-Module-Support-Thread) on the ZenCart forums.
- [Personal Discord Server](https://discord.gg/cZCJ8za7zg) - You can use this reach out to me via DMs or by commenting in the appropriate channel. Please be mindful of etiquette and rules.
- [Requesting a higher quota threshold](https://github.com/retched/ZC-USPSRestful-PHP5/wiki/Requesting-a-higher-quota-threshold) - A guide on how to request a higher threshold for using the API. This is necessary if you are getting the `429 - Too Many Requests` error.

## Setup, Install, and Upgrading

Unlike the main module, this module is only for use on PHP5 friendly versions of ZenCart, which do NOT support encapsulated modules.

- **Traditional** (ZC 1.5.5+)  
  Copy the `admin/` and `includes/` directories in the root of the zip file to the matching directories in the root of your ZenCart installation. (**NOTE:** Be sure to rename the `admin/` directory to match your admin directory in your ZenCart installation.)

You can find the full instructions to install the module, including how to obtain your USPS API credentials, by reading the [related wiki page](https://github.com/retched/ZC-USPSRestful-PHP5/wiki/Getting%20Started#installing) from the Github repository.

### Upgrading/updating

Simply overwrite all files in your current installation.

## Uninstallation

- **Traditional**  
  To uninstall the traditional version, first uninstall the module from your Shipping Modules page if it was active. Then delete each of the files listed below or find the menu item called "USPSr Uninstaller" that will be added to the tools menu in your admin area. This menu item will automatically delete all related files and configurations related to this module. (Including the uninstaller.)

## Contributions

Contributions are welcome. I try to follow the GitHub flow with regards to the process of resolving issues. For more details, you should check out the [CONTRIBUTING.md](.github/CONTRIBUTING.md) document before making the contribution..

## Frequently Asked Questions

This won't answer all the questions you may have, but it may answer some that I thought of.

### What version of ZenCart does this module support?

This version of the module will only work with the ZenCart versions noted below with a check mark. This version of the module is checking for versions compatible with PHP5. (You can see more details about the compatibility on the [ZenCart server requirements](https://docs.zen-cart.com/user/first_steps/server_requirements/#php-version) page. This module has only been tested with PHP 7 and PHP 8.) For the PHP 7 and PHP 8 friendly versions, visit the [ZC-USPSRestful](https://github.com/retched/ZC-USPSRestful) repository.

|                               | Supported?  |
|-------------------------------|:-----------:|
| ZenCart v1.2.x through v1.3.7 | :x:         |
| ZenCart 1.3.8                 | :clipboard: |
| ZenCart 1.3.9                 | :clipboard: |
| ZenCart 1.5.0                 | :clipboard: |
| ZenCart 1.5.1                 | :clipboard: |
| ZenCart 1.5.3                 | :clipboard: |
| ZenCart 1.5.4                 | :clipboard: |
| ZenCart 1.5.5                 | :clipboard: |
| ZenCart 1.5.6                 | [Should Work, but use other module](https://github.com/retched/ZC-USPSRestful) |
| ZenCart 1.5.7                 | [Should Work, but use other module](https://github.com/retched/ZC-USPSRestful) |
| ZenCart 1.5.8+                | :x:         |

- :white_check_mark: = Fully supported
- :x: = Not supported
- :clipboard: = In testing, BUT it SHOULD work.

### What is the difference between this version and the original USPS module?

The original USPS module works by using the older USPS WebTools API. For years, that API was the defacto API in use when it came to retrieving the estimated shipping costs of the USPS' various services as well as the estimated times of delivery. In 2024, the USPS began deprecating the Web Tools API. In 2025, the USPS announced that the WebTools API will be fully out of service in 2026. The Web Tools API is being replaced with the new OAuth-based API which this codebase uses.

### I already have a `USERID` and `PASSWORD` from WebTools, but I'm getting error messages while I try to retrieve quotes. What happened?

The old `USERID` and `PASSWORD` from the WebTools API are not valid for the new system. You will need to provision new credentials under the new USPS API system. Additionally, you SHOULD create an entire new USPS Business Account provided that you don't already have one for your business. The process is explained [on the USPS Developers website](https://developers.usps.com/getting-started) and on the [related wiki page](https://github.com/retched/ZC-USPSRestful-PHP5/wiki/Getting%20Started#installing) from the Github repository. If you end up not getting quotes or the module disables itself, check to make sure that you are using actual OAuth Credentials and not the old WebTools API. Additionally, make sure you have configured your cart to ship from a United States based zipcode.

### Why should I use this version versus the one that's out there now?

The USPS created an "in-before-the-lock" situation concerning the original WebTools API. They will still allow access to the API by way of manually granting access, but they will read you the "riot act" with regards to enabling them. If you are still using the Web Tools API and have no issues accessing or using it, continue to use it. But know that in 2026, the older WebTools API will be completely disabled, and at that point, everyone will have to use the RESTful version of the API going forward.

**UPDATE** USPS has begun forcing people off of WebTools if they believe your account is "inactive". Inactive can mean a bunch of things including not using the WebTools API to make a call in a long time, not acknowledging the deprecation changes, and more. If you're using WebTools currently, understand that USPS is set on forcing everyone to the OAuth version (which this module provides).

### What is this OAuth Token? Do I need to get one?

An OAuth token is effectively a (temporary) password meant to provide access to the OAuth API. (Similar to the WebTools API USERID and PASSWORD.)  You do not need to do anything to get one, this script will instead create the token for you (or at least your customer) as their cart requests the estimations of the costs of the USPS services. During checkout, using your API Key and Secret, the cart will request a token for use and then revoke it when it's done with the API call.

### I'm not seeing the USPS Connect rate even though I selected it, what's going on?

USPS Connect rates are only available to retailers who have specifically signed up for it at the [USPS Connect website](https://www.uspsconnect.com) and have their USPS Business Accounts activated to enable USPS Connect. Additionally, you must select and choose to display the "Commercial" rates (formerly called "Online" in the WebTools module) to see the rates while providing a list of Zip Codes that can use Connect Local. If any of these details are missing, you will not see the rate pop up in the quote. Currently, these rates are only available when you're dropping off the packages at the DESTINATION Zip Code. (There is a USPS Connect Regional which does allow you to drop off packages at REGIONAL centers but it is not present here.)

### "The module is not showing at all even though I made my choices"

Make sure that your store is configured to ship out of the United States and that you made sure to enter a five-digit (or nine-digit) Zip Code where your orders are originating from. Additionally, make sure that you have chosen at least one shipping method to display. (This is part of the quotation process. Without these details, the module will fail and self-disable itself.)

### "I clicked the box to offer USPS Large Flat Rate Boxes APO/FPO/DPO but I don't see it as an option during checkout, what gives?"

That rate is only available for packages being sent to a known APO (Air/Army Post Office), DPO (Diplomatic Post Office), or FPO (Fleet Post Office) zip code. If the package's destination zip code is not one of those types of zip codes, the rate will not be offered. To obtain APO/DPO/FPO Flat Rate Boxes, visit the [USPS Postal Store online](https://store.usps.com/store/product/shipping-supplies/priority-mail-flat-rate-apofpo-box-P_MILI_FRB) and request them. (Remember these boxes can ONLY be used for APO/DPO/FPO Mail. If you use them for regular domestic addresses, you may end up having that package returned for insufficient postage.) If there is a valid APO/FPO/DPO address being given and the rate is not offered, please contact me right away. It's likely that the destination zip code was not a known APO, DPO, or FPO when I published this script.

### What is the handling field for?

There are two sets of handling fields. One that can be used on the order as a whole (domestic or international) and one that can be applied on a per-method basis.

The handling field next to the selection of methods is generally for adding a surcharge to certain kinds of shipping methods. The "global" handling above the selection of methods is to apply a fee to all orders regardless of shipping method.

If you wish to charge a surcharge for certain kinds of shipping methods, you can enter an amount in the entry box next to the method, and this amount that you enter will be added to the quoted shipping method. If instead, you want to add a surcharge to using USPS as a whole, you would use the single input boxes and not the individual method ones. (Or you can use both but be careful as this additive and depending on the site and other settings, multiplicative.)

### What is the min/max box for?

The original USPS WebTools had a way to clamp the different modules based on the weight of each order. You would put two values into those boxes, and then the rate for that method would be offered if the total weight of the order fell between those two numbers. This is completely optional to use and should be left alone to its defaults if you're not actively using them. (**NOTE:** The number entered here will be converted into pounds, so if you're using kilograms as your standard, enter the amount in kilograms here. If you're using pounds, enter pounds here.)

### Does this module use the Length, Width, and Height boxes of ZC 2.0.0+?

Not at this time. Research is still being done on how to work that into the quote. For now, you should still set those on the product details AND set the "average" package thresholds of this module. A future update will see these included. (You should still update them as the data could be useful in other modules.)

### What happened to the ® and ™ symbols that were on the original module?

Those symbols don't appear within the new USPS API calls as they do on the original one. I can modify the script to place them but they might be more trouble than anything.

### My store's measurements are in centimeters and kilograms. Do I have to convert everything?

The module defaults to using inches and pounds. If you want to change to centimeters and kilograms, you must make a file edit to `/includes/modules/shipping/usps.php`. Around lines 44 and 50, you will see two constant defines that can be edited. Simply follow the instructions there. Be sure to leave single quotation marks and to match the values as listed. (That is, you must enter either `"inches"` or `"centimeters"` (case sensitive) and `kgs` or `lbs` (case sensitive, and no period at the end).)

## Known Limitations/Issues

- As mentioned above in the FAQ, the registered trademark symbols do not appear in the API results sent from the server. This isn't something I care to fix, although if asked or suggested, I could theoretically put them back in the appropriate places.

## Credits

For the original module  

- Ajeh, the original poster of the ZC 1.5 module
- lat9
- The ZenCart Team

For the update  

- retched (me)
- lat9 and scottcwilson for their help with the inclusion of the functions file without duplicating it (this saved me a headache)

## File Listing

(not all files will be available in the zip file, depending on download)

``` text
- LICENSE
- README.md (this file)
- README_1st.md
- README.html
- changelog.md
- \admin\uspsr_uninstall.php
- \admin\includes\extra_datafiles\uspsr_uninstaller.php
- \admin\includes\functions\extra_functions\usps.extra_functions.php
- \admin\includes\languages\english\extra_definitions\uspsr.php
- \includes\languages\english\modules\shipping\uspsr.php
- \includes\functions\extra_functions\usps.extra_functions.php
- \includes\modules\shipping\uspsr.php
- \includes\templates\template_default\images\icons\shipping_usps.gif
```

## Support the author
<!-- Should this repository be forked, please remove this section -->

[![Support via CashApp](https://img.shields.io/badge/cashapp-green?style=flat&logo=cashapp&logoColor=white&logoSize=auto&labelColor=black&color=purple&link=https%3A%2F%2Fcash.app%2Fretched)](https://cash.app/$retched) [![Support via PayPal](https://img.shields.io/badge/paypal-blue?style=flat&logo=paypal&logoColor=white&logoSize=auto&labelColor=black&color=purple)](https://paypal.me/retched)  [![Support via Patreon](https://img.shields.io/badge/patreon-white?style=flat&logo=patreon&logoColor=white&labelColor=black&color=purple&link=https%3A%2F%2Fwww.patreon.com%2Fretched)](https://www.patreon.com/retched)  [![Support via BuyMeACoffee](https://img.shields.io/badge/buymeacoffee-white?style=flat&logo=buymeacoffee&logoColor=white&labelColor=black&color=purple&link=https%3A%2F%2Fbuymeacoffee.com%2Fretched)](https://buymeacoffee.com/retched)  [![Support via Kofi](https://img.shields.io/badge/kofi-white?style=flat&logo=buymeacoffee&logoColor=white&labelColor=black&color=purple&link=https%3A%2F%2Fkofi.com%2Fretched)](https://kofi.com/retched)  

## License

``` text
USPS Shipping (RESTful) for Zen Cart - PHP5 Version
A shipping module for ZenCart, an e-commerce platform
Copyright (C) 2026 Paul Williams (retched / retched@hotmail.com)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <https://www.gnu.org/licenses/>.
```
