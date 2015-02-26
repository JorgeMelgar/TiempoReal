# Fecha con el formato "Hace X tiempo" con PHP
La clase tiene el método `RealTime($Fecha)` y recibe como parámetro la fecha a convertir los resultados pueden ser:

- Si es un tiempo que ya pasó.
  + Hace 3 `seg(s)` / `min(s)` / `hora(s)` / `día(s)` / `semana(s)` / `mes(es)` / `años`
- Si la fecha es mayor a la actual.
  + Dentro 3 `seg(s)` / `min(s)` / `hora(s)` / `día(s)` / `semana(s)` / `mes(es)` / `años`
- De no ingresar un formato válido devuelve: un `Campo vacío`

**Forma de uso:**
- Recuerda definir la zona horaria, reemplazar el asterisco (\*) por la de tu respectiva zona.
    ```
    date_default_timezone_set("America/*"); // En mi caso América.
    ```
- Para ver las zonas soportadas ve a http://php.net/manual/es/timezones.php.
- Formatos de fecha: `"Y/m/d H:i:s"`, `"Y-m-d H:i:s"`, `"d/m/Y H:i:s"` o `"d-m-Y H:i:s"`.
- Llamar al método:
	`Time::RealTime("2015-02-25 13:32:40");`
	
**Ejemplos:**
```
<?php
  require_once("class.time.php");
  echo Time::RealTime("2015-02-25 13:32:40"); // Válido.
  echo Time::RealTime("22-02-2015 13:32:40"); // Válido.
  echo Time::RealTime("2015/02/25 13:32:40"); // Válido.
  echo Time::RealTime("22/02/2015 13:32:40"); // Válido.

  echo Time::RealTime("2015.02.29 13:32"); // Inválido.
  echo Time::RealTime("2015.02.25 25:32"); // Inválido.
  echo Time::RealTime("29-02-2015"); // Inválido.
  echo Time::RealTime("29.02.2015 13:32:40"); // Inválido.
?>
```
