<?php
use PHPUnit\Framework\TestCase;

/**
 * Indentation tests.
 */
class IndentationTest extends TestCase {

	/**
	 * Test tabs indentation.
	 */
	public function testTabIndentation() {
		$phpcheckstyle = $GLOBALS['PHPCheckstyle'];

		$phpcheckstyle->processFiles(array(
			'./test/sample/bad_indentation.php'
		));

		$errorCounts = $phpcheckstyle->getErrorCounts();

		$this->assertEquals(0, $errorCounts['error'], 'We expect 0 errors');
		$this->assertEquals(0, $errorCounts['ignore'], 'We expect 0 ignored checks');
		$this->assertEquals(0, $errorCounts['info'], 'We expect 0 info');
		$this->assertEquals(6, $errorCounts['warning'], 'We expect 6 warnings');
	}

	/**
	 * Test tabs indentation.
	 */
	public function testSpaceIndentation() {
		$phpcheckstyle = $GLOBALS['PHPCheckstyle'];

		// Change the configuration to check for spaces instead of tabs
		$phpcheckstyle->getConfig()->setTestProperty('indentation', 'type', 'spaces');

		$phpcheckstyle->processFiles(array(
			'./test/sample/bad_indentation.php'
		));

		$errorCounts = $phpcheckstyle->getErrorCounts();

		$this->assertEquals(0, $errorCounts['error'], 'We expect 0 errors');
		$this->assertEquals(0, $errorCounts['ignore'], 'We expect 0 ignored checks');
		$this->assertEquals(0, $errorCounts['info'], 'We expect 0 info');
		$this->assertEquals(11, $errorCounts['warning'], 'We expect 11 warnings');
	}
}
?>