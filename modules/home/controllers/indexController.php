<?php
function construct()
{
   load('lib', 'validation');
   load_model('index');
}


function indexAction()
{
   $data['list_cat'] = show_cat();
   $data['list_product_new'] = get_product_news();
   load_view('index', $data);
}
