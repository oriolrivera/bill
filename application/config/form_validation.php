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
            array('field' => 'pais','label' => 'País','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            
        ),

        
         /**
     * update profile admin
     */
    'updateProfile'
        => array
        (
            
            array('field' => 'name','label' => 'Nombre','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'lastname','label' => 'Apellido','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            array('field' => 'email','label' => 'E-Mail','rules' => 'required|is_string|trim|xss_clean|max_length[100]|valid_email'),
            array('field' => 'login','label' => 'Login','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            
           
        
        ),    


         /**
     * update profile admin
     */
    'updateProfilepass'
        => array
        (
            
            array('field' => 'name','label' => 'Nombre','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'lastname','label' => 'Apellido','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            array('field' => 'email','label' => 'E-Mail','rules' => 'required|is_string|trim|xss_clean|max_length[100]|valid_email'),
            array('field' => 'login','label' => 'Login','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            array('field' => 'passact','label' => 'Password actual','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            array('field' => 'pass','label' => 'Nuevo Password','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            array('field' => 'confirpass','label' => 'Confirmar Password','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            
           
        
        ),    

	
 

);
