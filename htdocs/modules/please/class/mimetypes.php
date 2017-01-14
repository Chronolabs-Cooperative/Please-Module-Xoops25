<?php
/**
 * Please Mimetypes Ticketer of Batch Group & User Mimetypess
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
 * @description 	Mimetypes Ticking for Support/Faults/Management of Batch Group & User managed emails tickets
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
 * Class for Mimetypes in Please email ticketer
 *
 * For Table:-
 * <code>
 * CREATE TABLE `please_mimetypes` (
 *   `id` mediumint(38) unsigned NOT NULL AUTO_INCREMENT,
 *   `mimetype` varchar(255) DEFAULT '.',
 *   `extensions` tinytext,
 *   `files-embedded` int(12) unsigned DEFAULT '0',
 *   `files-attachment` int(12)  unsigned DEFAULT '0',
 *   `files-sent` int(12)  unsigned DEFAULT '0',
 *   `bytes-embedded` mediumint(32)  unsigned DEFAULT '0',
 *   `bytes-attachment` mediumint(32)  unsigned DEFAULT '0',
 *   `bytes-sent` mediumint(32)  unsigned DEFAULT '0',
 *   `created` int(12) DEFAULT '0',
 *   `deleted` int(12) DEFAULT '0',
 *   `accessed` int(12) DEFAULT '0',
 *   PRIMARY KEY (`id`)
 * ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 * </code>
 * @author Simon Roberts (wishcraft@users.sourceforge.net)
 * @copyright copyright (c) 2015 labs.coop
 */
class pleaseMimetypes extends pleaseXoopsObject
{

	var $handler = '';
	
    function __construct($id = null)
    {   	
    	
        self::initVar('id', XOBJ_DTYPE_INT, null, false);
        self::initVar('mimetype', XOBJ_DTYPE_TXTBOX, null, false, 255);
        self::initVar('extensions', XOBJ_DTYPE_ARRAY, array(), false);
        self::initVar('files-embedded', XOBJ_DTYPE_INT, null, false);
        self::initVar('files-attachment', XOBJ_DTYPE_INT, null, false);
        self::initVar('files-sent', XOBJ_DTYPE_INT, null, false);
        self::initVar('bytes-embedded', XOBJ_DTYPE_INT, null, false);
        self::initVar('bytes-attachment', XOBJ_DTYPE_INT, null, false);
        self::initVar('bytes-sent', XOBJ_DTYPE_INT, null, false);
        self::initVar('created', XOBJ_DTYPE_INT, time(), false);
        self::initVar('deleted', XOBJ_DTYPE_INT, null, false);
        self::initVar('accessed', XOBJ_DTYPE_INT, null, false);
        
        $this->handler = __CLASS__ . 'Handler';
        if (!empty($id) && !is_null($id))
        {
        	$handler = new $this->handler;
        	self::assignVars($handler->get($id)->getValues(array_keys($this->vars)));
        }
        
    }

}


/**
 * Handler Class for Mimetypes in Please email ticketer
 * @author Simon Roberts (wishcraft@users.sourceforge.net)
 * @copyright copyright (c) 2015 labs.coop
 */
class pleaseMimetypesHandler extends pleaseXoopsObjectHandler
{
	

	/**
	 * Table Name without prefix used
	 * 
	 * @var string
	 */
	var $tbl = 'please_mimetypes';
	
	/**
	 * Child Object Handling Class
	 *
	 * @var string
	 */
	var $child = 'pleaseMimetypes';
	
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
	var $envalued = 'mimetype';
	
    function __construct(&$db) 
    {
    	if (!object($db))
    		$db = $GLOBAL["xoopsDB"];
        parent::__construct($db, self::$tbl, self::$child, self::$identity, self::$envalued);
    }
}
?>