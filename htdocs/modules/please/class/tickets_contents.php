<?php
/**
 * Please Tickets_contents Ticketer of Batch Group & User Tickets_contentss
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
 * @description 	Tickets_contents Ticking for Support/Faults/Management of Batch Group & User managed emails tickets
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
 * Class for Tickets_contents in Please email ticketer
 *
 * For Table:-
 * <code>
 * CREATE TABLE `please_tickets_contents` (
 *   `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
 *   `state` enum('from','sent','mantis') DEFAULT 'from',
 *   `ticket-id` mediumint(30) UNSIGNED DEFAULT '0',
 *   `content-key` varchar(44) DEFAULT '',
 *   `by-id` int(11) DEFAULT '0',
 *   `by-uid` int(11) DEFAULT '0',
 *   `when` int(12) DEFAULT '0',
 *   PRIMARY KEY (`id`),
 *   KEY `SEARCH` (`ticket-id`,`content-key`(24),`state`,`by-id`,`by-uid`)
 * ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 * </code>
 * @author Simon Roberts (wishcraft@users.sourceforge.net)
 * @copyright copyright (c) 2015 labs.coop
 */
class pleaseTickets_contents extends pleaseXoopsObject
{

	var $handler = '';
	
    function __construct($id = null)
    {   	
    	
        self::initVar('id', XOBJ_DTYPE_INT, null, false);
        self::initVar('state', XOBJ_DTYPE_ENUM, 'from', false, false, false, getEnumeratorValues(basename(__FILE__), 'state'));
        self::initVar('ticket-id', XOBJ_DTYPE_INT, null, false);
        self::initVar('content-key', XOBJ_DTYPE_TXTBOX, sha1(null), false, 44);
        self::initVar('by-id', XOBJ_DTYPE_INT, null, false);
        self::initVar('by-uid', XOBJ_DTYPE_INT, null, false);
        self::initVar('when', XOBJ_DTYPE_INT, time(), false);
        
        $this->handler = __CLASS__ . 'Handler';
        if (!empty($id) && !is_null($id))
        {
        	$handler = new $this->handler;
        	self::assignVars($handler->get($id)->getValues(array_keys($this->vars)));
        }
        
    }

}


/**
 * Handler Class for Tickets_contents in Please email ticketer
 * @author Simon Roberts (wishcraft@users.sourceforge.net)
 * @copyright copyright (c) 2015 labs.coop
 */
class pleaseTickets_contentsHandler extends pleaseXoopsObjectHandler
{
	

	/**
	 * Table Name without prefix used
	 * 
	 * @var string
	 */
	var $tbl = 'please_tickets_contents';
	
	/**
	 * Child Object Handling Class
	 *
	 * @var string
	 */
	var $child = 'pleaseTickets_contents';
	
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
	var $envalued = 'when';
	
    function __construct(&$db) 
    {
    	if (!object($db))
    		$db = $GLOBAL["xoopsDB"];
        parent::__construct($db, self::$tbl, self::$child, self::$identity, self::$envalued);
    }
}
?>