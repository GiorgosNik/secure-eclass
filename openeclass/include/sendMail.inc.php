<?
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

// Send a mail message, with the proper MIME headers and charset tag
// From: address is always the platform administrator, and the
// $from_address specified appears in the Reply-To: header
function send_mail($from, $from_address, $to, $to_address,
                   $subject, $body, $charset, $extra_headers = '')
{
        
}


// Send a Multipart/Alternative message, with the proper MIME headers
// and charset tag, with a plain text and an HTML part
// From: address is always the platform administrator, and the
// $from_address specified appears in the Reply-To: header
function send_mail_multipart($from, $from_address, $to, $to_address,
                   $subject, $body_plain, $body_html, $charset)
{
        
}


// Determine the correct From: header
function from($from, $from_address)
{
        
}


// Determine the correct Reply-To: header if needed
function reply_to($from, $from_address)
{
        
}


// Encode a mail header line with according to MIME / RFC 2047
function qencode($header, $charset)
{
	
}
