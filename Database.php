<?php
	class Database{
		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $dbname = DB_NAME;
		public $link;
		public $error;

		public function __construct(){
			$this->connectDB();
		}

		private function connectDB(){
			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			if (!$this->link) {
				$this->error = "Connection Failed".$this->link->connect_error;
				return false;
			}
		}

		//Select or Read Data
		public function select($query){
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($result->num_rows > 0) {
				return $result;
			}else{
				return false;
			}
		}
		//Insert Data
		public function insert($query){
			$inserted_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($inserted_row) {
				header('Location: index.php?msg='.urlencode('Data Inserted Successfully.'));
				exit();
			}else{
				die("Error : (".$this->link->errno.")".$this->link->error);
			}
		}
		//Update data
		public function update($query){
			$updated_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($updated_row) {
				header("Location: index.php?msg=".urlencode("Data Updated Successfully!!!"));
				exit();
			}else{
				die("Error : (".$this->link->errno.")".$this->link->error);
			}
		}
		//Delete data
		public function delete($query){
			$deleted_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($deleted_row) {
				header("Location: index.php?msg=".urlencode("Data Deleted Successfully!!!"));
				exit();
			}else{
				die("Error : (".$this->link->errno.")".$this->link->error);
			}
		}
	}

?>