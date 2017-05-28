<?php include("config.php");


date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");
$day = date("l");

			
						$q="select * from listings where active='Yes' and confirmation='Yes' order by id asc limit 1";
						
				

  $q1=mysql_query($q);

  $q2=mysql_num_rows($q1);

  if($q2 > 0)

  {

  $count = 0;

  while($q3=mysql_fetch_array($q1))

  {

  $count = $count+1;

  $id = base64_encode($q3['id']);

if($day=='Tuesday')
{
$sundayfrom=$q3['tuesdayfrom'];
$sundayto=$q3['tuesdayto'];
if($sundayfrom == 'Close' || $sundayto == 'Close')
{
$servicebooktime = 'Close';
}

else
{
function get_minutes ( $start, $end ) {  

   while ( strtotime($start) <= strtotime($end) ) {  
       $minutes[] = date("H:i:s", strtotime( "$start" ) );  
       $start = date("H:i:s", strtotime( "$start + 15 mins")) ;      
   }  
   return $minutes;  
}  

$minutes = get_minutes($sundayfrom, $sundayto);  
foreach($minutes as $minute) {  
    echo $minute .'<br />';  
    } 

}

}

}
}
?>