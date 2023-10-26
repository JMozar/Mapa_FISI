<?php
//require "../util/ConexionBD.php";
//require '../bean/AreaBean.php';

class AreaDao
{
    public  function  ListarAreas()
    {
      try {
         $sql = "select * from area";
         $objc = new ConexionBD();
         $cn = $objc->getConexionBD();
         $rs = mysqli_query($cn, $sql);
 
         $lista = array();
         while ($fila = mysqli_fetch_assoc($rs)) {
             $lista[] = $fila;
         }
         mysqli_close($cn);
     } catch (Exception $cn) {
         // Manejo de errores
     }
     return $lista;
    }

    public function EliminarAreas($codigo)
   {
    }

    public  function  ModificarAreas()
    {

    }

    public function AgregarAreas($objAreaBean)
    {
        // Obtiene los valores del objeto AreaBean
        $codArea = $objAreaBean->getCodArea();
        $nombArea = $objAreaBean->getNombArea();
        $tipoArea = $objAreaBean->getTipoArea();
        $pabellonArea = $objAreaBean->getPabellonArea();
        $piso = $objAreaBean->getPiso();
        $aforo = $objAreaBean->getAforo();
        $notas = $objAreaBean->getNotas();
        // Utiliza la instancia de ConexionBD que ya tienes
        $objc = new ConexionBD();
        $cn = $objc->getConexionBD();
        // Construye y ejecuta la consulta SQL para insertar el área en la base de datos
        $sql = "INSERT INTO area (codigo_area, nombre, tipo, pabellon, piso, aforo, notas) 
                VALUES ('$codArea', '$nombArea', '$tipoArea', '$pabellonArea', '$piso', '$aforo', '$notas')";
    
        // Ejecuta la consulta SQL
        $res = mysqli_query($cn, $sql);
        
        // Cierra la conexión
        mysqli_close($cn);
        // Devuelve el resultado de la ejecución (true o false, por ejemplo)
        return $res;
    }

    public  function  ListarPersonas()
    {
       try {
       $sql="select *   from   area where codigo_area = 'AR001'";
        $objc=new ConexionBD();
        $cn= $objc->getConexionBD();
       $rs= mysqli_query($cn,$sql);

       $lista=array();
       while($fila=mysqli_fetch_assoc($rs))
       {
          $lista[]=$fila;

       }
       mysqli_close($cn);
        
       } catch (Exception   $cn) {
        
       }
       return $lista;
    }

}

?>