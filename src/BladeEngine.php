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

use duncan3dc\Laravel\BladeInstance;

class BladeEngine implements ViewInterface
{
    public function render($template, $data, $config): string
    {
        $blade = new BladeInstance($config['view_path'], $config['cache_path']);
        return $blade->render($template, $data);
    }
}
