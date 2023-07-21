<?php

/**
 * Classe utilitária responsável por gerenciar as views do projeto, deixando elas dinâmicas
*/

namespace app\utils;

class View
{

    /**
     * Método responsável por identificar a view escolhida, pegar o seu conteúdo
     * e então retornar ele
     * @param string $view - Nome da view sendo buscada
     * @return string - Conteúdo dessa view
     */
    private static function getContentView($view)
    {
        /**
         * Obtendo o camninho até a view e então concatenando com o seu nome
         * e a extensão do arquivo (.html)
         */
        $file = __DIR__.'/../../resources/view/pages/'.$view.'.html';

        /**
         * Antes de retornar é feita uma verificação se o arquivo existe
         * se foro caso, retornar o conteúdo dele, se não, uma string vazia
         */
        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Método responsável por retornar o conteúdo (renderizado) da view escolhida
     * passando variáveis e deixando as view dinâmcias
     * @param string $view - Nome da view que vai ser renderizada
     * @param array $vars - Array com as variáveis e seus valores que vão ser inseridos na view
     * @return string - conteúdo da view que vai ser mostrado
     */
    public static function render($view, $vars = [])
    {
        // Conteúdo da view
        $contentView = self::getContentView($view);
        
        // Descobrir o nome das variáveis dinâmicas (as chaves)
        $keys = array_keys($vars);
        // Mapenado as chaves e concatenando elas entre duas chaves
        $keys = array_map(function($item) {
            return '{{'.$item.'}}';
        }, $keys);

        /**
         * Retornando o conteúdo da view renderizado, trocando o texto
         * que for igual às chaves entre {{}} dentro da view pela valor
         * referente à essa chave no conteúdo da view
         */
        return str_replace($keys, array_values($vars), $contentView);
    }

}
