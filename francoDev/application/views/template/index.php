<?php
    $this->load->view('template/header');
    $this->load->view('template/nav');
    $this->load->view('template/aside');

    echo $contents;

    $this->load->view('template/footer');
?>
