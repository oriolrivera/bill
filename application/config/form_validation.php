<?php
/**
 * Reglas de validacion para formularios
 */
$config = array(
           /**
     * login
     */
    'login'
        => array
        (
            
           
            array('field' => 'username','label' => 'Nombre de usuario','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
             array('field' => 'password','label' => 'Passoword','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
        ),  

        'addclient'
        => array
        (
            
           
            array('field' => 'name','label' => 'Nombre','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'razonsocial','label' => 'Razón social','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'email','label' => 'Email','rules' => 'required|is_string|trim|xss_clean|max_length[100]|valid_email'),
            
        ),

	
 

);
