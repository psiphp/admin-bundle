<?php

namespace Psi\Bundle\Admin\Example\app;

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Psi\Bundle\Admin\PsiAdminBundle(),
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \Psi\Bundle\Grid\PsiGridBundle(),
            new \Psi\Bundle\ContentType\PsiContentTypeBundle(),
            new \Psi\Bundle\ObjectAgent\PsiObjectAgentBundle(),
            new \Psi\Bundle\ObjectRender\PsiObjectRenderBundle(),
            new \Psi\Bundle\Description\PsiDescriptionBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle
        ];

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config.yml');
    }
}
