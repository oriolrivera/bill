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

	
 

);
