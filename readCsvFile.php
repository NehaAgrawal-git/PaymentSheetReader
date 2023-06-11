<!DOCTYPE html>
<html>

<body>
<center>
<h1>DISPLAY DATA PRESENT IN CSV</h1>
<h3>Student data</h3>

<?php

function readCsvFile($fileName) {
  $file = fopen($fileName, "r");
  $rowCount = 0;
  // Fetching data from csv file row by row
while (($data = fgetcsv($file)) !== false) {
      if ($rowCount != 0) {
        // HTML tag for placing in row format
echo "<tr>";
      $columnCount = 0;
      $cp = 0;
      $sp = 0;
      $ta = 0;
      $charges = 0;
      $orderNumber = "";
foreach ($data as $i) {
        switch($columnCount) {
          case 0 :
          $orderNumber = htmlspecialchars($i);
          break;
          case 1:
          $sp = (int)htmlspecialchars($i);
          break;
          case 2:
          $cp = (int)htmlspecialchars($i);
          break;
          case 3:
          $ta = htmlspecialchars($i);
          break;
          case 4:
          $charges = $charges+ (int)htmlspecialchars($i);
          break;
          case 5:
          $charges = $charges+ (int)htmlspecialchars($i);
          break;
          case 6:
          $charges = $charges + (int)htmlspecialchars($i);
          break;
          default:
          break;
        }
        $columnCount = $columnCount + 1;
}
        $profitPercent = ($sp-$cp)/$cp*100;
        echo "<td>" . htmlspecialchars($orderNumber)
. "</td>";
        echo "<td>" . htmlspecialchars($profitPercent)
. "</td>";
        echo "<td>" . htmlspecialchars($ta)
. "</td>";
        echo "<td>" . htmlspecialchars($charges)
. "</td>";
echo "</tr> \n";
      }
      $rowCount = $rowCount + 1;
}

// Closing the file
fclose($file);
}

echo "<html><body><center><table>\n\n";

      // Add the header here
echo "<tr>";
echo "<td>" . "Order Number"
. "</td>";
echo "<td>" . "Profit/loss(%)"
. "</td>";
echo "<td>" . "Transferred Amount"
. "</td>";
echo "<td>" . "Total Marketplace Charges"
. "</td>";
echo "</tr> \n";

    readCsvFile("PaymentSheet.csv");
    readCsvFile("PaymentSheet2.csv");

echo "\n</table></center></body></html>";
?>
</center>
</body>

</html>
