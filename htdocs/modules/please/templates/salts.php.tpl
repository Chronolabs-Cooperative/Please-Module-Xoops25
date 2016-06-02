<?php
/**
 * Please Email Ticketer of Batch Group & User Emails
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright   	The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     	GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @author      	Simon Roberts (wishcraft) <wishcraft@users.sourceforge.net>
 * @subpackage  	please
 * @description 	Email Ticking for Support/Faults/Management of Batch Group & User managed emails tickets
 * @version			1.0.5
 * @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.5/Modules/please
 * @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.6/Modules/please
 * @link			https://sourceforge.net/p/xoops/svn/HEAD/tree/XoopsModules/please
 * @link			http://internetfounder.wordpress.com
 */

 
/**
 * Salt for Blowfish encryption keys
 * var string
 */
define("_PLEASE_SALT_BLOWFISH", "%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%");
 
/**
 * Salt was set for Blowfish encryption keys at microtime(true)
 * var float
 */
define("_PLEASE_SALT_WHENSET", "%%%%%%%%%%%%%%%%%%%%%%%%%");

/**
 * Salt admin site when set for Blowfish encryption keys at XOOPS_URL
 * var string
 */
define("_PLEASE_SALT_WHERESET", "%%%%%%%%%%%%%%%%%%%%");

/**
 * Salt user when set for Blowfish encryption keys at site
 * var string  json
 */
define("_PLEASE_SALT_USERSET", "%%%%%%%%%%%%%%%");

// Existences notation
return true;
?>