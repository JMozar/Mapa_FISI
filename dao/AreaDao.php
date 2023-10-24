<?php
//require_once "../util/ConexionBD.php";
//require '../bean/AreaBean.php';
class AreaDao
{

    public  function  ListarAreas()
    {

    }

    public function EliminarAreas($codigo)
   {
    }

    public  function  ModificarAreas()
    {

    }

    public  function  AgregarAreas()
    {

    }

    public  function  ListarPersonas()
    {
       try {
       $sql="select *   from   area where codigo_area='SA105'";
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