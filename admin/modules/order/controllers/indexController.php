<?php
function construct()
{
    load('lib', 'validation');
    load_model('index');
}

function indexAction()
{
    $data['list_order'] = show_order();
    load_view('index', $data);
}

function detailOrderAction()
{
    $order_id = (int)($_GET['order_id']);
    $data['list_detail_order'] = show_detail_order($order_id);
    global $total_order; 
    $total_order = count_order($data['list_detail_order'][0]['customer_id']);
    load_view('detailOrder', $data);
}
