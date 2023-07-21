<?php

/**
 * Classe responsável por lidar com requisições feitas na Home da aplicação
*/

namespace app\controller\pages;

use app\utils\View;
use \app\model\entity\Organization;

class Home extends Page
{

    /**
     * Método responsável por retornar o conteúdo (view) da home
     * @return string - conteúdo a ser impresso na tela
     */
    public static function getHome()
    {
        $objOrganization = new Organization;
        /**
         * Pegando o conteúdo da view Home
         */
        $contentView = View::render('home', [
            'name' => $objOrganization->name,
            'description' => $objOrganization->description,
            'site' => $objOrganization->site
        ]);

        /**
         * Retorna o conteúdo da view home dentro do layout da view page
         */
        return parent::getPage('PHP MVC Concepts - Demo', $contentView);

    }

}
