<?php
/**
 * USPS Shipping (RESTful) for Zen Cart - PHP 5 Version
 * Version 0.0.0
 *
 * @copyright Portions Copyright 2004-2026 Zen Cart Team
 * @copyright Portions adapted from 2012 osCbyJetta
 * @author Paul Williams (retched)
 * @version $Id: usps.extra_functions.php 0000-00-00 retched Version 0.0.0 $
 ****************************************************************************
    USPS Shipping (RESTful) for Zen Cart
    A shipping module for ZenCart, an ecommerce platform
    Copyright (C) 2026 Paul Williams (retched / retched@hotmail.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
****************************************************************************/

// This should load the Front/Catalog version of this file
// There is only non-encapsulated installs in PHP5, so we can just load the file directly without worrying about the context.
require DIR_FS_CATALOG . DIR_WS_FUNCTIONS . 'extra_functions/uspsr_php5.extra_functions.php';

// For some reason, the module was trying to use this function, but loading it with hidden values was gunking it up.
function uspsr_read_only($text, $key = '')
{
    $name = (!empty($key)) ? 'configuration[' . $key . ']' : 'configuration_value';
    $text = htmlspecialchars_decode($text, ENT_COMPAT);

    return $text;
}
