<?php
namespace Force\DBDoc\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();

        $root = $builder->root('force_db_doc');
        $root->children()
                ->scalarNode('return_content')
                    ->isRequired()
                ->end()
            ->end();
    }
}

