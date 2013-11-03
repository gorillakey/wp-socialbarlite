<?php

	class appController{

		public $data;

		public $vars;

		/* -------- Constructor ------ */

		public function __construct(){
			$this->data = new dataPlugin();
		}


		public function set($namevar, $valuevar){
			$this->vars[$namevar] = $valuevar;
		}

		public function loadView($view,$admin=true){
			
			foreach ($this->vars as $namevar => $valuevar) {
				$$namevar = $valuevar;
			}

			if($admin){
			echo '<div class="wrap">';
			echo '<link rel="stylesheet" media="screen" type="text/css" href="'.STATIC_URL.'css/colorpicker.css" />';
			echo '<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css">';
			echo '<link rel="stylesheet" media="screen" type="text/css" href="'.STATIC_URL.'css/styles.css" />';
			

			include_once(ROOT_VIEWS.$view.'.php');

			echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>';
			echo '<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>';
			echo '<script type="text/javascript" src="'.STATIC_URL.'js/colorpicker.js"></script>';
			echo '<script type="text/javascript" src="'.STATIC_URL.'js/functions.js"></script>';
			echo '</div>';

			}else{
				include_once(ROOT_VIEWS.$view.'.php');
			}

		}

	}