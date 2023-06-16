<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller 
{

	public function index()

    {
        $this->load->view('template/home_header');
        $this->load->view('template/home_navbar');
        $this->load->view('home/index'); //artinya tolong ambilkan saya file bernama index di dalam folder vieew
        $this->load->view('template/home_footer');
    }

     public function about()

    {
       
        $this->load->view('template/home_header');
        $this->load->view('template/home_navbar');
        $this->load->view('home/about'); 
        $this->load->view('template/home_footer');
    }

    public function portfolio()

    {
       
        $this->load->view('template/home_header');
        $this->load->view('template/home_navbar');
        $this->load->view('home/portfolio'); 
        $this->load->view('template/home_footer');
    }

    public function team()

    {
       
        $this->load->view('template/home_header');
        $this->load->view('template/home_navbar');
        $this->load->view('home/team'); 
        $this->load->view('template/home_footer');
    }

    public function myAccount()

    {
       
        $this->load->view('template/home_header');
        $this->load->view('template/home_navbar');
        $this->load->view('home/myAccount'); 
        $this->load->view('template/home_footer');
    }

    public function signIn()

    {
       
        $this->load->view('template/home_header');
        $this->load->view('template/home_navbar');
        $this->load->view('home/signIn'); 
        $this->load->view('template/home_footer');
    }

    public function logIn()

    {
       
        $this->load->view('template/home_header');
        $this->load->view('template/home_navbar');
        $this->load->view('home/logIn'); 
        $this->load->view('template/home_footer');
    }

    public function contact()

    {
       
        $this->load->view('template/home_header');
        $this->load->view('template/home_navbar');
        $this->load->view('home/contact'); 
        $this->load->view('template/home_footer');
    }

}

