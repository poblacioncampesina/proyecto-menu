<?php
    include_once '../model/ProgramaArea/ProgramaAreaModel.php';
    class ProgramaAreaController{


       

        public function getInsert()
    {

        $obj = new ProgramaAreaModel();
        $sql = "SELECT * FROM t_programa_area";
        $progarea = $obj->consult($sql);

        $sql = "SELECT * FROM t_lineatecnologica";
        $lineatecnologica = $obj->consult($sql);

        include_once  '../view/ProgramaArea/insert.php';
    }

    public function postInsert()
    {
        $obj = new ProgramaAreaModel();


        $lin_tec_cod= $_POST['lin_tec_cod'];
        $prog_area_desc=$_POST['prog_area_desc'];
        $id = $obj->autoincrement("t_programa_area", "prog_area_cod");

        $sql = "INSERT INTO t_programa_area VALUES($id, $lin_tec_cod,'$prog_area_desc')";
       
        $ejecutar = $obj->update($sql);

        if ($ejecutar) {
            $_SESSION['mensaje'] = "Se registró el programa area <b>$prog_area_desc</b> exitosamente";
            redirect(getUrl("ProgramaArea", "ProgramaArea", "consult"));
        } else {
            echo "Ops, ha ocurrido un error";
        }
    }


    public function consult()
    {
        $obj = new ProgramaAreaModel();

        $sql = "SELECT p.prog_area_cod, l.lin_tec_desc , p.prog_area_desc FROM t_programa_area p, t_lineatecnologica l WHERE l.lin_tec_cod = p.lin_tec_cod ";
        $progarea = $obj->consult($sql);

        include_once '../view/ProgramaArea/consult.php';
    }


    public function getDelete()
    {

        $obj = new ProgramaAreaModel();

        $prog_area_cod=$_GET['prog_area_cod'];

        $sql="SELECT * FROM t_programa_area WHERE prog_area_cod=$prog_area_cod";
        $progarea=$obj->consult($sql);

        include_once '../view/ProgramaArea/delete.php';
    }

    public function postDelete()
    {
        $obj=new ProgramaAreaModel();

        $prog_area_cod=$_POST['prog_area_cod'];
        $prog_area_desc=$_POST['prog_area_desc'];

        $sql="DELETE FROM t_programa_area WHERE prog_area_cod=$prog_area_cod";
        $ejecutar=$obj->update($sql);

        if ($ejecutar){
            $_SESSION['mensaje']="Se eliminó el área <b>$prog_area_desc</b> exitosamente";
            redirect(getUrl("ProgramaArea","ProgramaArea","consult"));
        } else {
            echo "Ops, ha ocurrido un error";
        }

    }

    public function getUpdate()
    {

        $obj = new ProgramaAreaModel();
        $prog_area_cod=$_GET['prog_area_cod'];

        $sql = "SELECT * FROM t_programa_area WHERE prog_area_cod=$prog_area_cod";
        $progarea = $obj->consult($sql);

        $sql = "SELECT * FROM t_lineatecnologica";
        $linea = $obj->consult($sql);

        include_once '../view/ProgramaArea/update.php';
    }

    public function postUpdate()
    {
        $obj = new ProgramaAreaModel();

        $prog_area_cod = $_POST['prog_area_cod'];
        $lin_tec_cod = $_POST['lin_tec_cod'];       
        $prog_area_desc=$_POST['prog_area_desc'];

        $sql = "UPDATE t_programa_area SET prog_area_cod=$prog_area_cod, lin_tec_cod=$lin_tec_cod, prog_area_desc=$prog_area_desc WHERE prog_area_cod=$prog_area_cod";
        
        $ejecutar = $obj->consult($sql);

        if ($ejecutar) {
            $_SESSION['mensaje']="Se editó el área <b>$prog_area_desc</b> exitosamente";
            redirect(getUrl("ProgramaArea", "ProgramaArea", "consult"));
        } else {
            echo "Ops, ha ocurrido un error inesperado";
            
        }
    }
    }   
?>








