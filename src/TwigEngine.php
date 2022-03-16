<?php

declare(strict_types=1);
/**
 * 深圳网通动力网络技术有限公司
 * * This file is part of szwtdl/view.
 * @link     https://www.szwtdl.cn
 * @document https://doc.szwtdl.cn
 * @license  https://github.com/wtdl-swoole/wtdl/blob/master/LICENSE
 */
namespace Szwtdl\View;

use Swoole\Exception;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class TwigEngine implements ViewInterface
{
    public function render($filename, $data, $config): string
    {
        $loader = new FilesystemLoader($config['view_path']);
        $twig = new Environment($loader, [
            'cache' => false,
            'debug' => true,
        ]);
        $asset = new \Twig\TwigFunction('asset', function (string $name) {
            return '/' . $name;
        });
        $twig->addFunction($asset);
        try {
            return $twig->render($filename, $data);
        } catch (LoaderError $e) {
            throw new Exception($e->getMessage());
        } catch (RuntimeError $e) {
            throw new Exception($e->getMessage());
        } catch (SyntaxError $e) {
            throw new Exception($e->getMessage());
        }
    }
}
