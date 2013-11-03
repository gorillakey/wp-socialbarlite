<?php

	class dataPlugin extends appModel {

		/* -------- Constructor ------ */

		public function __construct(){
			parent::__construct();
		}


		function updateSettings($conf) {
			update_option(PLUGIN_NAME_VAR."_config", $conf);
		}

		function getSettings() {
			$conf = get_option(PLUGIN_NAME_VAR."_config");
			return $conf;
		}

	}

