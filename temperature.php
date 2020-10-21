<?php

$myfile = fopen("/sys/bus/w1/devices/28-000004f81ad0/w1_slave", "r") or die("Un$

$data = fread($myfile,filesize("/sys/bus/w1/devices/28-000004f81ad0/w1_slave"));

$temp = substr($data, strpos($data, "t=") + 2);

$temp = str_replace("\n",'',$temp);

$date = date("d-M-);



$thermal->date = $date;

$thermal->temp = $temp;



if(file_exists("/var/www/html/data.json")){

        $current_data = file_get_contents("/var/www/html/data.json");

        $array_data = json_decode($current_data,true);

        $extra = array(

                0 => $date,

                1 => $temp

        );

$array_data[] = $extra;
        $final_data = json_encode($array_data);
        file_put_contents("/var/www/html/data.json", $final_data);
}
?> 
