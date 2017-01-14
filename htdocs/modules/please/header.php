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
	
	include_once (dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'mainfile.php');

	ini_set('display_errors', true);
	ini_set('log_errors', true);
	error_reporting(E_ERROR);
	
	if (!defined('_MI_PLEASE_MODULE_DIRNAME'))
		define('_MI_PLEASE_MODULE_DIRNAME', basename(__DIR__));
	if (!defined('PLEASE_UPLOAD_PATH'))
		define('PLEASE_UPLOAD_PATH', XOOPS_ROOT_PATH . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . basename(__DIR__));
	if (!defined('PLEASE_DATA_PATH'))
		define('PLEASE_DATA_PATH', XOOPS_VAR_PATH . DIRECTORY_SEPARATOR . basename(__DIR__));
	if (!defined('PLEASE_UPLOAD_URL'))
		define('PLEASE_UPLOAD_URL', XOOPS_URL . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . basename(__DIR__));
	if (!defined('PLEASE_DATA_URL'))
		define('PLEASE_DATA_URL', XOOPS_URL . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . basename(__DIR__) . DIRECTORY_SEPARATOR . 'data' );
	if (!is_dir(PLEASE_UPLOAD_PATH))
		mkdir(PLEASE_UPLOAD_PATH, 0777, true);
	if (!is_dir(PLEASE_DATA_PATH))
		mkdirSecure(PLEASE_DATA_PATH, 0777, true);
	
	xoops_loadLanguage('modinfo', _MI_PLEASE_MODULE_DIRNAME);
	xoops_loadLanguage('errors', _MI_PLEASE_MODULE_DIRNAME);
	
	global $pleaseModule, $pleaseConfigsList, $pleaseConfigs, $pleaseConfigsOptions;

	if (empty($pleaseModule))
	{
		if (is_a($pleaseModule = xoops_gethandler('module')->getByDirname(_MI_PLEASE_MODULE_DIRNAME), "XoopsModule"))
		{
			if (empty($pleaseConfigsList))
			{
				$pleaseConfigsList = xoops_gethandler('config')->getConfigList($pleaseModule->getVar('mid'));
				if (!defined('_MD_CONVERT_DEFAULT_TWITTER'))
					define('_MD_CONVERT_DEFAULT_TWITTER',$pleaseConfigsList['username']);
			}
			if (empty($pleaseConfigs))
			{
				$pleaseConfigs = xoops_gethandler('config')->getConfigs(new Criteria('conf_modid', $pleaseModule->getVar('mid')));
			}
			if (empty($pleaseConfigsOptions) && !empty($pleaseConfigs))
			{
				foreach($pleaseConfigs as $key => $config)
					$pleaseConfigsOptions[$config->getVar('conf_name')] = $config->getConfOptions();
			}
		}
	}

	include_once (__DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'functions.php');

?>