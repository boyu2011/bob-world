<?php

function db_connect() 
{
   $result = new mysqli('localhost', 'root', 'JustForFun', 'bob_world');
   
   if (!$result) 
   {
     throw new Exception('Could not connect to database server');
   } 
   else 
   {
     return $result;
   }
}