<?php                
require '../auth/db_login.php'; 
$display_query = "SELECT id,judul,start_date,end_date FROM joblist";             
$results = mysqli_query($db,$display_query);   
$count = mysqli_num_rows($results);  
if($count>0) 
{
	$data_arr=array();
    $i=1;
	while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{	
	$data_arr[$i]['id'] = $data_row['id'];
	$data_arr[$i]['title'] = $data_row['judul'];
	$data_arr[$i]['start'] = date("Y-m-d", strtotime($data_row['start_date']));
	$data_arr[$i]['end'] = date("Y-m-d", strtotime($data_row['end_date']));
	$data_arr[$i]['color'] = '#'.substr(uniqid(),-6);
	$i++;
	}
	
	$data = array(
                'status' => true,
                'msg' => 'successfully!',
				'data' => $data_arr
            );
}
else
{
	$data = array(
                'status' => false,
                'msg' => 'Error!'				
            );
}
echo json_encode($data);
?>