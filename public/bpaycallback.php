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
    $sql = "INSERT INTO two_way_sms (from_address, to_address, channel, timeUTC, transaction_id, message)
    VALUES ('".$data['from']."',
    '".$data['to']."',
    '".$data['channel']."',
    '".$data['timeUTC']."',
    '".$data['transaction_id']."',
    '".$data['message']['text']."'
    )";

    $result = mysqli_query($conn,$sql);
    file_put_contents('test_file.txt', $sql);
}

// $fh = fopen('new_file.txt', 'w') or die("Can't create file");
?>