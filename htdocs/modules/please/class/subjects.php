<?php
/**
 * Please Subjects Ticketer of Batch Group & User Subjectss
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
 * @description 	Subjects Ticking for Support/Faults/Management of Batch Group & User managed emails tickets
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
 * Class for Subjects in Please email ticketer
 *
 * For Table:-
 * <code>
 * CREATE TABLE `please_subjects` (
 *   `id` mediumint(30) UNSIGNED NOT NULL AUTO_INCREMENT,
 *   `subject` varchar(300) DEFAULT '',
 *   `email-id` int(30) UNSIGNED DEFAULT '0',
 *   `created` int(12) DEFAULT '0',
 *   PRIMARY KEY (`id`),
 *   KEY `SEARCH` (`subject`(30),`email-id`)
 * ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 * </code>
 * @author Simon Roberts (wishcraft@users.sourceforge.net)
 * @copyright copyright (c) 2015 labs.coop
 */
class pleaseSubjects extends pleaseXoopsObject
{

	var $handler = '';
	
    function __construct($id = null)
    {   	
    	
        self::initVar('id', XOBJ_DTYPE_INT, null, false);
        self::initVar('subject', XOBJ_DTYPE_TXTBOX, null, false, 300);
        self::initVar('email-id', XOBJ_DTYPE_INT, null, false);
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
 * Handler Class for Subjects in Please email ticketer
 * @author Simon Roberts (wishcraft@users.sourceforge.net)
 * @copyright copyright (c) 2015 labs.coop
 */
class pleaseSubjectsHandler extends pleaseXoopsObjectHandler
{
	

	/**
	 * Table Name without prefix used
	 * 
	 * @var string
	 */
	var $tbl = 'please_subjects';
	
	/**
	 * Child Object Handling Class
	 *
	 * @var string
	 */
	var $child = 'pleaseSubjects';
	
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
	var $envalued = 'subject';
	
    function __construct(&$db) 
    {
    	if (!object($db))
    		$db = $GLOBAL["xoopsDB"];
        parent::__construct($db, self::$tbl, self::$child, self::$identity, self::$envalued);
    }
    
    /**
     * Insert a subject
     * 
     * {@inheritDoc}
     * @see XoopsPersistableObjectHandler::insert()
     */
    function insert($object, $force = true)
    {
    	if ($object->isNew())
    	{
    		$criteria = new Criteria('subject', $object->getVar('subject'), 'LIKE');
    		$criteria->setLimit(1);
    		if ($this->getCount($criteria)>0)
    			foreach($this->getObjects($criteria) as $obj)
    			{
    				$obj->setVar('email-id', $object->getVar('email-id'));
    				return parent::insert($obj, $force);
    			}
    	}
    	return parent::insert($object, $force);
    }
}
?>