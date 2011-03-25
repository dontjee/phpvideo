<?
/*********************
*
* Make sure to set the $title
* to the page title in the document
* that you are including this in
* example usage of this file:
* $title = "fake page";
* include 'head.php';
*
****************/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><? echo "$title"; ?></title>
<link href="http://connectedmath.msu.edu/style.css" rel="stylesheet" type="text/css" />
<?
if( isset($extraHeadData) )
	echo "$extraHeadData";
?>



</head>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10932181-1");
pageTracker._trackPageview();
} catch(err) {}</script>

<body class="thrColElsHdr">

<div id="container">
  <div id="header">
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK REL="SHORTCUT ICON"
       HREF="http://www.connectedmath.msu.edu/logo.ico">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Header</title>
</head>

<body>

<div align="center"><a href="http://www.connectedmath.msu.edu/index.shtml"><img src="http://www.connectedmath.msu.edu/images/cmpbanner.png" alt="Connected Mathematics Project - Home"  border="0" width="960"/></a>
  
</div>
</body>
</html>


  <!-- end #header --></div>
  <div id="sidebar1">
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Navigation</title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="http://www.connectedmath.msu.edu/ddaccordion.js">

/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

</script>


<script type="text/javascript">


ddaccordion.init({
	headerclass: "silverheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 275, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: true, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "selected"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "normal", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>

<style type="text/css"> 

.applemenu{
margin: 0px 0;
padding: 0;
width: 200px; /*width of menu*/
float:inherit;
}

.applemenu div.silverheader a{
background: black url(http://www.connectedmath.msu.edu/images/normal.gif) repeat-x center left;
font: normal 13px Tahoma, "Lucida Grande", "Trebuchet MS", Helvetica, sans-serif;
color: white;
display: block;
position: relative; /*To help in the anchoring of the ".statusicon" icon image*/
width: auto;
padding: 5px 0;
padding-left: 8px;
text-decoration: none;
font-variant:small-caps;
}


.applemenu div.silverheader a:visited, .applemenu div.silverheader a:active{
color: white;
font-variant:small-caps;
}


.applemenu div.selected a, .applemenu div.silverheader a:hover{
background-image: url(http://www.connectedmath.msu.edu/images/selected.gif);
color: #FFFFFF;
font-variant:small-caps;
}

.applemenu div.submenu{ /*DIV that contains each sub menu*/
background-image: url(http://www.connectedmath.msu.edu/images/submenubkgd.gif);
padding: 10px;
height: auto ; /*Height that applies to all sub menu DIVs. A good idea when headers are toggled via "mouseover" instead of "click"*/
}

.applemenu div.submenu a:link, .applemenu div.submenu a:visited{
color:#FFFFFF;
font: normal 12px Tahoma, "Lucida Grande", "Trebuchet MS", Helvetica, sans-serif;
text-decoration: none;

}

.applemenu div.submenu a:hover{
color:#000000;
text-decoration:none;
}


</style><!--[if IE]>
<style type="text/css"> 
/* place css fixes for all versions of IE in this conditional comment */
.twoColElsLtHdr #sidebar1 { padding-top: 30px; }
.twoColElsLtHdr #mainContent { zoom: 1; padding-top: 15px; }
/* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */
</style>
<![endif]-->

</head>

<body>

<div class="applemenu">
<div class="silverheader">
  <div align="left"><a href=" " >Philosophy and Development</a></div>
</div>
	<div class="submenu">
    	<div align="left">
        	<a href="http://www.connectedmath.msu.edu/pnd/authors.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Authors and Staff</a><br /><br />
    	    <a href="http://www.connectedmath.msu.edu/pnd/principles.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Guiding Principles</a><br /><br />

            <a href="http://www.connectedmath.msu.edu/pnd/theory.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Theory and Research</a><br /><br />
    	    <a href="http://www.connectedmath.msu.edu/pnd/development.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;The Development Process</a><br /><br />
        </div>
	</div>

<div class="silverheader">
  <div align="left"><a href=" " >Mathematics Content</a></div>
</div>
	<div class="submenu">

	  <div align="left">
      		<a href="http://www.connectedmath.msu.edu/mathcontent/contents.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Description of Units</a><br /><br />
	        <a href="http://www.connectedmath.msu.edu/mathcontent/goals.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Mathematics Learning Goals</a><br /><br />
		<a href="http://www.connectedmath.msu.edu/mathcontent/mathdev.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Development by Strand</a><br /><br />

	        <a href="http://www.connectedmath.msu.edu/mathcontent/scopeandsequence.pdf">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Scope and Sequence</a><br /><Br />
	        <a href="http://www.connectedmath.msu.edu/mathcontent/standards.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Alignment with Standards</a><br /><Br />
	        <a href="http://www.connectedmath.msu.edu/mathcontent/skills.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Skills in CMP</a><br /><br />

	        <a href="http://www.connectedmath.msu.edu/mathcontent/algebra.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Algebra in CMP</a>
      </div>
	</div>
<div class="silverheader">
  <div align="left"><a href=" ">Components of CMP</a></div>
</div>
  <div class="submenu">
      <div align="left">
      		<a href="http://www.connectedmath.msu.edu/components/student.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Student Materials</a><br /><br />

            <a href="http://www.connectedmath.msu.edu/components/teacher.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Teacher Materials</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/components/assessment.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Assessment</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/components/resources.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Resources and Technology</a>
    </div>
  </div>
		
<div class="silverheader">
  <div align="left"><a href=" ">Teaching CMP</a></div>

</div>
  <div class="submenu"
	  <div align="left">
      		<a href="http://www.connectedmath.msu.edu/teaching/teaching.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Teaching a CMP Unit</a><Br /><Br />
	        <a href="http://www.connectedmath.msu.edu/teaching/classroom.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Classroom Environment</a><br /><br />
	        <a href="http://www.connectedmath.msu.edu/teaching/group.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Cooperative Group Work</a><br /><Br />
	        <a href="http://www.connectedmath.msu.edu/teaching/evaluate.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Evaluating Student Work</a><br /><br />
       		<a href="http://www.connectedmath.msu.edu/teaching/differentiated/index.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Differentiated Instruction</a><br /><br />

    </div>
  </div>
  
  <div class="silverheader">
  <div align="left"><a href=" " >Implementing CMP</a></div>
</div>
	<div class="submenu">
	  <div align="left">
     		<a href="http://www.connectedmath.msu.edu/implementing/preparing.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Preparing to Implement</a><br /><br />

	      <a href="http://www.connectedmath.msu.edu/implementing/elementary.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Transition from Elementary</a><br /><br />
	      <a href="http://www.connectedmath.msu.edu/implementing/high.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Transition to High School</a><br /><br />
      </div>
  </div>

<div class="silverheader">
  <div align="left"><a href=" ">Professional Development</a></div>
</div>
	<div class="submenu">

      <div align="left">
    		<a href="http://www.connectedmath.msu.edu/pd/longterm.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Successful Long Term PD</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/pd/contexts.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Contexts for PD</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/pd/momentum.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Maintaining Momentum</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/pd/guides.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Teacher's Guides and PD</a><br /><br />	  
	    <a href="http://www.connectedmath.msu.edu/pd/transparencies.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Transparencies for PD</a><br /><br />
	<a href="http://www.connectedmath.msu.edu/mathcontent/mathdev.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Development by Strand</a><br /><br />
	
      </div>

	</div>
    
<div class="silverheader">
  <div align="left"><a href=" ">Videos and Technology</a></div>
</div>
	<div class="submenu">
      <div align="left">
            <a href="http://www.connectedmath.msu.edu/streaming/login.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;CMP Streaming Video</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/vnt/other.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Other CMP Video</a><br /><br />

            <a href="http://www.connectedmath.msu.edu/vnt/interactive/index.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;CMP Interactive Resources</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/vnt/cmp1/index.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;CMP 1 Games</a>
            
            
      </div>
	</div>    
    
<div class="silverheader">
  <div align="left"><a href=" ">CMP Conferences</a></div>
</div>
	<div class="submenu">

      <div align="left">
      		<a href="http://www.connectedmath.msu.edu/conferences/users/index.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;CMP Users' Conference</a><br /><br />
     		<a href="http://www.connectedmath.msu.edu/conferences/leadership/index.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;CMP Leadership Conference</a><br /><br />
     		<a href="http://www.connectedmath.msu.edu/conferences/gtk/index.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;CMP Getting to Know</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/conferences/outside/index.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Outside Workshops</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/conferences/gtk/carnival.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;CMP Carnival</a><br /><br />

	    	
      </div>
	</div>    
    

<div class="silverheader">
  <div align="left"><a href=" ">Site for Parents</a></div>
</div>    
	<div class="submenu">
      <div align="left">
      		<a href="http://www.connectedmath.msu.edu/parents/welcome.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Welcome</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/parents/tips.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;General Homework Tips</a><br /><br />

            <a href="http://www.connectedmath.msu.edu/parents/help/index.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Mathematical Help</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/parents/glossary/index.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Glossary</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/parents/development/strand/index.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Math Content by Strand</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/parents/other.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Other Areas of Interest</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/parents/faq.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;FAQ</a>
      </div>

	</div>
    
<div class="silverheader">
  <div align="left"><a href=" ">Research & Evaluation</a></div>
</div>
  <div class="submenu">
      <div align="left">
      		<a href="http://www.connectedmath.msu.edu/rne/2006.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;2006 Evaluation Booklet</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/rne/new.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;New Studies</a><br /><br />

            <a href="http://www.connectedmath.msu.edu/rne/lit.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;CMP Literature Review 2010</a>
    </div>
  </div>    
    
    
<div class="silverheader">
  <div align="left"><a href=" ">Additional Information</a></div>
</div>
  <div class="submenu">
      <div align="left">
      <a href="http://www.pearsonschool.com/index.cfm?PMDbSiteId=2781&PMDbSolutionId=6724&PMDbSubSolutionId=6732&PMDbCategoryId=806&PMDbSubCategoryId=&PMDbProgramId=53741&level=4&prognav=pt&locator=PSZ15d" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Purchase Information</a><br /><br />

            <a href="http://www.connectedmath.msu.edu/contact.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Contact</a><br /><br />
            <a href="http://www.connectedmath.msu.edu/links.shtml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8250;&nbsp;Links</a>
    </div>
  </div>


	



</div>

<a href="http://www.googlesyndicatedsearch.com/u/connectedmath"><img src="http://www.connectedmath.msu.edu/images/search.gif" alt="CMP Search" border="0" /></a>

</body>
</html>

  <!-- end #sidebar1 --></div>
  
	<div id="mainContent">
		<div id="vidNav" align="center">
<?
	if( isset($session) ){
		echo "<a href=\"/cmplogin/index.php\">Videos Home</a> &nbsp;&nbsp;";
		if($session->logged_in){
			echo "<a href=\"/cmplogin/useredit.php\">My Account</a> &nbsp;&nbsp;";
			echo "<a href=\"/cmplogin/feedback.php\">Leave Feedback</a> &nbsp;&nbsp;";
		}
		if($session->isAdmin()){
			echo "<a href=\"/cmplogin/admin/admin.php\">Admin Center</a> &nbsp;&nbsp;";
		}
		if($session->logged_in){
			echo "<a href=\"/cmplogin/process.php\">Logout</a>";
		}
		else{
			echo "<a href=\"/cmplogin/main.php\">Login</a>&nbsp;&nbsp;";
			echo "<a href=\"/cmplogin/register.php\">Create an Account</a>";
		}
	}
?>
	</div>
