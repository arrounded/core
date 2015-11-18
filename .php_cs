<?php
use Symfony\CS\Config\Config;
use Symfony\CS\Finder\DefaultFinder;

$finder = DefaultFinder::create()->in(['src', 'tests']);
$header = <<< EOF
This file is part of Arrounded

(c) Madewithlove <heroes@madewithlove.be>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

return Config::create()
             ->setRiskyAllowed(true)
             ->setRules([
                 '@Symfony'                          => true,
                 'header_comment'                    => ['header' => $header],
                 'ereg_to_preg'                      => true,
                 'function_typehint_space'           => true,
                 'multiline_spaces_before_semicolon' => true,
                 'ordered_use'                       => true,
                 'php4_constructor'                  => true,
                 'php_unit_construct'                => true,
                 'php_unit_strict'                   => false,
                 'phpdoc_order'                      => true,
                 'phpdoc_types'                      => true,
                 'psr0'                              => true,
                 'short_array_syntax'                => true,
                 'short_echo_tag'                    => true,
                 'strict'                            => true,
                 'strict_param'                      => true,
             ])
             ->setUsingCache(true)
             ->finder($finder);
