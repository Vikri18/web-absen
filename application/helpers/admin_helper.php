<?php

function loggin()
{
    $ci =get_instance();
   
    $role = $ci->session->userdata('role');
        
    if ($role !=1 ) {
        redirect('mahasiswa');
     }
     
    

}