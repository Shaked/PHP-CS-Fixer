<?php

/*
 * This file is part of the PHP CS utility.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Symfony\CS\Fixer;

use Symfony\CS\FixerInterface;

/**
 * @author Shaked Klein Orbach <s@shakedos.com>
 */
class UseSortFixer implements FixerInterface
{
    public function fix(\SplFileInfo $file, $content)
    {
        if (preg_match_all("/use .*/", $content, $matches)) {
            $useKeyword = implode("\n", $matches[0]);
            sort($matches[0]);
            $sortedUseKeyword = implode("\n", $matches[0]);

            $content = str_replace($useKeyword, $sortedUseKeyword, $content);
        }

        return $content;
    }

    public function getLevel()
    {
        // defined in PSR-2 2.2
        return FixerInterface::ALL_LEVEL;
    }

    public function getPriority()
    {
        return 0;
    }

    public function supports(\SplFileInfo $file)
    {
        return true;
    }

    public function getName()
    {
        return 'use_sort';
    }

    public function getDescription()
    {
        return 'Sort `use` keyword.';
    }
}
