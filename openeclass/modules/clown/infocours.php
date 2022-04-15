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

/*===========================================================================
	infocours.php
	@last update: 31-05-2006 by Pitsiougas Vagelis
	@authors list: Karatzidis Stratos <kstratos@uom.gr>
		       Pitsiougas Vagelis <vagpits@uom.gr>
==============================================================================
        @Description: Edit basic information of a course

 	This script allows the administrator to edit the basic information of a
 	selected course

 	The user can : - Edit the basic information of a course
                 - Return to edit course list

 	@Comments: The script is organised in four sections.

  1) Gather basic course information
  2) Edit that information
  3) Update course
  4) Display all on an HTML page

==============================================================================*/

/*****************************************************************************
		DEAL WITH LANGFILES, BASETHEME, OTHER INCLUDES AND NAMETOOLS
******************************************************************************/
// Initialize some variables
$searchurl = "";

// Check if user is administrator and if yes continue
// Othewise exit with appropriate message
$require_admin = TRUE;
// Include baseTheme
include '../../include/baseTheme.php';
if(!isset($_GET['sorry'])) { die(); }
// Define $nameTools
$nameTools = $langCourseInfo;
$navigation[] = array("url" => "index.php", "name" => $langAdmin);
$navigation[] = array("url" => "listcours.php", "name" => $langListCours);
$navigation[] = array("url" => "editcours.php?sorry=".htmlspecialchars($_GET['sorry']), "name" => $langCourseEdit);
// Initialise $tool_content
$tool_content = "";
include '../../csrf_token.php';
csrf_token_tag();
$token = $_SESSION['csrf_token'];
/*****************************************************************************
		MAIN BODY
******************************************************************************/
// Define $searchurl to go back to search results
if (isset($search) && ($search=="yes")) {
	$searchurl = "&search=yes";
}
// Update cours basic information
if (isset($submit))  {
  if (!$csrf_token || $csrf_token !== $_SESSION['csrf_token'] || $_SERVER['REMOTE_ADDR'] != $_SESSION['ipaddress']) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
    session_unset();
    session_destroy();
	} else {
  // Get faculte ID and faculte name for $faculte
  // $faculte example: 12--Tmima 1
  list($facid, $facname) = explode("--", $faculte);
  // Update query
	$sql = mysql_query("UPDATE cours SET faculte='$facname', titulaires='$titulaires', intitule='$intitule', faculteid='$facid' WHERE code='".mysql_real_escape_string($_GET['sorry'])."'");
	// Some changes happened
	if (mysql_affected_rows() > 0) {
		$sql = mysql_query("UPDATE cours_faculte SET faculte='$facname', facid='$facid' WHERE code='".mysql_real_escape_string($_GET['sorry'])."'");
		$tool_content .= "<p class=\"alert1\">".$langCourseEditSuccess."</p>";
	}
	// Nothing updated
	else {
		$tool_content .= "<p class=\"alert1\">".$langNoChangeHappened."</p>";
	}
}

}
// Display edit form for course basic information
else {
	// Get course information
	$row = mysql_fetch_array(mysql_query("SELECT * FROM cours WHERE code='".mysql_real_escape_string($_GET['sorry'])."'"));
	// Constract the edit form
	$tool_content .= "
  <form action=".htmlspecialchars($_SERVER['PHP_SELF'])."?sorry=".htmlspecialchars($_GET['sorry'])."".$searchurl." method=\"post\">
  <input type='hidden' name='csrf_token' value=$token>
  <table class=\"FormData\" width=\"99%\" align=\"left\">
  <tbody>
  <tr>
    <th width=\"220\">&nbsp;</th>
    <td><b>".$langCourseInfoEdit."</b></td>
  </tr>";
	$tool_content .= "
  <tr>
    <th class=\"left\">".$langFaculty.":</th>
    <td><select name=\"faculte\">\n";
  // Construct select object for facultes
	$resultFac=mysql_query("SELECT id,name FROM faculte ORDER BY number");

	while ($myfac = mysql_fetch_array($resultFac)) {
		if($myfac['id'] == $row['faculteid'])
			$tool_content .= "<option value=\"".$myfac['id']."--".$myfac['name']."\" selected>$myfac[name]</option>";
		else
			$tool_content .= "<option value=\"".$myfac['id']."--".$myfac['name']."\">$myfac[name]</option>";
	}
	$tool_content .= "</select>
    </td>
  </tr>
  <tr>
    <th class=\"left\">".$langCourseCode.":</th>
    <td><i>".$row['code']."</i></td>
  </tr>
  <tr>
    <th class=\"left\">".$langTitle.":</b></th>
    <td><input type=\"text\" name=\"intitule\" value=\"".$row['intitule']."\" size=\"60\"></td>
  </tr>
  <tr>
    <th class=\"left\">".$langTeacher.":</th>
    <td><input type=\"text\" name=\"titulaires\" value=\"".$row['titulaires']."\" size=\"60\"></td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td><input type='submit' name='submit' value='$langModify'></td>
  </tr>
  </tbody>
  </table>
  </form>\n";
}
// If course selected go back to editcours.php
if (isset($_GET['sorry'])) {
	$tool_content .= "<p align=\"right\"><a href=\"editcours.php?sorry=".htmlspecialchars($_GET['sorry'])."".$searchurl."\">".$langBack."</a></p>";
}
// Else go back to index.php directly
else {
	$tool_content .= "<p align=\"right\"><a href=\"index.php\">".$langBackAdmin."</a></p>";
}

/*****************************************************************************
		DISPLAY HTML
******************************************************************************/
// Call draw function to display the HTML
// $tool_content: the content to display
// 3: display administrator menu
// admin: use tool.css from admin folder
draw($tool_content,3,'admin');
