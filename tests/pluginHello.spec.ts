import { test, expect } from '@playwright/test';

test.describe('two tests', () => {
	test('has title', async ({ page }) => {
		await page.goto('http://localhost/test/');

		// Expect a title "test" a substring.
		await expect(page).toHaveTitle(/test/);
	});

	test('two', async ({ page }) => {
		await page.goto('http://localhost/test/');

		// Expect a text "Привет".
		await expect(page.locator('.text')).toHaveText('Привет');
	});
});
