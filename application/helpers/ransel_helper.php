<?php
function total_ransel($id_pelanggan)
{
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Ransel_m');

    // Call a function of the model
    $data = $CI->Ransel_m->total_ransel_by_pelanggan($id_pelanggan);
    return $data;
}
