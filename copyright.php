<?
include("include/session.php");
include("include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - Copyright Agreement";
	include 'head.php';
?>
	<div class="subheadtext">
		<h1>License Agreement</h1>
	</div>
	<div class="text">
		<p style="text-align:center"><b><i>BY DOWNLOADING THIS PRODUCT, END USER ACKNOWLEDGES HAVING READ AND AGREED TO THIS CONTRACT</b></i></p>
		<h2 style="text-align:center">CMP Professional Development Videos and Support Materials (CMP)</h2>
		<p style="text-align:center">End User Agreement</p>

		<p><u>Notification of Copyright:</u> CMP is a proprietary product of Michigan State University (.MSU.) and is protected by copyright laws and international treaty.  You (as End User.) must treat CMP like any other copyrighted material.  You may make copies of the product, however, MSU notifications of copyright must be left intact.  If you have any questions concerning this agreement, please contact MSU Technologies, MSU, 3900 Collins Road, Lansing, MI 48910, Tel: 517.355.2186.</p>
		<p><u>License:</u> MSU grants End User the royalty-free, non-exclusive, non-transferable right to use CMP for research or educational purposes.  You may not redistribute, transfer, rent, lease, sell, lend, sub-license, prepare derivative works, decompile, or reverse-engineer this product without prior express written consent of MSU at the above address.</p>
		<p>Commercial use of the product is strictly prohibited under this agreement, and must be subject to a separate agreement negotiated in advance with MSU.</p>
		<p>MSU retains title to CMP.  End User agrees to use reasonable efforts to protect the product from unauthorized use, reproduction, distribution, or publication.  All rights not specifically granted in this Agreement are reserved by MSU.</p>
		<p><u>Warranty:</u> CMP is provided .as is..  MSU MAKES NO WARRANTY, EXPRESS OR IMPLIED, TO END USER OR TO ANY OTHER PERSON OR ENTITY.  SPECIFICALLY, MSU MAKES NO WARRANTY OF MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE OF THE PRODUCT. MSU WILL NOT BE LIABLE FOR SPECIAL, INCIDENTAL, CONSEQUENTIAL, INDIRECT OR OTHER SIMILAR DAMAGES, EVEN IF MSU OR ITS EMPLOYEES HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.  IN NO EVENT WILL MSU LIABILITY FOR ANY DAMAGES TO END USER OR ANY PERSON EVER EXCEED THE FEE PAID FOR THE LICENSE TO USE THE PRODUCT, REGARDLESS OF THE FORM OF THE CLAIM.</p>

		<p><u>General:</u> If any provision of this Agreement is unlawful, void, or for any reason unenforceable, it shall be deemed severable from, and shall in no way affect the validity or enforceability of the remaining provisions of this Agreement.  This Agreement shall be governed by Michigan law.</p>
		<p style="text-align:center"><i>Michigan State University is an affirmative action/equal opportunity employer</i></p>
		<p style="text-align:center">The videos are intended for professional development only and NOT
for  research purposes.<p>
		<p style="text-align:center"><a href="index.php">I have read and agree to the terms and conditions specified in the agreement above.</a></p>
	</div>

<?
	include 'foot.php';
}
?>
