<?php

namespace App\Publishers;

use CodeIgniter\Publisher\Publisher;

class AssetsPublisher extends Publisher
{
    /**
     * Define o caminho de origem padrão. Pode ser sobrescrito nos métodos de publicação.
     *
     * @var string
     */
    protected $source = ROOTPATH;

    /**
     * Define o caminho de destino padrão. Pode ser sobrescrito nos métodos de publicação.
     *
     * @var string
     */
    protected $destination = FCPATH . 'assets';

    public function publish(): bool
    {
        // Publicar Bootstrap
        $bootstrapSource = ROOTPATH . 'vendor/twbs/bootstrap' . DIRECTORY_SEPARATOR;
        $bootstrapDestination = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR;

        // Use uma instância separada do Publisher para publicar do caminho do vendor para o destino desejado
        $bootstrapPublisher = new \CodeIgniter\Publisher\Publisher($bootstrapSource, $bootstrapDestination);
        $bootstrapPublisher->addPath('dist')->merge(true); // Copia a pasta 'dist' do Bootstrap

        // Publicar jQuery
        $jquerySource = ROOTPATH . 'vendor/components/jquery' . DIRECTORY_SEPARATOR;
        $jqueryDestination = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'jquery' . DIRECTORY_SEPARATOR;

        $jqueryPublisher = new \CodeIgniter\Publisher\Publisher($jquerySource, $jqueryDestination);
        // O pacote components/jquery não possui pasta 'dist', portanto publicamos a raiz
        $jqueryPublisher->addPath('')->merge(true); // Copia os arquivos da raiz do pacote jQuery

        return true;
    }
}
