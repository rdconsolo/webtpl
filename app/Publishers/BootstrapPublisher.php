<?php

namespace App\Publishers;

use CodeIgniter\Publisher\Publisher;

class BootstrapPublisher extends Publisher
{
    /**
     * Define o caminho de origem dos assets do Bootstrap.
     * Normalmente, é o diretório `vendor/twbs/bootstrap`.
     *
     * @var string
     */
    protected $source = ROOTPATH . 'vendor/twbs/bootstrap';

    /**
     * Define o caminho de destino dos assets do Bootstrap.
     * Normalmente, é o diretório `public/assets/bootstrap`.
     *
     * @var string
     */
    protected $destination = FCPATH . 'assets/bootstrap';

    public function publish(): bool
    {
        return $this
            ->addPath('dist') // Copia todo o conteúdo da pasta 'dist' do Bootstrap
            ->merge(true); // Mescla os arquivos, sobrescrevendo se existirem
    }
}
