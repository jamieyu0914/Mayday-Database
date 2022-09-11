<div style="text-align:center"><div class="incenter">
  <h1 id="myH1"><a href="Untitled-503.php"><img src="images/maydayintroduce05.jpg"></a><br><font face="微軟正黑體">結果顯示</font>
</div></font>


<?php
$x=$_POST["condiction"];
$field=$_POST["field"];

$link=mysql_connect('localhost','105jsa10','105jsa10');
mysql_selectdb("105jsa10",$link) or die ("資料庫連結錯誤");

mysql_query('SET NAMES utf8');
mysql_query('SET CHARACTER_SET_CLIENT=utf8');
mysql_query('SET CHARACTER_SET_RESULTS=utf8');

if($x!=null){
  if ($field=="name"){
  $sql="select * from Mayday where name like '%$x%'";
  }
  else if ($field=="year"){
  $sql="select * from Mayday where year like '%$x%'";
  }
  else if ($field=="album"){
  $sql="select * from Mayday where album like '%$x%'";
  }
  }else{
  $sql="select * from Mayday";
  }
  
  $result=mysql_query($sql) or die (mysql_error());
  $row=mysql_fetch_row($result);
  if ($row!=null && $field!=null){
  echo '<table border="1" align="center" >';
  echo'<tr style="color:#2E64FE">
            <th width="5%">歌曲名稱</th>
            <th width="5%">發行年份</th>
            <th width="5%">專輯標題</th>
            
         </tr>';
   }
   while ($row!=NULL && $field!=null){
   list($name,$year,$album)=$row;
   echo"<tr style='color:#000000'>";
   echo"<td>$name</td>";
   echo"<td>$year</td>";
   echo"<td>$album</td>";
   echo"</tr>";
   $row=mysql_fetch_row($result);
   };
   echo '</table>';
   
   ?>      