<?php
namespace Jdunn\ObjectOriented;

require_once("../Classes/Author.php");

$jdunn = new Author("910f2599-125f-441c-ab23-40438b9ff118", "bootcampcoders.cnm.edu", "abcd123df789", "jdunn33@cnm.ed", '$argon2i$v=19$m=1024,t=384,p=2$dE55dm5kRm9DTEYxNFlFUA$nNEMItrDUtwnDhZ41nwVm7ncBLrJzjh5mGIjj8RlzVA'
, "jdunn33");


var_dump($jdunn);
