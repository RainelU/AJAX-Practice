<?php

	include_once 'conexion.php';

	$sql = "SELECT * FROM gym";
	$result = $mysqli -> query($sql);

	if ($result -> num_rows > 0) {
		$i = 0;

		$listagym = array();
		while ($row = $result->fetch_assoc()) {
			$listagym[$i] = $row;
			$sql_e = "SELECT * FROM entrenadores WHERE id_gym =" . $row['id'];
			$result_e = $mysqli -> query($sql_e);

			if ($result_e -> num_rows > 0) {
				$j = 0;
				while ($row_e = $result_e->fetch_assoc()) {
					$listagym[$i]["entrenadores"][$j]["nombre"] = $row_e["nombre"];
					$listagym[$i]["entrenadores"][$j]["apellido"] = $row_e["apellido"];
					$listagym[$i]["entrenadores"][$j]["fuerte"] = $row_e["fuerte"];

					$listaent[$i] = $row_e;
					$sql_p = "SELECT * FROM pokemon WHERE id_entrenador=" . $row_e['id'];
					$result_p = $mysqli -> query($sql_p);

					if ($result_p -> num_rows > 0) {
						while ($row_p = $result_p->fetch_assoc()) {
							$listagym[$i]["entrenadores"][$j]["equipo"][] = $row_p;
						}
					}else{
						$listagym[$i]["entrenadores"][$j]["equipo"] = "No tiene";
					}
					$j++;
				}
			}
			$i++;
		}
	}

	echo json_encode($listagym);