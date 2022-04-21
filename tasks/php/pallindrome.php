<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pallindrome</title>
</head>
<body>
    <?php
$rev="";
$input="MADAM"; 
$len=strlen($input);
      // $temp=strrev($input);
      for ($i=($len-1); $i>=0 ; $i--)
       {
        //    $rev = $rev + $input[$i] ;
        // $rev = $rev . $input[$i];
          $rev.=$input[$i];
      }
           if($input===$rev)  
      {
          echo "$input is pallindrome";
      }
      else
      {
          echo "$input is not pallindrome";
      }

// echo " <br> input value= $input ";
    ?>
</body>
</html>