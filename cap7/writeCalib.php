<html>
  <head>
      <title>Get calibrations for water vapor instrument</title>
    </head>

    <body>
      <?php
          $SN=$_POST["SN"];
          $len=strlen($SN);

          $inFile = "WVdata.dat";
          $outFile = "WVreport.csv";
          $in = fopen($inFile, "r") or exit("Can't open file.");
          $out = fopen($outFile, "a");

          $line = fgets($in);
          $found=1;

          while((!feof($in)) && ($found == 1)){
              $line=fgets($in);
              $values=sscanf($line, "%s %f %f %f %f %f");
              list($SN_dat,$A,$B,$C,$beta,$tau) = $values;
              if (strncasecmp($SN_dat,$SN,$len)==0)
                $found=0;
          }
          fclose($in);
          if ($found == 1)
          echo "Couldn't find this instrument.";
          else {

                echo "<p><table border='2'><tr><th>Quantity</th><th>Value</th></tr>";
                echo "</td></tr>";
                echo "<tr><td>Instrument ID</td><td>$SN</td></tr>";
                echo "<tr bgcolor='silver'>
                <td colspan='2'>Calibration Constants</td></tr>";
                echo "<tr><td>A</td><td>$A</td></tr>";
                echo "<tr><td>B</td><td>$B</td></tr>";
                echo "<tr><td>C</td><td>$C</td></tr>";
                echo "<tr><td>&tau;</td><td>$tau</td></tr>";
                echo "<tr><td>&beta;</td><td>$beta</td></tr>";
                echo "</table>";

          }

          fprintf($out,"Data have been reported for: %s,%f,%f,%f,%f,%f\n",$SN,$A,$B,$C,$tau,$beta);
          fclose($out);

            ?>
      </body>
    </html>
