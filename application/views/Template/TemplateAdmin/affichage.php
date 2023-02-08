<?php
    $this->load->view("Template/TemplateAdmin/header");
    $data['namePerson']=$namePerson; 
    $this->load->view($contents,$data);
    $this->load->view("Template/footer");
?>