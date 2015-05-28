<?php 

namespace App\Fonction;

class Stat{

	private $_bdd;
	private $_nbmail;
	private $_ip;
	private $_page;
	private $_time;
	private $_dateConnect;
	private $_maxConnectDay;

	public function __construct($bdd){

		$this->_bdd = $bdd;
	}

	public function setStat($nbmail,$url){

		$this->_nbmail = $nbmail;
		$this->_ip = $_SERVER['REMOTE_ADDR'];
		$this->_page = $url;
		$this->_time = time();
		$this->_dateConnect = date('Y-m-d');

		$select = $this->_bdd->prepare('SELECT id FROM statistique WHERE dateConnect=:dateConnect');
		$select->execute(array('dateConnect'=>$this->_dateConnect));

		$maxConnectDay = $select->rowCount();

		if($maxConnectDay < 1){
			$this->_maxConnectDay = 1;
		}else{
			$this->_maxConnectDay = $maxConnectDay+1;
		}

		$select = $this->_bdd->prepare('SELECT * FROM statistique WHERE ip=:ip');
		$select->execute(array('ip'=>$this->_ip));

		$result = $select->fetch();

		if(empty($result['ip'])){
			$insert = $this->_bdd->prepare('INSERT INTO statistique (nbmail,ip,page,time,maxConnectDay,dateConnect) VALUES(:nbmail,:ip,:page,:time,:maxConnectDay,NOW())');
			$insert->execute(array('nbmail'=>$this->_nbmail,
							'ip'=>$this->_ip,
							'page'=>$this->_page,
							'time'=>$this->_time,
							'maxConnectDay'=>$this->_maxConnectDay));

			


		}elseif($result['ip'] == $this->_ip){

			if($result['dateConnect'] != date('Y-m-d')){
					$insert = $this->_bdd->prepare('INSERT INTO statistique (nbmail,ip,page,time,maxConnectDay,dateConnect) VALUES(:nbmail,:ip,:page,:time,:maxConnectDay,:dateConnect)');
					$insert->execute(array('nbmail'=>$this->_nbmail,
							'ip'=>$this->_ip,
							'page'=>$this->_page,
							'time'=>$this->_time,
							'maxConnectDay'=>$this->_maxConnectDay,
							'dateConnect'=>$this->_dateConnect));
					
				}
		}elseif ($result['page'] != $this->_page) {
			$insert = $this->_bdd->prepare('INSERT INTO statistique (nbmail,ip,page,time,maxConnectDay,dateConnect) VALUES(:nbmail,:ip,:page,:time,:maxConnectDay,:dateConnect)');
					$insert->execute(array('nbmail'=>$this->_nbmail,
							'ip'=>$this->_ip,
							'page'=>$this->_page,
							'time'=>$this->_time,
							'maxConnectDay'=>$this->_maxConnectDay,
							'dateConnect'=>$this->_dateConnect));
					
		}

		
	}

	public function countEmail(){
		$select = $this->_bdd->prepare('SELECT nbmail FROM statistique ORDER BY id DESC LIMIT 1');
		$select->execute(array());

		$result = $select->fetch();
		return $result['nbmail'];
	}

	public function visiteDay(){

		$this->_dateConnect = date('Y-m-d');

		$select = $this->_bdd->prepare('SELECT id FROM statistique WHERE dateConnect=:dateConnect');
		$select->execute(array('dateConnect'=>$this->_dateConnect));

		$nbVisiteurDay = $select->rowCount();
		return $nbVisiteurDay;
	}

	public function moyenneDayVisite(){

		$now = time();
		$lastmonth = time() - (24*3600*30.5);

		$select = $this->_bdd->prepare('SELECT * FROM statistique');
		$select->execute(array());

		$nbUserMonth=0;
		foreach ($select as $value) {
			if($value['time']< $now && $value['time'] >$lastmonth){
				$nbUserMonth++;
			}
		}

		$moyenne = ($nbUserMonth/30.5);

		return round($moyenne);
	}

	public function visiteMonth(){

		$now = time();
		$lastmonth = time() - (24*3600*30.5);

		$select = $this->_bdd->prepare('SELECT * FROM statistique');
		$select->execute(array());

		$nbUserMonth=0;
		foreach ($select as $value) {
			if($value['time']< $now && $value['time'] >$lastmonth){
				$nbUserMonth++;
			}
		}

		return $nbUserMonth;
	}

	public function visiteMax(){

		$select = $this->_bdd->prepare('SELECT id FROM statistique');
		$select->execute(array());

		$nb = $select->rowCount();
		return $nb;
	}

	public function visiteMaxDay(){

		$select = $this->_bdd->prepare('SELECT maxConnectDay FROM statistique ORDER BY maxConnectDay DESC LIMIT 1');
		$select->execute(array());

		$result = $select->fetch();

		return $result['maxConnectDay'];
	}

	public function bestPage(){


		$mathieupaczesny = 0;
		$admin = 0;
		$select = $this->_bdd->prepare('SELECT * FROM statistique');
		$select->execute(array());

		foreach ($select as  $value) {
			if($value['page'] == 'mathieupaczesny.com'){

				$mathieupaczesny++;
			}elseif($value['page'] == 'mathieupaczesny.com/vue/admin'){
				$admin++;
			}
		}

		if($mathieupaczesny>$admin){
			return 'Accueil';
		}else{
			return 'Admin';
		}
	}
}

 ?>