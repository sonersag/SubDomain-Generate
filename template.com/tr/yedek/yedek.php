<?
  
  if ($_SESSION["login"]!="true")
	{
		echo '<script>window.location="login.php";</script>';
		exit;
	}
  
  $dbhost        = $server;  // Server address of your MySQL Server 
  $dbuser        = $dbuser;  // Username to access MySQL database 
  $dbpass        = $dbpass;  // Password to access MySQL database 
  $dbname     	 = $dbadi;      // Database Name 
  $use_gzip      = 'yes';        // Set to No if you don't want the files sent in .gz format 
  $remove_file   = 'no';        // Set this to yes if you want to remove the file after sending. Yes is recommended. 
  $use_email     = 'no';          // Set to 'yes' if you want the backup to be sent throug email. Fill out next 3 lines. 
  $send_to       = 'xxx@xxxx.xxx';   // E-mail to send the mail to 
  $send_from     = 'DB_BAckp'; // E-mail the mail comes from 
  $subject       = "MySQL Database ($dbname) Backup - " . date("j F Y"); // Subject in the email to be sent. 
  $use_ftp       = 'no'; // Do you want this database backup uploaded to an ftp server? Fill out the next 4 lines 
  $ftp_server    = '';   // FTP hostname 
  $ftp_user_name = '';   // FTP username 
  $ftp_user_pass = '';   // FTP password 
  $ftp_path      = "/";  // This is the path to upload on your ftp server! 
  $echo_status = 'yes';   // Set to 'no' if the script should work silently (no output will be sent to the screen) 


 $path = make_dir(); 
  $result=mysql_query("show tables from ".$dbname); 
  mysql_query("SET NAMES UTF8");
 echo mysql_error();
  while (list($table) = mysql_fetch_row($result)) { 
    $newfile .= get_def($table); 
    $newfile .= "\n\n"; 
    $newfile .= get_content($table); 
    $newfile .= "\n\n"; 
    $i++; 
  } 

    $file_name = DATE("d.m.Y-H.i").".sql";

    $file_path = $path . $file_name; 
  if ($use_gzip == "yes") { 
    $file_name .= ".gz"; 
    $file_path .= ".gz"; 
    $zp = gzopen($file_path, "wb9"); 
    gzwrite($zp,$newfile); 
    gzclose($zp); 
  } else { 
    $fp = fopen($file_path, "w"); 
    fwrite($fp, $newfile); 
    fclose($fp); 
  } 


	function make_dir() { 
		$path = 'yedek/SQLYedek/';
		$dizin=@opendir($path);
		if (!$dizin) { 
			mkdir('external',0777);
			mkdir('yedek/SQLYedek',0777);
		}
		return $path; 
	} 

  function get_def($table) { 
$def = "

"; 
$def .= "################################
";


$def .= "CREATE TABLE $table (
"; 
    $result = mysql_query("SHOW FIELDS FROM $table") or die("Table $table not existing in database"); 
	mysql_query("SET NAMES UTF8");
    while($row = mysql_fetch_array($result)) { 
      $def .= "    $row[Field] $row[Type]"; 

      if ($row["Default"] != "") $def .= " DEFAULT '$row[Default]'"; 

      if ($row["Null"] != "YES") $def .= " NOT NULL"; 

      if ($row[Extra] != "") $def .= " $row[Extra]"; 

$def .= ",
";  } 

$def = ereg_replace(",
$","",$def); 

    $result = mysql_query("SHOW KEYS FROM $table");
	mysql_query("SET NAMES UTF8");	
    while($row = mysql_fetch_array($result)) { 
      $kname=$row[Key_name]; 
      if(($kname != "PRIMARY") && ($row[Non_unique] == 0)) $kname="UNIQUE|$kname"; 
      if(!isset($index[$kname])) $index[$kname] = array(); 
      $index[$kname][] = $row[Column_name]; 
    } 
    while(list($x, $columns) = @each($index)) { 
      $def .= ",
"; 
      if($x == "PRIMARY") $def .= "   PRIMARY KEY (" . implode($columns, ", ") . ")"; 
      else if (substr($x,0,6) == "UNIQUE") $def .= "   UNIQUE ".substr($x,7)." (" . implode($columns, ", ") . ")"; 
      else $def .= "   KEY $x (".implode($columns,", ").")"; 
    } 

    $def .= ");

"; 

    return (stripslashes($def)); 
  } 
  function get_content($table) { 
    $content=""; 
    $result = mysql_query("SELECT * FROM $table"); 
	mysql_query("SET NAMES UTF8");
    while($row = mysql_fetch_row($result)) { 
      $insert = "INSERT INTO $table VALUES ("; 
      for($j=0; $j<mysql_num_fields($result);$j++) { 
        if(!isset($row[$j])) $insert .= "NULL,"; 
        else if($row[$j] != "") $insert .= "\"".addslashes($row[$j])."\","; 
        else $insert .= "'',"; 
      } 
      $insert = ereg_replace(",$","",$insert); 
$insert .= ");
"; 
      $content .= $insert; 
    } 
    return $content; 
  } 
	
	echo '<div class="sonucu sonucu_ok">Veritabanı Başarı İle Yedeklendi! ( admin/yedek/SQLYedek/ Klasöründen İndirebilirsiniz )</div>';

?>
