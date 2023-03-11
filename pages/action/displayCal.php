<?php                
require '../auth/db_login.php'; 
$display_query = "SELECT * FROM joblist";             
$results = mysqli_query($db,$display_query);   
$count = mysqli_num_rows($results);  
if($count>0) 
{
	$data_arr=array();
    $i=1;
	while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{	
	$data_arr[$i]['id'] = $data_row['id'];
	$data_arr[$i]['title'] = $data_row['kategori'] . '
	' . strtoupper($data_row['PIC']);
	$data_arr[$i]['start'] = date("Y-m-d", strtotime($data_row['start_date']));
	$data_arr[$i]['end'] = date("Y-m-d", strtotime($data_row['end_date']));
	if($data_row['kategori'] == 'DINAS')
	{
		$data_arr[$i]['color'] = '#ffc107';
	} else if($data_row['kategori'] == 'TUGAS')
	{
		$data_arr[$i]['color'] = '#28a745';
	} else if($data_row['kategori'] == 'RAPAT')
	{
		$data_arr[$i]['color'] = '#dc3545';
	}
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