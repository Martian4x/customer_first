<?php
$conn=mysqli_connect("127.0.0.1","martian4_customer","XAynfDpm82y","martian4_customer");
if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

$data = file_get_contents('php://input');
$data = json_decode($data, true);
    $source_addr=$data['from'];
    $dest_addr=$data['to'];
    $channel=$data['channel'];
    $timestamp=$data['timeUTC'];
    $id=$data['transaction_id'];
    $message=$data['message'];
    $billing=$data['billing'];
$res= array('transaction_id' => $id, 'successful'=> true);
$json = json_encode($res);
echo $json;

if(isset($data))
{
    $date = date('Y-m-d H:i:s');
    $direction = 'Inbound';
    $billing = NULL;
    $sql = "INSERT INTO two_way_sms (from_address, to_address, channel, timeUTC, transaction_id, message, billing, direction, created_at, updated_at)
    VALUES ('".$data['from']."',
    '".$data['to']."',
    '".$data['channel']."',
    '".$data['timeUTC']."',
    '".$data['transaction_id']."',
    '".$data['message']['text']."',
    '".$billing."',
    '".$direction."',
    '".$date."',
    '".$date."'
    )";

    $result = mysqli_query($conn,$sql);
    file_put_contents('test_file.txt', $sql);
    // http://customer.martian4x.com/sms/callback
}
$ch = curl_init();
// set URL and other appropriate options
// curl_setopt($ch, CURLOPT_URL, "http://sellyou.local/sms_received");
curl_setopt($ch, CURLOPT_URL, "http://customer.martian4x.com/sms_received");
curl_setopt($ch, CURLOPT_HEADER, 0);
// grab URL and pass it to the browser
curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);

// $fh = fopen('new_file.txt', 'w') or die("Can't create file");
?>