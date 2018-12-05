<?php
namespace Force\DBDoc\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Force\DBDoc\Controller\DocumentorController;

class ForceDBDocExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $locator = new FileLocator(__DIR__ . '/../Resources/config');
        $loader = new YamlFileLoader($container, $locator);

        $loader->load('services.yaml');

        $definition = $container->getDefinition(DocumentorController::class);
        $definition->addMethodCall('setContent', [$config['return_content']]);
    }
}
