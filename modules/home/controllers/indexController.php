<?php
function construct()
{
   load('lib', 'validation');
   load_model('index');
}


function indexAction()
{
   $data['list_cat'] = show_cat();
   load_view('index', $data);
}
