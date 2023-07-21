<?php

/**
 * Classe responsável por lidar com requisições feitas no layout page da aplicação
*/

namespace app\controller\pages;

use app\utils\View;

class Page
{

    /**
     * Método responsável por renderizar o topo da página
     * @return string - Conteúdo renderizado da view header
     */
    private static function getHeader()
    {
        return View::render('header');
    }

    /**
     * Método responsável por retornar o conteúdo (view) da página genérica (layout)
     * @param string $content - Conteúdo que será inserido no layout
     * @param string $title - Título da página
     * @return string - conteúdo a ser impresso na tela
     */
    public static function getPage($title, $content)
    {
        /**
         * Retornadno o conteúdo rederizado da view page
         */
        return View::render('page', [
            'title' => $title,
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter()
        ]);
    }

    /**
     * Método responsável por renderizar o footer da página
     * @return string - Conteúdo renderizado da view footer
     */
    private static function getFooter()
    {
        return View::render('footer');
    }

}
