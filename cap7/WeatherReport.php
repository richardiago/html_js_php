<?php
  $date=$_POST["date"];
  $time=$_POST["time"];
  $T=$_POST["T"];
  $BP=$_POST["BP"];
  $octas=$_POST["octas"];
  $precip=$_POST["precip"];

  echo "You have reported:<br/>".
  "date: ".$date."<br/>".
  "time: ".$time."<br/>".
  "BP: ".$BP."<br/>".
  "octas: ".$octas."<br/>".
  "precip: ".$precip."<br/>".

  $out=fopen("WeatherReport.csv", "a");
  fprintf($out, "%s, %s, %.1f, %.2f, %u, %.2f\r\n", $date,$time,$T,$BP,$octas,$precip);
  fclose($out);

 ?>
