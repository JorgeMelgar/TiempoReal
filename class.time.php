<?php
class Time{
	public static function RealTime($Fecha = ""){
		$Intervalos = array("seg", "min", "hora", "día", "semana", "mes", "año");
		$Duraciones = array("60","60","24","7","4.35","12");
		$Indefinido = "Indefinido";
		$FHora = "H:i:s";
		$Formato = array("Y/m/d $FHora","Y-m-d $FHora","d/m/Y $FHora","d-m-Y $FHora");
		$CF = count($Formato);
		for ($i=0; $i < $CF; $i++){
			$Validar = DateTime::createFromFormat($Formato[$i], $Fecha);
			if ($Validar && $Validar->format($Formato[$i]) == $Fecha){
				$Hoy = time();
				$FechaUnix = strtotime($Fecha);
				if (empty($FechaUnix) || empty($Fecha)){
					return $Indefinido;
				}
				if ($FechaUnix == $Hoy){
					return "Hace unos momentos";
				}else{
					if ($Hoy > $FechaUnix){
						$Diferencia = $Hoy - $FechaUnix;
						$Tiempo = "Hace";
					}else{
						$Diferencia = $FechaUnix - $Hoy;
						$Tiempo = "Dentro de";
					}
					for ($i = 0; $Diferencia >= $Duraciones[$i] && $i < count($Duraciones)-1; $i++){
					  $Diferencia /= $Duraciones[$i];
					}
					$Diferencia = round($Diferencia);
					if($Diferencia != 1){
						$Intervalos[5] .= "e";
						$Intervalos[$i] .= "s";
					}
					if (($Intervalos[$i] == "meses") && $Diferencia > 11){
						$Diferencia = ceil($Diferencia / 12);
						if ($Diferencia == 1){
							return $Tiempo." ".$Diferencia." año";
						}else{
							return $Tiempo." ".$Diferencia." años";
						}
					}else{
						return $Tiempo." ".$Diferencia." ".$Intervalos[$i];
					}
				}
			}
		}
	}
}
?>
