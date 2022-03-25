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

use Swoole\Http\Response;

interface RenderInterface
{
    public function render(string $template, array $data = []): Response;

    public function getContents(string $template, array $data = []): string;

    public function getContentType(): string;
}
