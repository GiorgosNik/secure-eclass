<?php
/*========================================================================
*   Open eClass 2.3
*   E-learning and Course Management System
* ========================================================================
*  Copyright(c) 2003-2010  Greek Universities Network - GUnet
*  A full copyright notice can be read in "/info/copyright.txt".
*
*  Developers Group:	Costas Tsibanis <k.tsibanis@noc.uoa.gr>
*			Yannis Exidaridis <jexi@noc.uoa.gr>
*			Alexandros Diamantidis <adia@noc.uoa.gr>
*			Tilemachos Raptis <traptis@noc.uoa.gr>
*
*  For a full list of contributors, see "credits.txt".
*
*  Open eClass is an open platform distributed in the hope that it will
*  be useful (without any warranty), under the terms of the GNU (General
*  Public License) as published by the Free Software Foundation.
*  The full license can be read in "/info/license/license_gpl.txt".
*
*  Contact address: 	GUnet Asynchronous eLearning Group,
*  			Network Operations Center, University of Athens,
*  			Panepistimiopolis Ilissia, 15784, Athens, Greece
*  			eMail: info@openeclass.org
* =========================================================================*/

/*
 * Tool Component
 *
 * @author Evelthon Prodromou <eprodromou@upnet.gr>
 * @version $Id: tools.php,v 1.78 2009-11-06 13:49:29 jexi Exp $
 *
 * @abstract This component creates an array of the tools that are displayed on the left
 * side column .
 *
 */

/*
 * Function getSideMenu
 *
 * Offers an upper-layer logic. Decides what function should be called to
 * create the needed tools array
 *
 * @param int $menuTypeID Type of menu to generate
 *
 */
function getSideMenu($menuTypeID){

	switch ($menuTypeID){
		case 0: { //logged out
			$menu = loggedOutMenu();
			break;
		}

		case 1: { //logged in
			$menu = loggedInMenu();
			break;
		}

		case 2: { //course home (lesson tools)
			$menu = lessonToolsMenu();
			break;
		}

		case 3: { // admin tools
			$menu = adminMenu();
			break;
		}

		case 4: { // custom tools
			$menu = customMenu();
			break;
		}
	}
	return $menu;
}


/*
 * Function getToolsArray
 *
 * Queries the database for tool information in accordance
 * to the parameter passed.
 *
 * @param string $cat Type of lesson tools
 * @return mysql_resource
 * @see function lessonToolsMenu
 */
function getToolsArray($cat) {
	global $currentCourse, $currentCourseID;
	$currentCourse = $currentCourseID;

	switch ($cat) {
		case 'Public':
			if (!check_guest()) {
				if (isset($_SESSION['uid']) and $_SESSION['uid']) {
					$result = db_query("
                    SELECT * FROM accueil
                    WHERE visible=1
                    ORDER BY rubrique", $currentCourse);
				} else {
					$result = db_query("
                    SELECT * FROM accueil
                    WHERE visible=1 AND lien NOT LIKE '%/user.php'
                    AND lien NOT LIKE '%/conference/conference.php'
                    AND lien NOT LIKE '%/work/work.php'
			AND lien NOT LIKE '%/dropbox/index.php'
			AND lien NOT LIKE '%/questionnaire/questionnaire.php'
			AND lien NOT LIKE '%/phpbb/index.php'
			AND lien NOT LIKE '%/learnPath/learningPathList.php'
                    ORDER BY rubrique", $currentCourse);
				}
			} else {
				$result = db_query("
				SELECT * FROM `accueil`
				WHERE `visible` = 1
				AND (
				`id` = 1 or
				`id` = 2 or
				`id` = 3 or
				`id` = 4 or
				`id` = 7 or
				`id` = 10 or
				`id` = 20)
				ORDER BY rubrique
				", $currentCourse);
			}
			break;
		case 'PublicButHide':

			$result = db_query("
                    select *
                    from accueil
                    where visible=0
                    and admin=0
                    ORDER BY rubrique", $currentCourse);
			break;
		case 'courseAdmin':
			$result = db_query("
                    select *
                    from accueil
                    where admin=1
                    ORDER BY rubrique", $currentCourse);
			break;
	}

	return $result;

}


/**
 * Function loggedInMenu
 *
 * Creates a multi-dimensional array of the user's tools
 * when the user is signed in, and not at a lesson specific tool,
 * in regard to the user's user level.
 *
 * (student | professor | platform administrator)
 *
 * @return array
 */
function loggedInMenu(){
	global $webDir, $language, $uid, $is_admin, $urlServer, $mysqlMainDb;

	$sideMenuGroup = array();

	if (isset($is_admin) and $is_admin) {
		$sideMenuSubGroup = array();
		$sideMenuText = array();
		$sideMenuLink = array();
		$sideMenuImg	= array();
	
		$arrMenuType = array();
		$arrMenuType['type'] = 'text';
		$arrMenuType['text'] = $GLOBALS['langAdminOptions'];
		array_push($sideMenuSubGroup, $arrMenuType);
	
		array_push($sideMenuText, "<b style=\"color:#a33033;\">$GLOBALS[langAdminTool]</b>");
		array_push($sideMenuLink, $urlServer . "modules/clown/");
		array_push($sideMenuImg, "black-arrow1.gif");
		
		array_push($sideMenuSubGroup, $sideMenuText);
		array_push($sideMenuSubGroup, $sideMenuLink);
		array_push($sideMenuSubGroup, $sideMenuImg);
		array_push($sideMenuGroup, $sideMenuSubGroup);
	}

	$sideMenuSubGroup = array();
	$sideMenuText 	= array();
	$sideMenuLink 	= array();
	$sideMenuImg	= array();

	$arrMenuType = array();
	$arrMenuType['type'] = 'text';
	$arrMenuType['text'] = $GLOBALS['langUserOptions'];

	array_push($sideMenuSubGroup, $arrMenuType);

	$res2 = db_query("SELECT statut FROM user WHERE user_id = '$uid'",$mysqlMainDb);

	if ($row = mysql_fetch_row($res2)) $statut = $row[0];

	if ($statut == 1) {
		array_push($sideMenuText, $GLOBALS['langCourseCreate']);
		array_push($sideMenuLink, $urlServer . "modules/create_course/create_course.php");
		array_push($sideMenuImg, "black-arrow1.gif");
	}

	array_push($sideMenuText, $GLOBALS['langRegCourses']);
	array_push($sideMenuLink, $urlServer . "modules/auth/courses.php");
	array_push($sideMenuImg, "black-arrow1.gif");

	array_push($sideMenuText, $GLOBALS['langModifyProfile']);
	array_push($sideMenuLink, $urlServer . "modules/profile/profile.php");
	array_push($sideMenuImg, "black-arrow1.gif");
	
	array_push($sideMenuSubGroup, $sideMenuText);
	array_push($sideMenuSubGroup, $sideMenuLink);
	array_push($sideMenuSubGroup, $sideMenuImg);
	array_push($sideMenuGroup, $sideMenuSubGroup);



	$sideMenuSubGroup = array();
	$sideMenuText = array();
	$sideMenuLink = array();
	$sideMenuImg = array();

	$arrMenuType = array();
	$arrMenuType['type'] = 'text';
	$arrMenuType['text'] = $GLOBALS['langBasicOptions'];
	array_push($sideMenuSubGroup, $arrMenuType);

	array_push($sideMenuText, $GLOBALS['langListCourses']);
	array_push($sideMenuLink, $urlServer."modules/auth/listfaculte.php");
	array_push($sideMenuImg, "black-arrow1.gif");

	array_push($sideMenuSubGroup, $sideMenuText);
	array_push($sideMenuSubGroup, $sideMenuLink);
	array_push($sideMenuSubGroup, $sideMenuImg);
	array_push($sideMenuGroup, $sideMenuSubGroup);

	return $sideMenuGroup;
}

/**
 * Function loggedOutMenu
 *
 * Creates a multi-dimensional array of the user's tools/links
 * for the menu presented when the user is not logged in.
 * *
 * @return array
 */
function loggedOutMenu(){

	global $webDir, $language, $urlServer, $is_eclass_unique, $mysqlMainDb;

	$sideMenuGroup = array();

	$sideMenuSubGroup = array();
	$sideMenuText 	= array();
	$sideMenuLink 	= array();
	$sideMenuImg	= array();

	$arrMenuType = array();
	$arrMenuType['type'] = 'text';
	$arrMenuType['text'] = $GLOBALS['langBasicOptions'];
	array_push($sideMenuSubGroup, $arrMenuType);
	
	array_push($sideMenuText, $GLOBALS['langListCourses']);
	array_push($sideMenuLink, $urlServer."modules/auth/listfaculte.php");
	array_push($sideMenuImg, "black-arrow1.gif");
	array_push($sideMenuText, $GLOBALS['langNewUser']);
	array_push($sideMenuLink, $urlServer."modules/auth/registration.php");
	array_push($sideMenuImg, "black-arrow1.gif");

	array_push($sideMenuSubGroup, $sideMenuText);
	array_push($sideMenuSubGroup, $sideMenuLink);
	array_push($sideMenuSubGroup, $sideMenuImg);

	array_push($sideMenuGroup, $sideMenuSubGroup);
	return $sideMenuGroup;
}

function adminMenu(){

	global $webDir, $urlAppend, $language, $phpSysInfoURL, $phpMyAdminURL;
	global $siteName, $is_admin, $urlServer, $mysqlMainDb, $close_user_registration;

	$sideMenuGroup = array();

	$sideMenuSubGroup = array();
	$sideMenuText = array();
	$sideMenuLink = array();
	$sideMenuImg	= array();

	//user administration
	$arrMenuType = array();
	$arrMenuType['type'] = 'text';
	$arrMenuType['text'] = $GLOBALS['langAdminUsers'];
	array_push($sideMenuSubGroup, $arrMenuType);
	array_push($sideMenuText, $GLOBALS['langListUsersActions']);
	array_push($sideMenuLink, "../clown/listusers.php");
	array_push($sideMenuImg, "black-arrow1.gif");

	
	array_push($sideMenuSubGroup, $sideMenuText);
	array_push($sideMenuSubGroup, $sideMenuLink);
	array_push($sideMenuSubGroup, $sideMenuImg);
	array_push($sideMenuGroup, $sideMenuSubGroup);

	//lesson administration
	//reset sub-arrays so that we do not have duplicate entries
	$sideMenuSubGroup = array();
	$sideMenuText = array();
	$sideMenuLink = array();
	$sideMenuImg	= array();

	$arrMenuType = array();
	$arrMenuType['type'] = 'text';
	$arrMenuType['text'] = $GLOBALS['langAdminCours'];
	array_push($sideMenuSubGroup, $arrMenuType);

	array_push($sideMenuText, $GLOBALS['langListCours']);
	array_push($sideMenuLink, "../clown/listcours.php");
	array_push($sideMenuImg, "black-arrow1.gif");
	array_push($sideMenuText, $GLOBALS['langListFaculte']);
	

	array_push($sideMenuImg, "black-arrow1.gif");
	array_push($sideMenuSubGroup, $sideMenuText);
	array_push($sideMenuSubGroup, $sideMenuLink);
	array_push($sideMenuSubGroup, $sideMenuImg);
	array_push($sideMenuGroup, $sideMenuSubGroup);

	//server administration
	//reset sub-arrays so that we do not have duplicate entries
	$sideMenuSubGroup = array();
	$sideMenuText = array();
	$sideMenuLink = array();
	$sideMenuImg	= array();



	//other tools
	//reset sub-arrays so that we do not have duplicate entries
	$sideMenuSubGroup = array();
	$sideMenuText = array();
	$sideMenuLink = array();
	$sideMenuImg	= array();

	$arrMenuType = array();
	$arrMenuType['type'] = 'text';
	$arrMenuType['text'] = $GLOBALS['langGenAdmin'];
	array_push($sideMenuSubGroup, $arrMenuType);

	array_push($sideMenuText, $GLOBALS['langConfigFile']);
	array_push($sideMenuLink, "../clown/eclassconf.php");
	array_push($sideMenuImg, "black-arrow1.gif");


	array_push($sideMenuSubGroup, $sideMenuText);
	array_push($sideMenuSubGroup, $sideMenuLink);
	array_push($sideMenuSubGroup, $sideMenuImg);
	array_push($sideMenuGroup, $sideMenuSubGroup);

	return $sideMenuGroup;
}


/**
 * Function lessonToolsMenu
 *
 * Creates a multi-dimensional array of the user's tools
 * in regard to the user's user level
 * (student | professor | platform administrator)
 *
 * @return array
 */
function lessonToolsMenu(){
	global $is_admin, $is_adminOfCourse, $uid, $mysqlMainDb;
	global $webDir, $language;

	$sideMenuGroup = array();

	//	------------------------------------------------------------------
	//	Get public tools
	//	------------------------------------------------------------------
	$result = getToolsArray('Public');

	$sideMenuSubGroup = array();
	$sideMenuText = array();
	$sideMenuLink = array();
	$sideMenuImg = array();
	$sideMenuID = array();


	$arrMenuType = array();
	if ($is_adminOfCourse) {
		$arrMenuType['type'] = 'text';
		$arrMenuType['text'] = $GLOBALS['langActiveTools'];
	} 
	array_push($sideMenuSubGroup, $arrMenuType);

	while ($toolsRow = mysql_fetch_array($result)) {
		if(!defined($toolsRow["define_var"])) define($toolsRow["define_var"], $toolsRow["id"]);

		array_push($sideMenuText, $toolsRow["rubrique"]);
		array_push($sideMenuLink, $toolsRow["lien"]);
		array_push($sideMenuImg, $toolsRow["image"]."_on.gif");
		array_push($sideMenuID, $toolsRow["id"]);
	}

	array_push($sideMenuSubGroup, $sideMenuText);
	array_push($sideMenuSubGroup, $sideMenuLink);
	array_push($sideMenuSubGroup, $sideMenuImg);
	array_push($sideMenuSubGroup, $sideMenuID);
	array_push($sideMenuGroup, $sideMenuSubGroup);
	//	------------------------------------------------------------------
	//	END of Get public tools
	//	------------------------------------------------------------------

	//	------------------------------------------------------------------
	//	Get professor's tools
	//	------------------------------------------------------------------

	$res2 = db_query("SELECT statut FROM user WHERE user_id = '$uid'",$mysqlMainDb);

	if ($row = mysql_fetch_row($res2)) $statut = $row[0];


	//	------------------------------------------------------------------
	//	END of Get professor's tools
	//	------------------------------------------------------------------

	return $sideMenuGroup;
}
