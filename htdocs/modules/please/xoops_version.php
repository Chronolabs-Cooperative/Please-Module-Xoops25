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
 * @license     	General Public License version 3 (http://labs.coop/briefs/legal/general-public-licence/13,3.html)
 * @author      	Simon Roberts (wishcraft) <wishcraft@users.sourceforge.net>
 * @subpackage  	please
 * @description 	Email Ticking for Support/Faults/Management of Batch Group & User managed emails tickets
 * @version			1.0.5
 * @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.5/Modules/please
 * @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.6/Modules/please
 * @link			https://sourceforge.net/p/xoops/svn/HEAD/tree/XoopsModules/please
 * @link			http://internetfounder.wordpress.com
 */

if (!defined('XOOPS_ROOT_PATH')) {
	die('XOOPS root path not defined');
}

if (!defined(_MI_PLEASE_MODULE_DIRNAME))
	define('_MI_PLEASE_MODULE_DIRNAME', basename(__DIR__));

if (is_file(__DIR__ . DIRECTORY_SEPARATOR . 'groups.php'))
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'groups.php';
	
global $pleaseModule, $pleaseConfigsList, $pleaseConfigs, $pleaseConfigsOptions;

if (empty($pleaseModule))
{
	if (is_a($pleaseModule = xoops_gethandler('module')->getByDirname(_MI_PLEASE_MODULE_DIRNAME), "XoopsModule"))
	{
		if (empty($pleaseConfigsList))
		{
			$pleaseConfigsList = xoops_gethandler('config')->getConfigsList($pleaseModule->getVar('mid'));
		}
		if (empty($pleaseConfigs))
		{
			$pleaseConfigs = xoops_gethandler('config')->getConfigs(new Criteria('conf_modid', $pleaseModule->getVar('mid')));
		}
		if (empty($pleaseConfigsOptions) && !empty($pleaseConfigs))
		{
			foreach($pleaseConfigs as $key => $config)
				$pleaseConfigsOptions[$config->getVar('conf_name')] = $config->getConfigOptions(new Criteria('conf_id', $config->getVar('conf_id')));
		}
	}
}

$modversion['dirname'] 					= _MI_PLEASE_MODULE_DIRNAME;
$modversion['name'] 					= _MI_PLEASE_MODULE_NAME;
$modversion['version']     				= _MI_PLEASE_MODULE_VERSION;
$modversion['releasedate'] 				= _MI_PLEASE_MODULE_RELEASEDATE;
$modversion['status']      				= _MI_PLEASE_MODULE_STATUS;
$modversion['description'] 				= _MI_PLEASE_MODULE_DESCRIPTION;
$modversion['credits']     				= _MI_PLEASE_MODULE_CREDITS;
$modversion['author']      				= _MI_PLEASE_MODULE_AUTHORALIAS;
$modversion['help']        				= _MI_PLEASE_MODULE_HELP;
$modversion['license']     				= _MI_PLEASE_MODULE_LICENCE;
$modversion['official']    				= _MI_PLEASE_MODULE_OFFICAL;
$modversion['image']       				= _MI_PLEASE_MODULE_ICON;
$modversion['module_status'] 			= _MI_PLEASE_MODULE_STATUS;
$modversion['website'] 					= _MI_PLEASE_MODULE_WEBSITE;
$modversion['dirmoduleadmin'] 			= _MI_PLEASE_MODULE_ADMINMODDIR;
$modversion['icons16'] 					= _MI_PLEASE_MODULE_ADMINICON16;
$modversion['icons32'] 					= _MI_PLEASE_MODULE_ADMINICON32;
$modversion['release_info'] 			= _MI_PLEASE_MODULE_RELEASEINFO;
$modversion['release_file'] 			= _MI_PLEASE_MODULE_RELEASEFILE;
$modversion['release_date'] 			= _MI_PLEASE_MODULE_RELEASEDATE;
$modversion['author_realname'] 			= _MI_PLEASE_MODULE_AUTHORREALNAME;
$modversion['author_website_url'] 		= _MI_PLEASE_MODULE_AUTHORWEBSITE;
$modversion['author_website_name'] 		= _MI_PLEASE_MODULE_AUTHORSITENAME;
$modversion['author_email'] 			= _MI_PLEASE_MODULE_AUTHOREMAIL;
$modversion['author_word'] 				= _MI_PLEASE_MODULE_AUTHORWORD;
$modversion['status_version'] 			= _MI_PLEASE_MODULE_VERSION;
$modversion['warning'] 					= _MI_PLEASE_MODULE_WARNINGS;
$modversion['demo_site_url'] 			= _MI_PLEASE_MODULE_DEMO_SITEURL;
$modversion['demo_site_name'] 			= _MI_PLEASE_MODULE_DEMO_SITENAME;
$modversion['support_site_url'] 		= _MI_PLEASE_MODULE_SUPPORT_SITEURL;
$modversion['support_site_name'] 		= _MI_PLEASE_MODULE_SUPPORT_SITENAME;
$modversion['submit_feature'] 			= _MI_PLEASE_MODULE_SUPPORT_FEATUREREQUEST;
$modversion['submit_bug'] 				= _MI_PLEASE_MODULE_SUPPORT_BUGREPORTING;
$modversion['people']['developers'] 	= explode("|", _MI_PLEASE_MODULE_DEVELOPERS);
$modversion['people']['testers']		= explode("|", _MI_PLEASE_MODULE_TESTERS);
$modversion['people']['translaters']	= explode("|", _MI_PLEASE_MODULE_TRANSLATERS);
$modversion['people']['documenters']	= explode("|", _MI_PLEASE_MODULE_DOCUMENTERS);

// Requirements
$modversion['min_php']        			= '7.0';
$modversion['min_xoops']      			= '2.5.8';
$modversion['min_db']         			= array('mysql' => '5.0.7', 'mysqli' => '5.0.7');
$modversion['min_admin']      			= '1.1';

// Database SQL File and Tables
$modversion['sqlfile']['mysql'] 		= "sql/mysqli.sql";
$modversion['tables']	 				= explode("\n", file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'sql' . DIRECTORY_SEPARATOR . 'tables.diz'));

//Search
$modversion['hasSearch'] 				= _MI_PLEASE_MODULE_HASSEARCH;
//$modversion['search']['file'] 		= "include/search.inc.php";
//$modversion['search']['func'] 		= "publisher_search";

// Main
$modversion['hasMain'] 					= _MI_PLEASE_MODULE_HASMAIN;
$modversion['onInstall'] 				= "include/install.php";
$modversion['onUpdate'] 				= "include/onupdate.php";
$modversion['onUninstall'] 				= "include/uninstall.php";

// Admin
$modversion['hasAdmin'] 				= _MI_PLEASE_MODULE_HASADMIN;
$modversion['adminindex']  				= "admin/index.php";
$modversion['adminmenu']   				= "admin/menu.php";
$modversion['system_menu'] 				= 1;

// Comments
$modversion['hasComments'] 				= _MI_PLEASE_MODULE_HASCOMMENTS;
//$modversion['comments']['itemName'] = 'itemid';
//$modversion['comments']['pageName'] = 'item.php';
//$modversion['comments']['callbackFile']        = 'include/comment_functions.php';
//$modversion['comments']['callback']['approve'] = 'publisher_com_approve';
//$modversion['comments']['callback']['update']  = 'publisher_com_update';

// Add extra menu items
//$modversion['sub'][3]['name'] = _MI_PLEASE_SUB_ARCHIVE;
//$modversion['sub'][3]['url']  = "archive.php";


// Create Block Constant Defines
$i = 0;
++$i;
//$modversion['blocks'][$i]['file']        = "items_new.php";
//$modversion['blocks'][$i]['name']        = _MI_PLEASE_ITEMSNEW;
//$modversion['blocks'][$i]['description'] = _MI_PLEASE_ITEMSNEW_DSC;
//$modversion['blocks'][$i]['show_func']   = "publisher_items_new_show";
//$modversion['blocks'][$i]['edit_func']   = "publisher_items_new_edit";
//$modversion['blocks'][$i]['options']     = "0|datesub|0|5|65|none";
//$modversion['blocks'][$i]['template']    = "publisher_items_new.tpl";


// Templates
$i = 0;
$modversion['templates'][$i]['file'] = 'noticer_index.html';
$modversion['templates'][$i]['description'] = 'Honeypot noticer Template';
$i++;
$modversion['templates'][$i]['file'] = 'noticer_results.html';
$modversion['templates'][$i]['description'] = 'Honeypot noticer results';

// Config categories
$modversion['configcat']['seo']['name']        = _MI_PLEASE_CONFCAT_SEO;
$modversion['configcat']['seo']['description'] = _MI_PLEASE_CONFCAT_SEO_DESC;

$modversion['configcat']['email']['name']        = _MI_PLEASE_CONFCAT_EMAIL;
$modversion['configcat']['email']['description'] = _MI_PLEASE_CONFCAT_EMAIL_DESC;

$modversion['configcat']['systems']['name']        = _MI_PLEASE_CONFCAT_SYSTEMS;
$modversion['configcat']['systems']['description'] = _MI_PLEASE_CONFCAT_SYSTEMS_DESC;

$modversion['configcat']['reports']['name']        = _MI_PLEASE_CONFCAT_REPORTS;
$modversion['configcat']['reports']['description'] = _MI_PLEASE_CONFCAT_REPORTS_DESC;

$modversion['configcat']['offline']['name']        = _MI_PLEASE_CONFCAT_OFFLINE;
$modversion['configcat']['offline']['description'] = _MI_PLEASE_CONFCAT_OFFLINE_DESC;

$modversion['configcat']['spam']['name']        = _MI_PLEASE_CONFCAT_SPAM;
$modversion['configcat']['spam']['description'] = _MI_PLEASE_CONFCAT_SPAM_DESC;

// Config categories
$i=0;
++$i;
$modversion['config'][$i]['name']        = 'wammy';
$modversion['config'][$i]['title']       = '_MI_PLEASE_WAMMY';
$modversion['config'][$i]['description'] = '_MI_PLEASE_WAMMY_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'spam';
++$i;
$modversion['config'][$i]['name']        = 'default-wammy';
$modversion['config'][$i]['title']       = '_MI_PLEASE_WAMMY_URI';
$modversion['config'][$i]['description'] = '_MI_PLEASE_WAMMY_URI_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'http://wammy.labs.coop';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'spam';
++$i;
$modversion['config'][$i]['name']        = 'wammy_train';
$modversion['config'][$i]['title']       = '_MI_PLEASE_WAMMY_TRAIN';
$modversion['config'][$i]['description'] = '_MI_PLEASE_WAMMY_TRAIN_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = true;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'spam';
++$i;
$modversion['config'][$i]['name']        = 'spam_passway';
$modversion['config'][$i]['title']       = '_MI_PLEASE_SPAM_PASSWAY';
$modversion['config'][$i]['description'] = '_MI_PLEASE_SPAM_PASSWAY_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = true;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'spam';
++$i;
$modversion['config'][$i]['name']        = 'spam_notify';
$modversion['config'][$i]['title']       = '_MI_PLEASE_SPAM_NOTIFY';
$modversion['config'][$i]['description'] = '_MI_PLEASE_SPAM_NOTIFY_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = true;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'spam';
++$i;
$modversion['config'][$i]['name']        = 'default-reply';
$modversion['config'][$i]['title']       = '_MI_PLEASE_DEFAULT_REPLYTO';
$modversion['config'][$i]['description'] = '_MI_PLEASE_DEFAULT_REPLYTO_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = '';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'attachment_storage';
$modversion['config'][$i]['title']       = '_MI_PLEASE_ATTACHMENT_STORAGE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_ATTACHMENT_STORAGE_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'PLEASE_DATA_PATH';
$modversion['config'][$i]['options']     = array('PLEASE_DATA_PATH'=>'PLEASE_DATA_PATH', 'PLEASE_UPLOAD_PATH'=>'PLEASE_UPLOAD_PATH');
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'image_storage';
$modversion['config'][$i]['title']       = '_MI_PLEASE_IMAGE_STORAGE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_IMAGE_STORAGE_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'PLEASE_UPLOAD_PATH';
$modversion['config'][$i]['options']     = array('PLEASE_DATA_PATH'=>'PLEASE_DATA_PATH', 'PLEASE_UPLOAD_PATH'=>'PLEASE_UPLOAD_PATH');
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'htaccess';
$modversion['config'][$i]['title']       = '_MI_PLEASE_HTACCESS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_HTACCESS_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'seo';
++$i;
$modversion['config'][$i]['name']        = 'base';
$modversion['config'][$i]['title']       = '_MI_PLEASE_BASE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_BASE_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'please';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'seo';
++$i;
$modversion['config'][$i]['name']        = 'html';
$modversion['config'][$i]['title']       = '_MI_PLEASE_HTML';
$modversion['config'][$i]['description'] = '_MI_PLEASE_HTML_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'html';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'seo';
++$i;
$modversion['config'][$i]['name']        = 'rss';
$modversion['config'][$i]['title']       = '_MI_PLEASE_RSS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_RSS_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'rss';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'seo';
++$i;
$modversion['config'][$i]['name']        = 'ticketers';
$modversion['config'][$i]['title']       = '_MI_PLEASE_TICKETERS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_TICKETERS_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'department_groups';
$modversion['config'][$i]['title']       = '_MI_PLEASE_DEPARTMENT_GROUPS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_DEPARTMENT_GROUPS_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(		XOOPS_GROUP_USERS => XOOPS_GROUP_USERS			);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'department_newgroup';
$modversion['config'][$i]['title']       = '_MI_PLEASE_DEPARTMENT_NEWGROUP';
$modversion['config'][$i]['description'] = '_MI_PLEASE_DEPARTMENT_NEWGROUP_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = true;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'staff_group';
$modversion['config'][$i]['title']       = '_MI_PLEASE_STAFF_GROUP';
$modversion['config'][$i]['description'] = '_MI_PLEASE_STAFF_GROUP_DESC';
$modversion['config'][$i]['formtype']    = 'group';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = PLEASE_GROUP_STAFF;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'manager_group';
$modversion['config'][$i]['title']       = '_MI_PLEASE_MANAGER_GROUP';
$modversion['config'][$i]['description'] = '_MI_PLEASE_MANAGER_GROUP_DESC';
$modversion['config'][$i]['formtype']    = 'group';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = PLEASE_GROUP_MANAGER;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'access_groups';
$modversion['config'][$i]['title']       = '_MI_PLEASE_ACCESS_GROUPS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_ACCESS_GROUPS_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	XOOPS_GROUP_USER => XOOPS_GROUP_USER, 
													XOOPS_GROUP_ANONYMOUS => XOOPS_GROUP_ANONYMOUS,
													XOOPS_GROUP_ADMIN => XOOPS_GROUP_ADMIN,
													PLEASE_GROUP_STAFF => PLEASE_GROUP_STAFF,
													PLEASE_GROUP_MANAGER => PLEASE_GROUP_MANAGER
);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'access_staff_group';
$modversion['config'][$i]['title']       = '_MI_PLEASE_ACCESS_STAFF_GROUPS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_ACCESS_STAFF_GROUPS_DESC';
$modversion['config'][$i]['formtype']    = 'group';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = PLEASE_GROUP_STAFF;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'access_manager_group';
$modversion['config'][$i]['title']       = '_MI_PLEASE_ACCESS_MANAGER_GROUP';
$modversion['config'][$i]['description'] = '_MI_PLEASE_ACCESS_MANAGER_GROUP_DESC';
$modversion['config'][$i]['formtype']    = 'group';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = PLEASE_GROUP_MANAGER;
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'mantis';
$modversion['config'][$i]['title']       = '_MI_PLEASE_MANTIS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_MANTIS_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'mantis_groups';
$modversion['config'][$i]['title']       = '_MI_PLEASE_MANTIS_GROUPS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_MANTIS_GROUPS_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	PLEASE_GROUP_STAFF => PLEASE_GROUP_STAFF, 
													PLEASE_GROUP_MANAGER => PLEASE_GROUP_MANAGER	);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'manager';
$modversion['config'][$i]['title']       = '_MI_PLEASE_MANAGER';
$modversion['config'][$i]['description'] = '_MI_PLEASE_MANAGER_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'manager_groups';
$modversion['config'][$i]['title']       = '_MI_PLEASE_MANAGER_GROUPS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_MANAGER_GROUPS_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	PLEASE_GROUP_STAFF => PLEASE_GROUP_STAFF, 
													PLEASE_GROUP_MANAGER => PLEASE_GROUP_MANAGER	);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';

++$i;
$modversion['config'][$i]['name']        = 'reportee';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTEE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTEE_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'rrun_reports_onhour';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTINGONHOUR';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTINGONHOUR_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 12+5;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'reportee_groups';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTEE_GROUPS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTEE_GROUPS_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	PLEASE_GROUP_STAFF => PLEASE_GROUP_STAFF, 
													PLEASE_GROUP_MANAGER => PLEASE_GROUP_MANAGER	);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'reportee_only';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTEE_ONLY';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTEE_ONLY_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	PLEASE_GROUP_STAFF => PLEASE_GROUP_STAFF, 
													PLEASE_GROUP_MANAGER => PLEASE_GROUP_MANAGER	);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'cron_method';
$modversion['config'][$i]['title']       = '_MI_PLEASE_CRON_METHOD';
$modversion['config'][$i]['description'] = '_MI_PLEASE_CRON_METHOD_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_CRON_METHOD_PRELOADS_DESC =>	_MI_PLEASE_CRON_METHOD_PRELOADS 	);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_CRON_METHOD_CRONTAB_DESC =>	_MI_PLEASE_CRON_METHOD_CRONTAB, 
													_MI_PLEASE_CRON_METHOD_SCHEDULETASK_DESC =>	_MI_PLEASE_CRON_METHOD_SCHEDULETASK	);
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'reports_scheduling';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_SCHEDULING';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_SCHEDULING_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORT_SCHEDULE_INSTANCE => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY => _MI_PLEASE_SCHEDULE_WEEKLY							);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORT_SCHEDULE_TOP20_DESC => _MI_PLEASE_REPORT_TOP20_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_HIGHLIGHTS_DESC => _MI_PLEASE_REPORT_HIGHLIGHTS_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_INSTANCE_DESC => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_DAILY_DESC => _MI_PLEASE_SCHEDULE_DAILY,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY_DESC => _MI_PLEASE_SCHEDULE_WEEKLY,
													_MI_PLEASE_REPORT_SCHEDULE_FORTNIGHTLY_DESC => _MI_PLEASE_SCHEDULE_FORTNIGHTLY,
													_MI_PLEASE_REPORT_SCHEDULE_MONTHLY_DESC => _MI_PLEASE_SCHEDULE_MONTHLY,
													_MI_PLEASE_REPORT_SCHEDULE_QUARTERLY_DESC => _MI_PLEASE_SCHEDULE_QUARTERLY,
													_MI_PLEASE_REPORT_SCHEDULE_ANNUALLY_DESC => _MI_PLEASE_SCHEDULE_ANNUALLY				);
$modversion['config'][$i]['category']    = 'reports';

++$i;
$modversion['config'][$i]['name']        = 'reports_staff';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_STAFF_SCHEDULING';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_STAFF_SCHEDULING_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORT_SCHEDULE_INSTANCE => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY => _MI_PLEASE_SCHEDULE_WEEKLY							);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORT_SCHEDULE_TOP20_DESC => _MI_PLEASE_REPORT_TOP20_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_HIGHLIGHTS_DESC => _MI_PLEASE_REPORT_HIGHLIGHTS_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_INSTANCE_DESC => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_DAILY_DESC => _MI_PLEASE_SCHEDULE_DAILY,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY_DESC => _MI_PLEASE_SCHEDULE_WEEKLY,
													_MI_PLEASE_REPORT_SCHEDULE_FORTNIGHTLY_DESC => _MI_PLEASE_SCHEDULE_FORTNIGHTLY,
													_MI_PLEASE_REPORT_SCHEDULE_MONTHLY_DESC => _MI_PLEASE_SCHEDULE_MONTHLY,
													_MI_PLEASE_REPORT_SCHEDULE_QUARTERLY_DESC => _MI_PLEASE_SCHEDULE_QUARTERLY,
													_MI_PLEASE_REPORT_SCHEDULE_ANNUALLY_DESC => _MI_PLEASE_SCHEDULE_ANNUALLY				);
$modversion['config'][$i]['category']    = 'reports';


++$i;
$modversion['config'][$i]['name']        = 'reports_department';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_DEPARTMENT_SCHEDULING';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_DEPARTMENT_SCHEDULING_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORT_SCHEDULE_INSTANCE => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY => _MI_PLEASE_SCHEDULE_WEEKLY							);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORT_SCHEDULE_TOP20_DESC => _MI_PLEASE_REPORT_TOP20_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_HIGHLIGHTS_DESC => _MI_PLEASE_REPORT_HIGHLIGHTS_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_INSTANCE_DESC => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_DAILY_DESC => _MI_PLEASE_SCHEDULE_DAILY,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY_DESC => _MI_PLEASE_SCHEDULE_WEEKLY,
													_MI_PLEASE_REPORT_SCHEDULE_FORTNIGHTLY_DESC => _MI_PLEASE_SCHEDULE_FORTNIGHTLY,
													_MI_PLEASE_REPORT_SCHEDULE_MONTHLY_DESC => _MI_PLEASE_SCHEDULE_MONTHLY,
													_MI_PLEASE_REPORT_SCHEDULE_QUARTERLY_DESC => _MI_PLEASE_SCHEDULE_QUARTERLY,
													_MI_PLEASE_REPORT_SCHEDULE_ANNUALLY_DESC => _MI_PLEASE_SCHEDULE_ANNUALLY				);
$modversion['config'][$i]['category']    = 'reports';


// Notification
$modversion['hasNotification']             = false;
//$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
//$modversion['notification']['lookup_func'] = 'publisher_notify_iteminfo';

//$modversion['notification']['category'][1]['name']           = 'global_item';
//$modversion['notification']['category'][1]['title']          = _MI_PLEASE_GLOBAL_ITEM_NOTIFY;
//$modversion['notification']['category'][1]['description']    = _MI_PLEASE_GLOBAL_ITEM_NOTIFY_DSC;
//$modversion['notification']['category'][1]['subscribe_from'] = array('index.php', 'category.php', 'item.php');

//$modversion['notification']['event'][1]['name']          = 'category_created';
//$modversion['notification']['event'][1]['category']      = 'global_item';
//$modversion['notification']['event'][1]['title']         = _MI_PLEASE_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY;
//$modversion['notification']['event'][1]['caption']       = _MI_PLEASE_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_CAP;
//$modversion['notification']['event'][1]['description']   = _MI_PLEASE_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_DSC;
//$modversion['notification']['event'][1]['mail_template'] = 'global_item_category_created';
//$modversion['notification']['event'][1]['mail_subject']  = _MI_PLEASE_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_SBJ;

?>
