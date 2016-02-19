<?php
date_default_timezone_set('America/Guayaquil');
try {
			$db = new PDO('mysql:host=181.196.138.4;dbname=aheevaccs', 'aheeva_crm', 'aheeva_crm');
			$sql = "INSERT INTO rsmovil(CEDULA_RUC,PHONE_NUMBER,CIUDAD_RESIDENCIA,NOMBRES,AGENT_ID,DIAL_SCHED_TIME,RECORD_TYPE,extraData,CAMPAIGN_name )
VALUES(:CEDULA_RUC,:PHONE_NUMBER,:CIUDAD_RESIDENCIA,:NOMBRES,:AGENT_ID,:DIAL_SCHED_TIME,:RECORD_TYPE,:extraData,:CAMPAIGN_name)";

			try {    
			
			$query = $db->prepare( $sql );
			$hoy = date("Y-m-d H:i:s");

			$query->execute( array( ':CEDULA_RUC'=>$_POST["cedula"], ':PHONE_NUMBER'=>$_POST["telefono"], ':CIUDAD_RESIDENCIA'=>$_POST["ciudad"], ':NOMBRES'=>$_POST["solicitante"], ':AGENT_ID'=>'2001', ':DIAL_SCHED_TIME'=>$hoy, ':RECORD_TYPE'=>'Personal CallBack', ':extraData'=>'default:http://192.168.215.220/TmkCNTV_Movil/TmkCNTV_Movil.php?LISTA=rsmovil', ':CAMPAIGN_name'=>'TMKCNT'));
			

			 } catch(PDOException $e) {
  				echo $e->getMessage();
			}

			
			var_dump($query);

		}
		catch (PDOException $ex) {
			echo $ex->getMessage();
			exit;
		}
/*
$sql = "INSERT INTO cnt_tickets ( id_ticket, creado, cedula, solicitante, telefono, via, prioridad, descripcion) VALUES ( :id_ticket, :creado, :cedula, :solicitante, :telefono, :via, :prioridad, :descripcion )";

$query = $db->prepare( $sql );
$query->execute( array( ':id_ticket'=>$_POST["id"], ':creado'=>$_POST["creado"], ':cedula'=>$_POST["cedula"], ':solicitante'=>$_POST["solicitante"], ':telefono'=>$_POST["telefono"], ':via'=>$_POST["via"], ':prioridad'=>$_POST["prioridad"], ':descripcion'=>$_POST["descripcion"]) );
var_dump($query);


$sql = "INSERT INTO CallingList (CEDULA,PHONE_NUMBER)VALUES(:CEDULA,:PHONE_NUMBER)";
$query = $db->prepare( $sql );
$query->execute( array( ':CEDULA'=>$_POST["cedula"], ':PHONE_NUMBER'=>$_POST["telefono"]);
var_dump($query);*/

/*INSERT INTO base13ene(Suscnitc,PHONE_NUMBER, agent_id,DIAL_SCHED_TIME,record_type,extraData,CAMPAIGN_name )
VALUES(1713319281,'0991777920',1003,'2016-02-15 19:45:00','Personal CallBack','default:http://192.168.215.220/TmkCNTV2/TmkCNTV2.php?LISTA=Base13Ene&ANI=$ANI','TMKCNT') */

?>