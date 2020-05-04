<?php
    // return the errors in a standard format
    function view_errors($e){
      $s="";
      foreach($e as $key=>$value) {
        $s .= "<br/> $value";
      }
      return $s;
    }
?>
