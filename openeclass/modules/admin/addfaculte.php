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
	addfaculte.php
	@last update: 12-07-2006 by Pitsiougas Vagelis
	@authors list: Karatzidis Stratos <kstratos@uom.gr>
		       Pitsiougas Vagelis <vagpits@uom.gr>
==============================================================================
        @Description: Manage Facultes

 	This script allows the administrator to list the available facultes, to
 	delete them or to make new ones.

 	The user can : - See the available facultes
 	               - Delete a faculte
 	               - Create a new faculte
 	               - Edit a faculte
                 - Return to main administrator page

 	@Comments: The script is organised in four sections.

  1) List of available facultes
  2) Add a new faculte
  3) Delete a faculte
  4) Display all on an HTML page

==============================================================================*/

/*****************************************************************************
		DEAL WITH  BASETHEME, OTHER INCLUDES AND NAMETOOLS
******************************************************************************/
// Check if user is administrator and if yes continue
// Othewise exit with appropriate message
include '../../csrf_token.php';
$csrf_token = csrf_token_tag();
$require_admin = TRUE;
// Include baseTheme
include '../../include/baseTheme.php';
// Define $nameTools
$nameTools=$langListFaculteActions;
$navigation[] = array("url" => "index.php", "name" => $langAdmin);
if (isset($a)) {
	switch ($a) {
		case 1:
			$navigation[] = array("url" => "$_SERVER[PHP_SELF]", "name" => $langListFaculteActions);
			$nameTools = $langFaculteAdd;
			break;
		case 2:
			$navigation[] = array("url" => "$_SERVER[PHP_SELF]", "name" => $langListFaculteActions);
			$nameTools = $langFaculteDel;
			break;
		case 3:
			$navigation[] = array("url" => "$_SERVER[PHP_SELF]", "name" => $langListFaculteActions);
			$nameTools = $langFaculteEdit;
			break;
	}
}
// Initialise $tool_content
$tool_content = "";
/*****************************************************************************
		MAIN BODY
******************************************************************************/
	// Give administrator a link to add a new faculty
    $tool_content .= "<div id='operations_container'>
	<ul id='opslist'>
	<li><a href='$_SERVER[PHP_SELF]?a=1'>".$langAdd."</a></li>
	</ul>
	</div>";

// Display all available faculties
if (!isset($a)) {
	// Count available faculties
	$a=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM faculte"));
	// Construct a table
	$tool_content .= "<table width='99%' class='FormData' align='left'>
	<tbody>
	<tr>
	<td class='odd'><b>".$langFaculteCatalog."</b>:
	<div align='right'><i>".$langManyExist.": <b>$a[0]</b> ".$langFaculties."</i></div></td>
	</tr>
	</tbody>
	</table>
	<br />";
	$tool_content .= "<table width='99%' class='FormData' align='left'>
	<tbody><tr>
	<th scope='col' colspan='2'><div align='left'>&nbsp;&nbsp;".$langFaculty."</div></th scope='col'>
	<th scope='col'>$langCode</th>
	<th>".$langActions."</th>
	</tr>";
	$sql=mysql_query("SELECT code,name,id FROM faculte");
	$k = 0;
	// For all faculties display some info
	for ($j = 0; $j < mysql_num_rows($sql); $j++) {
		$logs = mysql_fetch_array($sql);
		if ($k%2==0) {
			$tool_content .= "\n  <tr>";
		} else {
			$tool_content .= "\n  <tr class='odd'>";
		}
		$tool_content .= "\n    <td width='1'>
		<img style='border:0px; padding-top:3px;' src='${urlServer}/template/classic/img/arrow_grey.gif' title='bullet'></td>";
		$tool_content .= "\n    <td>".htmlspecialchars($logs[1])."</td>";
		$tool_content .= "\n    <td align='center'>".htmlspecialchars($logs[0])."</td>";
		$k++;
	}
	// Close table correctly
	$tool_content .= "</tbody></table><br />";
	$tool_content .= "<br /><p align=\"right\"><a href=\"index.php\">".$langBack."</a></p>";

}

/*****************************************************************************
		DISPLAY HTML
******************************************************************************/
// Call draw function to display the HTML
// $tool_content: the content to display
// 3: display administrator menu
// admin: use tool.css from admin folder
draw($tool_content,3);
