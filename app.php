<?php require_once('Connections/watch.php'); ?>
<?php require_once('Connections/watch.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_watch, $watch);
$query_Recordset1 = "SELECT * FROM item";
$Recordset1 = mysql_query($query_Recordset1, $watch) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$maxRows_Recordset2 = 6;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

mysql_select_db($database_watch, $watch);
$query_Recordset2 = "SELECT * FROM `g-shock`";
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $watch) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = mysql_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;

mysql_select_db($database_watch, $watch);
$query_gshockde = "SELECT * FROM `g-shock description`";
$gshockde = mysql_query($query_gshockde, $watch) or die(mysql_error());
$row_gshockde = mysql_fetch_assoc($gshockde);
$totalRows_gshockde = mysql_num_rows($gshockde);

mysql_select_db($database_watch, $watch);
$query_hot = "SELECT * FROM hot";
$hot = mysql_query($query_hot, $watch) or die(mysql_error());
$row_hot = mysql_fetch_assoc($hot);
$totalRows_hot = mysql_num_rows($hot);

mysql_select_db($database_watch, $watch);
$query_Recordset3 = "SELECT * FROM `g-shock`";
$Recordset3 = mysql_query($query_Recordset3, $watch) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <link href="https://s3.amazonaws.com/codiqa-cdn/codiqa.ext.css" rel="stylesheet">
  <link href="https://s3.amazonaws.com/codiqa-cdn/mobile/1.4.2/jquery.mobile-1.4.2.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="https://s3.amazonaws.com/codiqa-cdn/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
  <script src="https://s3.amazonaws.com/codiqa-cdn/codiqa.ext.js"></script>

  <script src="script.js"></script>

</head>
<body>

<div data-role="page" data-control-title="index" id="page1">
    <div style="background-color:white;" data-role="header">
        <span class="ui-title">
        </span>
        <div style=" text-align:center" data-controltype="image">
            <img style="width: 130px; height: 25px" src="https://xun0728.github.io/web/Casio_logo_2.png">
        </div>
        <div  data-theme="a"class="ui-field-contain" data-controltype="searchinput">
            <input name="" id="searchinput1" placeholder="" value="" type="search">
        </div>
        <div class="ui-grid-a">
            <div class="ui-block-a">
                <a href="#page1" style="display:block; margin:auto;font-family:Microsoft Jhenghei;"data-theme="a" class="ui-btn ui-btn-b">
                  商品首頁
                </a>
            </div>
            <div class="ui-block-b">
                <a href="hot.php"style="display:block; margin:auto; font-family:Microsoft Jhenghei;data-theme="a"; class="ui-btn ui-btn-b">
                    熱門商品
                </a>
            </div>
        </div>
    </div>
    <div role="main" class="ui-content">
        <div style="" data-controltype="image">
          <div is="grid" class="ui-grid-a" style="height:120px">
            <div is="block" class="ui-block-a" style="height:100%"> <a href="#page3"><img is="dragable" src="https://peiiyuu.github.io/CASIO-A/1506664757976.png" style="width:90px;display:block; margin:auto;">
              <h5 is="gk-text" style="text-align:center; margin-top:-5px;font-family:Microsoft Jhenghei;color:black;">手錶</h5></a>
            </div>
            <div is="block" class="ui-block-b" style="height:100%"> <a href="calculator choose.php"><img is="dragable" src="https://peiiyuu.github.io/CASIO-A/1491560787877.png" style="width:90px;display:block; margin:auto;">
              <h5 is="gk-text" style="text-align:center; margin-top:-5px;font-family:Microsoft Jhenghei;color:black;">計算機</h5></a>
            </div>
          </div>
          <div is="grid" class="ui-grid-a" style="height:120px">
           <div is="block" class="ui-block-a" style="height:100%"><a href="labeling.php"> <img is="dragable" src="https://peiiyuu.github.io/CASIO-A/1491560846481.png" style="width:90px;display:block; margin:auto;">
             <h5 is="gk-text" style="text-align:center; margin-top:-5px;font-family:Microsoft Jhenghei;color:black;">標籤機 / 圖章機</h5></a>
           </div>
           <div is="block" class="ui-block-b" style="height:100%"><a href="paino choose.php"><img is="dragable" src="https://peiiyuu.github.io/CASIO-A/1491560744477.png" style="width:90px; margin-left:3px;display:block; margin:auto;">
             <h5 is="gk-text" style="text-align:center; margin-top:-5px;font-family:Microsoft Jhenghei;color:black;">電子樂器</h5></a>
           </div>
         </div>
         <div is="grid" class="ui-grid-a" style="height:120px">
           <div is="block" class="ui-block-a" style="height:100%"><a href="projector.php"> <img is="dragable" src="https://peiiyuu.github.io/CASIO-A/1491560863929.png" style="width:90px; margin-left:3px;display:block; margin:auto;">
             <h5 is="gk-text" style="text-align:center; margin-top:-5px;font-family:Microsoft Jhenghei;color:black;">投影機</h5></a>
           </div>
           <div is="block" class="ui-block-b" style="height:100%"><a href="POS.php"> <img is="dragable" src="https://peiiyuu.github.io/CASIO-A/1491560839386.png" style="width:90px; margin-left:3px;display:block; margin:auto;">
             <h5 is="gk-text" style="text-align:center; margin-top:-5px;font-family:Microsoft Jhenghei;color:black;">電子收銀系統</h5></a>
           </div>
         </div>
      </div>
      <div is="footer" data-position="fixed" data-role="footer">
    <div is="navbar" data-role="navbar" style="margin:0 0 -5px;">
      <ul>
        <li is="navbtn">
          <a href="latest news.php"style="font-family:Microsoft Jhenghei;" data-icon="star" data-theme="b" data-transition="none">最新消息</a>
        </li>
        <li is="navbtn">
          <a href="Company Introduction.php" style="font-family:Microsoft Jhenghei;" data-icon="info" data-theme="b"data-transition="none">企業簡介</a>
        </li>
        <li is="navbtn">
          <a href="server.php"style="font-family:Microsoft Jhenghei;" data-icon="mail" data-theme="b" data-transition="none">客服服務</a>
        </li>
      </ul>
    </div>
      </div>
    </div>
</div>
<p>&nbsp;</p>
<div data-role="page" data-control-title="index" id="page2">
  <div role="main" class="ui-content">
    <div is="footer" data-position="fixed" data-role="footer">    </div>
  </div>
</div>
<div data-role="page" data-control-title="index" id="page3">
    <div style="background-color:white;" data-role="header">
       <a is="button" class="ui-btn ui-btn-left ui-corner-all ui-btn-b" href="#page1">BACK</a>
        <span class="ui-title">
        </span>
        <div style=" text-align:center" data-controltype="image">
            <img style="width: 130px; height: 25px" src="https://xun0728.github.io/web/Casio_logo_2.png">
        </div>
        <div  data-theme="a"class="ui-field-contain" data-controltype="searchinput">
            <input name="" id="searchinput1" placeholder="" value="" type="search">
        </div>
        <div class="ui-grid-a">
            <div class="ui-block-a">
                <a href="#page1" style="display:block; margin:auto;font-family:Microsoft Jhenghei;"data-theme="a" class="ui-btn ui-btn-b">
                  商品首頁
                </a>
            </div>
            <div class="ui-block-b">
                <a href="hot.php"style="display:block; margin:auto; font-family:Microsoft Jhenghei;data-theme="a"; class="ui-btn ui-btn-b">
                    熱門商品
                </a>
            </div>
        </div>
    </div>
    <div role="main" class="ui-content">
        <div style="" data-controltype="image">
          <div is="content" role="main" class="ui-content"style="height:400px">
    <h2 is="gk-text" style="font-family:Microsoft Jhenghei;"><font color="#000080">鐘錶系列</font></h2>
    <ul is="listview" data-role="listview" data-inset="true">
      <li is="list-divider" data-divider-theme="b" data-role="list-divider"><?php echo $row_Recordset1['name']; ?></li>
      <li is="listview-li"> <a href="g-.php" data-transition> <img src="pic watch item/<?php echo $row_Recordset1['images']; ?>" class><?php echo $row_Recordset1['EN description']; ?> <br>
        <font face="微軟正黑體"><br><?php echo $row_Recordset1['CH description']; ?></font></a></li>
    </ul>
    <ul is="listview" data-role="listview" data-inset="true">
      <li is="list-divider" data-divider-theme="b" data-role="list-divider">BABY-G</li>
      <li is="listview-li"> <a href="Baby G.php" data-transition><img src="pic watch item/BABY-G.jpg" width="405" height="405"><font face="微軟正黑體">Tough &amp; Cool<br><br>充滿個性與帥氣的流行配件</font>
      </a></li>
    </ul>
    <ul is="listview" data-role="listview" data-inset="true">
      <li is="list-divider" data-divider-theme="b" data-role="list-divider">SHEEN</li>
      
      <li is="listview-li"> <a href="SHEEN.php" data-transition><img src="pic watch item/Sheen.jpg" width="405" height="405"><font face="微軟正黑體">Elegant, Smart, Shining<br>
        <br>優雅、智慧與耀眼的金屬指針女性腕錶</font>
      </a></li>
    </ul>
          </div>

      </div>
      <div is="footer" data-position="fixed" data-role="footer">
    <div is="navbar" data-role="navbar" style="margin:0 0 -5px;">
      <ul>
        <li is="navbtn">
          <a href="latest news.php"style="font-family:Microsoft Jhenghei;" data-icon="star" data-theme="b" data-transition="none">最新消息</a>
        </li>
        <li is="navbtn">
          <a href="Company Introduction.php" style="font-family:Microsoft Jhenghei;" data-icon="info" data-theme="b"data-transition="none">企業簡介</a>
        </li>
        <li is="navbtn">
          <a href="server.php"style="font-family:Microsoft Jhenghei;" data-icon="mail" data-theme="b" data-transition="none">客服服務</a>
        </li>
      </ul>
    </div>
      </div>
    </div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($gshockde);

mysql_free_result($hot);

mysql_free_result($Recordset3);
?>
