<?php
    include_once '../model/Oferta/OfertaModel.php';
    class OfertaController{



        public function getOferta(){

            $obj = new OfertaModel();
            $sql = "SELECT o.id_oferta, o.desc_oferta, o.nom_oferta,o.fech_ini_oferta, o.cupos_oferta,o.fech_fin_oferta, o.imag_oferta, o.id_estado FROM t_oferta o WHERE o.id_estado=3"; 
            $ofertas = $obj->consult($sql);
            include_once '../View/Oferta/oferta.php';
        } 

       
        public function getPostOferta(){
            $obj=new ofertaModel;
            $id_oferta=$_GET['id_oferta'];
            

            $sql = "SELECT * FROM t_oferta WHERE id_oferta=$id_oferta";
            $ofertas=$obj->consult($sql);

            include_once '../view/Oferta/postOfertas.php';

        }

    }
?>
