<?php

	class masterPluginController extends appController {


		var $twitter_validation = "^(http|https):\/\/(www.|)twitter.com\/\w*(\/|)$";

		/* -------- Constructor ------ */

		public function __construct(){
			parent::__construct();
		}


		public function showBar(){

                $data = $this->data->getSettings();

                if($data[PLUGIN_NAME_VAR]['active']){
                        $this->set('data',$data);
                        $this->loadView('showbar',false);
                }
         }

        public function showBarCss(){
        	echo '<link rel="stylesheet" media="screen" type="text/css" href="'.STATIC_URL.'css/sbd-styles.css" />';
        }

        public function showBarJs(){
        	echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>';
        	echo '<script type="text/javascript" src="'.STATIC_URL.'js/sbd-functions.js"></script>';
        }

		public function validateSettings($data){

			$swvalidate = array('valid' => true, 'msg' => '');

			if(!empty($data)){	

				if(!empty($data[PLUGIN_NAME_VAR]['url_twitter'])){
					if (!preg_match('/'.$this->twitter_validation.'/', $data[PLUGIN_NAME_VAR]['url_twitter'])) {
						$swvalidate['valid'] = false;
	       				$swvalidate['msg']="Twitter url is not valid.";
					}
	       		}

				if($data[PLUGIN_NAME_VAR]['message']){

	       		}else{
	       			$swvalidate['valid'] = false;
	       			$swvalidate['msg']="Message on Bar can't be empty";
	       		}
	        }

        return $swvalidate;

		}

		public function saveSettings($data){

			$swv = $this->validateSettings($data);
			$good = $swv['msg'];

	        if($swv['valid']===true){
				$good = true;
	        	$this->data->updateSettings($data);
	    	}	
			return $good;
		}

		public function init(){

			$title_module = "Social Bar Lite Settings";
			$this->set('title_module',$title_module);
			$msgtype="danger";

			if($_POST){
				$data = $_POST['data'];
				if(!empty($data)){
					$saved = $this->saveSettings($data);
					if($saved === true){
						$msgtype="success";
						$msg = 'Settings Saved';
					}else{
						$msg = $saved;
					}
				}
				
			}else{
				$data = $this->data->getSettings();
			}

			$this->set('data',$data);

			$this->set('msgtype',$msgtype);
			$this->set('msg',$msg);

			$this->loadView('settings');

		}

	}

