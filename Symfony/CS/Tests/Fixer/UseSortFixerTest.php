<?php

/*
 * This file is part of the Symfony CS utility.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Symfony\CS\Tests\Fixer;

use Symfony\CS\Fixer\UseSortFixer;

class UseSortFixerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideUseExamples
     */
    public function testOneLineFix($expected, $input)
    {
        $fixer = new UseSortFixer();
        $file = new \SplFileInfo(__FILE__);
        $actual = $fixer->fix($file, $input);
        $this->assertEquals($expected, $actual);
    }

    public function provideUseExamples()
    {
        return array(
            array("use a;\nuse b;\nuse c;","use b;\nuse c;\nuse a;"),
        );
    }
}
