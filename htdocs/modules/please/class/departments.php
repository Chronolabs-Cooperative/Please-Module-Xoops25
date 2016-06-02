<?php
/**
 * Please Departments Ticketer of Batch Group & User Departmentss
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright   	The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     	General Public License version 3 (http://labs.coop/briefs/legal/general-public-licence/13,3.html)
 * @author      	Simon Roberts (wishcraft) <wishcraft@users.sourceforge.net>
 * @subpackage  	please
 * @description 	Departments Ticking for Support/Faults/Management of Batch Group & User managed emails tickets
 * @version			1.0.5
 * @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.5/Modules/please
 * @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.6/Modules/please
 * @link			https://sourceforge.net/p/xoops/svn/HEAD/tree/XoopsModules/please
 * @link			http://internetfounder.wordpress.com
 */

if (!defined('_MI_PLEASE_MODULE_DIRNAME')) {
	return false;
}

//*
require_once (__DIR__ . DIRECTORY_SEPARATOR . 'objects.php');

/**
 * Class for Departments in Please email ticketer
 *
 * For Table:-
 * <code>
 * CREATE TABLE `please_departments` (
 *   `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
 *   `code` varchar(3) DEFAULT 'ABC',
 *   `name` varchar(128) DEFAULT '',
 *   `description` tinytext,
 *   `mantis-uri` varchar(350) DEFAULT '',
 *   `mantis-username` varchar(45) DEFAULT '',
 *   `mantis-password` varchar(198) DEFAULT '',
 *   `mantis-project-id` int(11) UNSIGNED DEFAULT '0',
 *   `manager-uid` int(11) DEFAULT '0',
 *   `manager-bcc` enum('all-email','closed-email','all-pm','closed-pm','none') DEFAULT 'none',
 *   `manager-mantis-username` varchar(45) DEFAULT '',
 *   `manager-mantis-password` varchar(198) DEFAULT '',
 *   `mantis` enum('yes','no') DEFAULT 'no',
 *   `gid` int(8) DEFAULT '0',
 *   `tickets` int(12) DEFAULT '0',
 *   `staff` int(12) DEFAULT '0',
 *   `clients` int(12) DEFAULT '0',
 *   `raised` int(12) DEFAULT '0',
 *   `latest-id` mediumint(30) UNSIGNED DEFAULT '0',
 *   `closed-id` mediumint(30) UNSIGNED DEFAULT '0',
 *   `signature` varchar(300) DEFAULT '',
 *   `created` int(12) DEFAULT '0',
 *   PRIMARY KEY (`id`)
 * ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 * </code>
 * @author Simon Roberts (wishcraft@users.sourceforge.net)
 * @copyright copyright (c) 2015 labs.coop
 */
class pleaseDepartments extends pleaseXoopsObject
{

	var $handler = '';
	
    function __construct($id = null)
    {   	
    	
        self::initVar('id', XOBJ_DTYPE_INT, null, false);
        self::initVar('code', XOBJ_DTYPE_TXTBOX, 'AAB' + mt_rand(100, 100000), false);
        self::initVar('name', XOBJ_DTYPE_TXTBOX, null, false, 128);
        self::initVar('description', XOBJ_DTYPE_OTHER, null, false);
        self::initVar('mantis-uri', XOBJ_DTYPE_TXTBOX, null, false, 350);
        self::initVar('mantis-username', XOBJ_DTYPE_TXTBOX, null, false, 45);
        self::initVar('mantis-password', XOBJ_DTYPE_TXTBOX, null, false, 198);
        self::initVar('mantis-project-id', XOBJ_DTYPE_INT, null, false);
        self::initVar('manager-uid', XOBJ_DTYPE_INT, null, false);
        self::initVar('manager-bcc', XOBJ_DTYPE_ENUM, 'none', false, false, false, getEnumeratorValues(basename(__FILE__), 'manager-bcc'));
        self::initVar('manager-mantis-username', XOBJ_DTYPE_TXTBOX, null, false, 45);
        self::initVar('manager-mantis-password', XOBJ_DTYPE_TXTBOX, null, false, 198);
        self::initVar('mantis', XOBJ_DTYPE_ENUM, 'none', false, false, false, getEnumeratorValues(basename(__FILE__), 'mantis'));
        self::initVar('gid', XOBJ_DTYPE_INT, null, false);
        self::initVar('tickets', XOBJ_DTYPE_INT, null, false);
        self::initVar('staff', XOBJ_DTYPE_INT, null, false);
        self::initVar('clients', XOBJ_DTYPE_INT, null, false);
        self::initVar('raised', XOBJ_DTYPE_INT, null, false);
        self::initVar('latest-id', XOBJ_DTYPE_INT, null, false);
        self::initVar('closed-id', XOBJ_DTYPE_INT, null, false);
        self::initVar('signature', XOBJ_DTYPE_TXTBOX, null, false, 300);
        self::initVar('created', XOBJ_DTYPE_INT, time(), false);
        
        $this->handler = __CLASS__ . 'Handler';
        if (!empty($id) && !is_null($id))
        {
        	$handler = new $this->handler;
        	self::assignVars($handler->get($id)->getValues(array_keys($this->vars)));
        }
        
    }

}


/**
 * Handler Class for Departments in Please email ticketer
 * @author Simon Roberts (wishcraft@users.sourceforge.net)
 * @copyright copyright (c) 2015 labs.coop
 */
class pleaseDepartmentsHandler extends pleaseXoopsObjectHandler
{
	

	/**
	 * Table Name without prefix used
	 * 
	 * @var string
	 */
	var $tbl = 'please_departments';
	
	/**
	 * Child Object Handling Class
	 *
	 * @var string
	 */
	var $child = 'pleaseDepartments';
	
	/**
	 * Child Object Identity Key
	 *
	 * @var string
	 */
	var $identity = 'id';
	
	/**
	 * Child Object Default Envaluing Costs
	 *
	 * @var string
	 */
	var $envalued = 'created';
	
    function __construct(&$db) 
    {
    	if (!object($db))
    		$db = $GLOBAL["xoopsDB"];
        parent::__construct($db, self::$tbl, self::$child, self::$identity, self::$envalued);
    }
}
?>