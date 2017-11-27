<?php
//define username and password for db connection
$username = "root";
$password = "root";

try {
# MySQL with PDO_MYSQL
  $DBH = new PDO("mysql:host=localhost;dbname=laravel-api", $username, $password);
 
}
catch(PDOException $e) {
    echo $e->getMessage();
}


//create new instance of soap object and service
$wsdl = "http://footballpool.dataaccess.eu/data/info.wso?wsdl";
$service = new SoapClient($wsdl);




//use function Coach from services
$resultsCoaches = $service->Coaches(array('' => ''));
$CoachResultsArray = $resultsCoaches->CoachesResult->tCoaches;

//var_dump($resultsArray);
//insert all coaches in db
foreach($CoachResultsArray as $coach){    	

$name = $coach->sName;
$teamId = $coach->TeamInfo->iId;

$stmt = $DBH->prepare("INSERT INTO coaches (name, team_id) VALUES (:name, :team_id)");
    $stmt->bindParam(':name', $name);
	$stmt->bindParam(':team_id', $teamId);
	$stmt->execute();
	
}




//use function Teams from services
/*insert all teams in db*/
$resultsAllTeams = $service->Teams(array('' => ''));
$AllTeamsArray = $resultsAllTeams->TeamsResult->tTeamInfo;

//var_dump($AllTeamsArray);
foreach($AllTeamsArray as $team) {

$id = $team->iId;
$name = $team->sName;

$stmt = $DBH->prepare("INSERT INTO teams (id, name) VALUES (:id, :name)");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
	$stmt->execute();
	
}




//use function TeamsCompeteList from services
$teamCompete = $service->TeamsCompeteList(array('' => ''));
$teamCompeteArray = $teamCompete->TeamsCompeteListResult->tTeamCompete;

//var_dump($teamCompeteArray);

//insert all team compete in db
foreach($teamCompeteArray as $compete){    	

$iCompete = $compete->iCompeted;
$iWon = $compete->iWon;
$teamId = $compete->CoachInfo->TeamInfo->iId;
$flag = $compete->CoachInfo->TeamInfo->sCountryFlagLarge;


$stmt = $DBH->prepare("INSERT INTO team_competes (iCompeted, iWon, team_id, flag) VALUES (:iCompeted, :iWon, :team_id, :flag)");
    $stmt->bindParam(':iCompeted', $iCompete);
    $stmt->bindParam(':iWon', $iWon);
	$stmt->bindParam(':team_id', $teamId);
	$stmt->bindParam(':flag', $flag);
	$stmt->execute();
}





//use function AllPlayerNames from services
$resultsAllPlayers = $service->AllPlayerNames(array('bSelected' => ''));
$AllPlayersArray = $resultsAllPlayers->AllPlayerNamesResult->tPlayerNames;
//var_dump($AllPlayersArray);

/*insert all players in db*/
foreach($AllPlayersArray as $players) {

$id = $players->iId;
$playerName = $players->sName;
$countryName = $players->sCountryName;


$stmt = $DBH->prepare("INSERT INTO players (id, name, country_name) VALUES (:id, :name, :country_name)");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $playerName);
	$stmt->bindParam(':country_name', $countryName);
	$stmt->execute();
	
}


?>