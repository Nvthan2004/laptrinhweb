--TEST--
The right events are emitted in the right order for the template methods of a test class that is run in process isolation
--FILE--
<?php declare(strict_types=1);
$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = '--debug';
$_SERVER['argv'][] = '--process-isolation';
$_SERVER['argv'][] = __DIR__ . '/_files/TemplateMethodsTest.php';

require __DIR__ . '/../../bootstrap.php';

(new PHPUnit\TextUI\Application)->run($_SERVER['argv']);
--EXPECTF--
PHPUnit Started (PHPUnit %s using %s)
Test Runner Configured
Test Suite Loaded (2 tests)
Event Facade Sealed
Test Runner Started
Test Suite Sorted
Test Runner Execution Started (2 tests)
Test Suite Started (PHPUnit\TestFixture\Event\TemplateMethodsTest, 2 tests)
Before First Test Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::setUpBeforeClass)
Before First Test Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::setUpBeforeClass
Test Preparation Started (PHPUnit\TestFixture\Event\TemplateMethodsTest::testOne)
Before First Test Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::setUpBeforeClass)
Before First Test Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::setUpBeforeClass
Before Test Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::setUp)
Before Test Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::setUp
Pre Condition Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::assertPreConditions)
Pre Condition Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::assertPreConditions
Test Prepared (PHPUnit\TestFixture\Event\TemplateMethodsTest::testOne)
Assertion Succeeded (Constraint: is true, Value: true)
Post Condition Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::assertPostConditions)
Post Condition Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::assertPostConditions
Test Passed (PHPUnit\TestFixture\Event\TemplateMethodsTest::testOne)
After Test Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::tearDown)
After Test Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::tearDown
After Last Test Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::tearDownAfterClass)
After Last Test Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::tearDownAfterClass
Test Finished (PHPUnit\TestFixture\Event\TemplateMethodsTest::testOne)
Test Preparation Started (PHPUnit\TestFixture\Event\TemplateMethodsTest::testTwo)
Before First Test Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::setUpBeforeClass)
Before First Test Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::setUpBeforeClass
Before Test Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::setUp)
Before Test Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::setUp
Pre Condition Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::assertPreConditions)
Pre Condition Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::assertPreConditions
Test Prepared (PHPUnit\TestFixture\Event\TemplateMethodsTest::testTwo)
Assertion Succeeded (Constraint: is true, Value: true)
Post Condition Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::assertPostConditions)
Post Condition Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::assertPostConditions
Test Passed (PHPUnit\TestFixture\Event\TemplateMethodsTest::testTwo)
After Test Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::tearDown)
After Test Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::tearDown
After Last Test Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::tearDownAfterClass)
After Last Test Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::tearDownAfterClass
Test Finished (PHPUnit\TestFixture\Event\TemplateMethodsTest::testTwo)
After Last Test Method Called (PHPUnit\TestFixture\Event\TemplateMethodsTest::tearDownAfterClass)
After Last Test Method Finished:
- PHPUnit\TestFixture\Event\TemplateMethodsTest::tearDownAfterClass
Test Suite Finished (PHPUnit\TestFixture\Event\TemplateMethodsTest, 2 tests)
Test Runner Execution Finished
Test Runner Finished
PHPUnit Finished (Shell Exit Code: 0)
