<?php
function construct()
{
   load('lib', 'validation');
   
}


function indexAction()
{
   load_model('index');
   load_view('index');
}
