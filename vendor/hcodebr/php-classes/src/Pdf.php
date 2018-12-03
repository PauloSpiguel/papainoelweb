<?php

namespace NewTech;

use Rain\Tpl;

/**
 * Envio de Email
 */
class Pdf
{

    private $pdf;

    public function __construct($data = array())
    {

        $config = array(
            "tpl_dir"   => $_SERVER["DOCUMENT_ROOT"] . "/views/pdf/",
            "cache_dir" => $_SERVER["DOCUMENT_ROOT"] . "/views-cache/",
            "debug"     => false,
        );

        Tpl::configure($config);

        $tpl = new Tpl;

        //Passar os dados para o Templete
        foreach ($data as $key => $value) {
            $tpl->assign($key, $value);
        }

        $html = $tpl->draw($tplName, true);

        //Create a new PHPMailer instance

    }
