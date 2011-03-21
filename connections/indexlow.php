<?
include("../include/session.php");
include("../include/functions.php");

if(!$session->logged_in){
   $url = curPageUrl();
   header("Location: main.php?returl=$url");
}
else{
	$title = "Connected Mathematics - Connections Streaming Video";
	include '../head.php';
?>

<div id="content"> 
				<div class="subheadtext">
					<h2>Streaming Video</h2>
				</div>
				<div class="text">
				<p style="text-align:center">
				</p>
				<p style="font-size:0.9em">
Low Res . <a href="index.php" visited style="color:#0000EE">High Res</a> | <a href="../6/indexlow.php" visited style="color:#0000EE">6th Grade</a> . <a href="../7/indexlow.php" visited style="color:#0000EE">7th Grade</a> . <a href="../8/indexlow.php" visited style="color:#0000EE">8th Grade</a> . Connections</p></style>
				<h2 id="MSU">Connections Videos by DVD - Low Resolution</h2>	
					<p style="color:#217f00"><b>Multiplication Algorithm for Decimals DVD</b></p><ul>
                                        <li><a href="../viewmovie.php?url=<? echo encode("6_multd_dmult_21_l_all.flv"); ?>">Investigation 2.1 (30:12)</a>

                                                <form action="../viewmovie.php" method="GET">
                                                    <select style="font-size:12px;color:#006699;font-family:verdana;background-color:#ffffff;" name="url" onChange="this.form.submit()">
                                                        <option value=" ">Select Chapter or Support Document</option>
                                                        <option value=" ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHAPTERS</option>
                                                        <option value="<? echo encode("conn_conn_h_01.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_02.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_03.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_04.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_05.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_06.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_07.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_08.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_09.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_10.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_11.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_12.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_13.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_14.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_15.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_16.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_17.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_18.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_19.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_20.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_21.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_21.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_22.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_23.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_24.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_25.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_26.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_27.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_28.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_29.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_30.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_31.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_32.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_33.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_34.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_35.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_36.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_37.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_38.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_39.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_40.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_41.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_42.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_43.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_44.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_45.flv"); ?>">1) Connections Movie (6:13)</option>
                                                        <option value="<? echo encode("conn_conn_h_46.flv"); ?>">1) Connections Movie (6:13)</option>
                                                </select>
                                                </form></li></ul>
					</div>				
<?
	include '../foot.php';
}
?>
