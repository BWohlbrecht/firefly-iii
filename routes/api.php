<?php

/**
 * api.php
 * Copyright (c) 2020 james@firefly-iii.org
 *
 * This file is part of Firefly III (https://github.com/firefly-iii).
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);


use FireflyIII\Http\Middleware\IsAdmin;


Route::group(
    [
        'namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'about',
        'as'        => 'api.v1.about.'],
    static function () {

        // Accounts API routes:
        Route::get('', ['uses' => 'AboutController@about', 'as' => 'index']);
        Route::get('user', ['uses' => 'AboutController@user', 'as' => 'user']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'accounts',
     'as'        => 'api.v1.accounts.',],
    static function () {

        // Accounts API routes:
        Route::get('', ['uses' => 'AccountController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'AccountController@store', 'as' => 'store']);
        Route::get('{account}', ['uses' => 'AccountController@show', 'as' => 'show']);
        Route::put('{account}', ['uses' => 'AccountController@update', 'as' => 'update']);
        Route::delete('{account}', ['uses' => 'AccountController@delete', 'as' => 'delete']);

        Route::get('{account}/piggy_banks', ['uses' => 'AccountController@piggyBanks', 'as' => 'piggy_banks']);
        Route::get('{account}/transactions', ['uses' => 'AccountController@transactions', 'as' => 'transactions']);
        Route::get('{account}/attachments', ['uses' => 'AccountController@attachments', 'as' => 'attachments']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers\Autocomplete', 'prefix' => 'autocomplete',
     'as'        => 'api.v1.autocomplete.',],
    static function () {
        // Auto complete routes
        Route::get('accounts', ['uses' => 'AccountController@accounts', 'as' => 'accounts']);
        Route::get('bills', ['uses' => 'BillController@bills', 'as' => 'bills']);
        Route::get('budgets', ['uses' => 'BudgetController@budgets', 'as' => 'budgets']);
        Route::get('categories', ['uses' => 'CategoryController@categories', 'as' => 'categories']);
        Route::get('currencies', ['uses' => 'CurrencyController@currencies', 'as' => 'currencies']);
        Route::get('currencies-with-code', ['uses' => 'CurrencyController@currenciesWithCode', 'as' => 'currencies-with-code']);
        Route::get('object-groups', ['uses' => 'ObjectGroupController@objectGroups', 'as' => 'object-groups']);
        Route::get('piggy-banks', ['uses' => 'PiggyBankController@piggyBanks', 'as' => 'piggy-banks']);
        Route::get('piggy-banks-with-balance', ['uses' => 'PiggyBankController@piggyBanksWithBalance', 'as' => 'piggy-banks-with-balance']);
        Route::get('tags', ['uses' => 'TagController@tags', 'as' => 'tags']);
        Route::get('transactions', ['uses' => 'TransactionController@transactions', 'as' => 'transactions']);
        Route::get('transactions-with-id', ['uses' => 'TransactionController@transactionsWithID', 'as' => 'transactions-with-id']);
        Route::get('transaction-types', ['uses' => 'TransactionTypeController@transactionTypes', 'as' => 'transaction-types']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'groups',
     'as'        => 'api.v1.object-groups.',],
    static function () {

        // Accounts API routes:
        Route::get('', ['uses' => 'ObjectGroupController@index', 'as' => 'index']);
        Route::get('{objectGroup}', ['uses' => 'ObjectGroupController@show', 'as' => 'show']);
        Route::put('{objectGroup}', ['uses' => 'ObjectGroupController@update', 'as' => 'update']);
        Route::delete('{objectGroup}', ['uses' => 'ObjectGroupController@delete', 'as' => 'delete']);

        Route::get('{objectGroup}/piggy_banks', ['uses' => 'ObjectGroupController@piggyBanks', 'as' => 'piggy_banks']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'attachments',
     'as'        => 'api.v1.attachments.',],
    static function () {

        // Attachment API routes:
        Route::get('', ['uses' => 'AttachmentController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'AttachmentController@store', 'as' => 'store']);
        Route::get('{attachment}', ['uses' => 'AttachmentController@show', 'as' => 'show']);
        Route::get('{attachment}/download', ['uses' => 'AttachmentController@download', 'as' => 'download']);
        Route::post('{attachment}/upload', ['uses' => 'AttachmentController@upload', 'as' => 'upload']);
        Route::put('{attachment}', ['uses' => 'AttachmentController@update', 'as' => 'update']);
        Route::delete('{attachment}', ['uses' => 'AttachmentController@delete', 'as' => 'delete']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'available_budgets',
     'as'        => 'api.v1.available_budgets.',],
    static function () {

        // Available Budget API routes:
        Route::get('', ['uses' => 'AvailableBudgetController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'AvailableBudgetController@store', 'as' => 'store']);
        Route::get('{availableBudget}', ['uses' => 'AvailableBudgetController@show', 'as' => 'show']);
        Route::put('{availableBudget}', ['uses' => 'AvailableBudgetController@update', 'as' => 'update']);
        Route::delete('{availableBudget}', ['uses' => 'AvailableBudgetController@delete', 'as' => 'delete']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'bills',
     'as'        => 'api.v1.bills.',],
    static function () {

    // Bills API routes:
        Route::get('', ['uses' => 'BillController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'BillController@store', 'as' => 'store']);
        Route::get('{bill}', ['uses' => 'BillController@show', 'as' => 'show']);
        Route::put('{bill}', ['uses' => 'BillController@update', 'as' => 'update']);
        Route::delete('{bill}', ['uses' => 'BillController@delete', 'as' => 'delete']);

        Route::get('{bill}/attachments', ['uses' => 'BillController@attachments', 'as' => 'attachments']);
        Route::get('{bill}/rules', ['uses' => 'BillController@rules', 'as' => 'rules']);
        Route::get('{bill}/transactions', ['uses' => 'BillController@transactions', 'as' => 'transactions']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'budgets/limits',
     'as'        => 'api.v1.budget_limits.',],
    static function () {

        // Budget Limit API routes:
        Route::get('', ['uses' => 'BudgetLimitController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'BudgetLimitController@store', 'as' => 'store']);
        Route::get('{budgetLimit}', ['uses' => 'BudgetLimitController@show', 'as' => 'show']);
        Route::put('{budgetLimit}', ['uses' => 'BudgetLimitController@update', 'as' => 'update']);
        Route::delete('{budgetLimit}', ['uses' => 'BudgetLimitController@delete', 'as' => 'delete']);

        Route::get('{budgetLimit}/transactions', ['uses' => 'BudgetLimitController@transactions', 'as' => 'transactions']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'budgets',
     'as'        => 'api.v1.budgets.',],
    static function () {

        // Budget API routes:
        Route::get('', ['uses' => 'BudgetController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'BudgetController@store', 'as' => 'store']);
        Route::get('{budget}', ['uses' => 'BudgetController@show', 'as' => 'show']);
        Route::put('{budget}', ['uses' => 'BudgetController@update', 'as' => 'update']);
        Route::delete('{budget}', ['uses' => 'BudgetController@delete', 'as' => 'delete']);
        Route::post('{budget}/limits', ['uses' => 'BudgetLimitController@store', 'as' => 'store_budget_limit']);

        Route::get('{budget}/transactions', ['uses' => 'BudgetController@transactions', 'as' => 'transactions']);
        Route::get('{budget}/attachments', ['uses' => 'BudgetController@attachments', 'as' => 'attachments']);
        Route::get('{budget}/limits', ['uses' => 'BudgetController@budgetLimits', 'as' => 'budget_limits']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'categories',
     'as'        => 'api.v1.categories.',],
    static function () {

        // Category API routes:
        Route::get('', ['uses' => 'CategoryController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'CategoryController@store', 'as' => 'store']);
        Route::get('{category}', ['uses' => 'CategoryController@show', 'as' => 'show']);
        Route::put('{category}', ['uses' => 'CategoryController@update', 'as' => 'update']);
        Route::delete('{category}', ['uses' => 'CategoryController@delete', 'as' => 'delete']);

        Route::get('{category}/transactions', ['uses' => 'CategoryController@transactions', 'as' => 'transactions']);
        Route::get('{category}/attachments', ['uses' => 'CategoryController@attachments', 'as' => 'attachments']);
    }
);

/**
 * CHART ROUTES.
 */

// Accounts
Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers\Chart', 'prefix' => 'chart/account',
     'as'        => 'api.v1.chart.account.',],
    static function () {
        Route::get('overview', ['uses' => 'AccountController@overview', 'as' => 'overview']);
        Route::get('expense', ['uses' => 'AccountController@expenseOverview', 'as' => 'expense']);
        Route::get('revenue', ['uses' => 'AccountController@revenueOverview', 'as' => 'revenue']);
    }
);

// Available budgets
Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers\Chart', 'prefix' => 'chart/ab',
     'as'        => 'api.v1.chart.ab.',],
    static function () {

        // Overview API routes:
        Route::get('overview/{availableBudget}', ['uses' => 'AvailableBudgetController@overview', 'as' => 'overview']);
    }
);

// Budgets
Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers\Chart', 'prefix' => 'chart/budget',
     'as'        => 'api.v1.chart.budget.',],
    static function () {

        // (frontpage) budget overview
        Route::get('overview', ['uses' => 'BudgetController@overview', 'as' => 'overview']);
    }
);

// Categories
Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers\Chart', 'prefix' => 'chart/category',
     'as'        => 'api.v1.chart.category.',],
    static function () {

        // Overview API routes:
        Route::get('overview', ['uses' => 'CategoryController@overview', 'as' => 'overview']);
    }
);

// Configuration
Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'configuration',
     'as'        => 'api.v1.configuration.',],
    static function () {

        // Configuration API routes:
        Route::get('', ['uses' => 'ConfigurationController@index', 'as' => 'index']);
        Route::post('{configName}', ['uses' => 'ConfigurationController@update', 'as' => 'update']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'cer',
     'as'        => 'api.v1.cer.',],
    static function () {

        // Currency Exchange Rate API routes:
        Route::get('', ['uses' => 'CurrencyExchangeRateController@index', 'as' => 'index']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'link_types',
     'as'        => 'api.v1.link_types.',],
    static function () {

        // Link Type API routes:
        Route::get('', ['uses' => 'LinkTypeController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'LinkTypeController@store', 'as' => 'store']);
        Route::get('{linkType}', ['uses' => 'LinkTypeController@show', 'as' => 'show']);
        Route::put('{linkType}', ['uses' => 'LinkTypeController@update', 'as' => 'update']);
        Route::delete('{linkType}', ['uses' => 'LinkTypeController@delete', 'as' => 'delete']);
        Route::get('{linkType}/transactions', ['uses' => 'LinkTypeController@transactions', 'as' => 'transactions']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'transaction_links',
     'as'        => 'api.v1.transaction_links.',],
    static function () {

        // Transaction Links API routes:
        Route::get('', ['uses' => 'TransactionLinkController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'TransactionLinkController@store', 'as' => 'store']);
        Route::get('{journalLink}', ['uses' => 'TransactionLinkController@show', 'as' => 'show']);
        Route::put('{journalLink}', ['uses' => 'TransactionLinkController@update', 'as' => 'update']);
        Route::delete('{journalLink}', ['uses' => 'TransactionLinkController@delete', 'as' => 'delete']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'piggy_banks',
     'as'        => 'api.v1.piggy_banks.',],
    static function () {

        // Piggy Bank API routes:
        Route::get('', ['uses' => 'PiggyBankController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'PiggyBankController@store', 'as' => 'store']);
        Route::get('{piggyBank}', ['uses' => 'PiggyBankController@show', 'as' => 'show']);
        Route::put('{piggyBank}', ['uses' => 'PiggyBankController@update', 'as' => 'update']);
        Route::delete('{piggyBank}', ['uses' => 'PiggyBankController@delete', 'as' => 'delete']);

        Route::get('{piggyBank}/events', ['uses' => 'PiggyBankController@piggyBankEvents', 'as' => 'events']);
        Route::get('{piggyBank}/attachments', ['uses' => 'PiggyBankController@attachments', 'as' => 'attachments']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'preferences',
     'as'        => 'api.v1.preferences.',],
    static function () {

        // Preference API routes:
        Route::get('', ['uses' => 'PreferenceController@index', 'as' => 'index']);
        Route::get('date-ranges', ['uses' => 'Preferences\IndexController@dateRanges', 'as' => 'date-ranges']);
        Route::get('{preference}', ['uses' => 'PreferenceController@show', 'as' => 'show']);
        Route::put('{preference}', ['uses' => 'PreferenceController@update', 'as' => 'update']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'recurrences',
     'as'        => 'api.v1.recurrences.',],
    static function () {

        // Recurrence API routes:
        Route::get('', ['uses' => 'RecurrenceController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'RecurrenceController@store', 'as' => 'store']);
        Route::post('trigger', ['uses' => 'RecurrenceController@trigger', 'as' => 'trigger']);
        Route::get('{recurrence}', ['uses' => 'RecurrenceController@show', 'as' => 'show']);
        Route::put('{recurrence}', ['uses' => 'RecurrenceController@update', 'as' => 'update']);
        Route::delete('{recurrence}', ['uses' => 'RecurrenceController@delete', 'as' => 'delete']);
        Route::get('{recurrence}/transactions', ['uses' => 'RecurrenceController@transactions', 'as' => 'transactions']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'rules',
     'as'        => 'api.v1.rules.',],
    static function () {

        // Rules API routes:
        Route::get('', ['uses' => 'RuleController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'RuleController@store', 'as' => 'store']);
        Route::get('{rule}', ['uses' => 'RuleController@show', 'as' => 'show']);
        Route::put('{rule}', ['uses' => 'RuleController@update', 'as' => 'update']);
        Route::delete('{rule}', ['uses' => 'RuleController@delete', 'as' => 'delete']);
        Route::get('{rule}/test', ['uses' => 'RuleController@testRule', 'as' => 'test']);
        Route::post('{rule}/trigger', ['uses' => 'RuleController@triggerRule', 'as' => 'trigger']);
        Route::post('{rule}/up', ['uses' => 'RuleController@moveUp', 'as' => 'up']);
        Route::post('{rule}/down', ['uses' => 'RuleController@moveDown', 'as' => 'down']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'rule_groups',
     'as'        => 'api.v1.rule_groups.',],
    static function () {

        // Rules API routes:
        Route::get('', ['uses' => 'RuleGroupController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'RuleGroupController@store', 'as' => 'store']);
        Route::get('{ruleGroup}', ['uses' => 'RuleGroupController@show', 'as' => 'show']);
        Route::put('{ruleGroup}', ['uses' => 'RuleGroupController@update', 'as' => 'update']);
        Route::delete('{ruleGroup}', ['uses' => 'RuleGroupController@delete', 'as' => 'delete']);
        Route::get('{ruleGroup}/test', ['uses' => 'RuleGroupController@testGroup', 'as' => 'test']);
        Route::get('{ruleGroup}/rules', ['uses' => 'RuleGroupController@rules', 'as' => 'rules']);
        Route::post('{ruleGroup}/trigger', ['uses' => 'RuleGroupController@triggerGroup', 'as' => 'trigger']);

        Route::post('{ruleGroup}/up', ['uses' => 'RuleGroupController@moveUp', 'as' => 'up']);
        Route::post('{ruleGroup}/down', ['uses' => 'RuleGroupController@moveDown', 'as' => 'down']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers\Search', 'prefix' => 'search',
     'as'        => 'api.v1.search.',],
    static function () {

        // Attachment API routes:
        Route::get('transactions', ['uses' => 'TransactionController@search', 'as' => 'transactions']);
        Route::get('accounts', ['uses' => 'AccountController@search', 'as' => 'accounts']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers\Webhook', 'prefix' => 'webhooks',
     'as'        => 'api.v1.webhooks.',],
    static function () {

        // Webhook API routes:
        Route::get('', ['uses' => 'IndexController@index', 'as' => 'index']);

        // create new one.
        Route::post('', ['uses' => 'CreateController@store', 'as' => 'store']);

        // update
        Route::put('{webhook}', ['uses' => 'EditController@update', 'as' => 'update']);
        Route::delete('{webhook}', ['uses' => 'DeleteController@destroy', 'as' => 'destroy']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'summary',
     'as'        => 'api.v1.summary.',],
    static function () {

        // Overview API routes:
        Route::get('basic', ['uses' => 'SummaryController@basic', 'as' => 'basic']);
    }
);

// destroy data route.
Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'data',
     'as'        => 'api.v1.data.',],
    static function () {

        // Overview API routes:
        Route::delete('destroy', ['uses' => 'Data\DestroyController@destroy', 'as' => 'destroy']);
    }
);

// INSIGHT
Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers\Insight', 'prefix' => 'insight',
     'as'        => 'api.v1.insight.',],
    static function () {

        // Insight in expenses.
        // Insight in expenses by date.
        Route::get('expense/date/basic', ['uses' => 'Expense\DateController@basic', 'as' => 'expense.date.basic']);

        // Insight in income.
        // Insight in income by date.
        Route::get('income/date/basic', ['uses' => 'Income\DateController@basic', 'as' => 'income.date.basic']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'currencies',
     'as'        => 'api.v1.currencies.',],
    static function () {

        // Transaction currency API routes:
        Route::get('', ['uses' => 'CurrencyController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'CurrencyController@store', 'as' => 'store']);
        Route::get('default', ['uses' => 'CurrencyController@showDefault', 'as' => 'show.default']);
        Route::get('{currency_code}', ['uses' => 'CurrencyController@show', 'as' => 'show']);
        Route::put('{currency_code}', ['uses' => 'CurrencyController@update', 'as' => 'update']);
        Route::delete('{currency_code}', ['uses' => 'CurrencyController@delete', 'as' => 'delete']);

        Route::post('{currency_code}/enable', ['uses' => 'CurrencyController@enable', 'as' => 'enable']);
        Route::post('{currency_code}/disable', ['uses' => 'CurrencyController@disable', 'as' => 'disable']);
        Route::post('{currency_code}/default', ['uses' => 'CurrencyController@makeDefault', 'as' => 'default']);

        Route::get('{currency_code}/accounts', ['uses' => 'CurrencyController@accounts', 'as' => 'accounts']);
        Route::get('{currency_code}/available_budgets', ['uses' => 'CurrencyController@availableBudgets', 'as' => 'available_budgets']);
        Route::get('{currency_code}/bills', ['uses' => 'CurrencyController@bills', 'as' => 'bills']);
        Route::get('{currency_code}/budget_limits', ['uses' => 'CurrencyController@budgetLimits', 'as' => 'budget_limits']);
        Route::get('{currency_code}/cer', ['uses' => 'CurrencyController@cer', 'as' => 'cer']);
        Route::get('{currency_code}/recurrences', ['uses' => 'CurrencyController@recurrences', 'as' => 'recurrences']);
        Route::get('{currency_code}/rules', ['uses' => 'CurrencyController@rules', 'as' => 'rules']);
        Route::get('{currency_code}/transactions', ['uses' => 'CurrencyController@transactions', 'as' => 'transactions']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'tags',
     'as'        => 'api.v1.tags.',],
    static function () {
        // Tag API routes:
        Route::get('', ['uses' => 'TagController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'TagController@store', 'as' => 'store']);
        Route::get('{tagOrId}', ['uses' => 'TagController@show', 'as' => 'show']);
        Route::put('{tagOrId}', ['uses' => 'TagController@update', 'as' => 'update']);
        Route::delete('{tagOrId}', ['uses' => 'TagController@delete', 'as' => 'delete']);

        Route::get('{tagOrId}/transactions', ['uses' => 'TagController@transactions', 'as' => 'transactions']);
        Route::get('{tagOrId}/attachments', ['uses' => 'TagController@attachments', 'as' => 'attachments']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'tag-cloud',
     'as'        => 'api.v1.tag-cloud.',],
    static function () {
        // Tag cloud API routes (to prevent collisions)
        Route::get('', ['uses' => 'TagController@cloud', 'as' => 'cloud']);
    }
);

Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'transactions',
     'as'        => 'api.v1.transactions.',],
    static function () {

        // Transaction API routes:
        Route::get('', ['uses' => 'TransactionController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'TransactionController@store', 'as' => 'store']);
        Route::get('{transactionGroup}', ['uses' => 'TransactionController@show', 'as' => 'show']);
        Route::get('{transactionGroup}/attachments', ['uses' => 'TransactionController@attachments', 'as' => 'attachments']);
        Route::get('{transactionGroup}/piggy_bank_events', ['uses' => 'TransactionController@piggyBankEvents', 'as' => 'piggy_bank_events']);
        Route::get('{tj}/transaction_links', ['uses' => 'TransactionController@transactionLinks', 'as' => 'transaction_links']);
        Route::put('{transactionGroup}', ['uses' => 'TransactionController@update', 'as' => 'update']);
        Route::delete('{transactionGroup}/{tj}', ['uses' => 'TransactionController@deleteJournal', 'as' => 'delete-journal']);
        Route::delete('{transactionGroup}', ['uses' => 'TransactionController@delete', 'as' => 'delete']);
    }
);

// special group for transaction journals
Route::group(
    ['namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'transaction-journals',
     'as'        => 'api.v1.journals.',],
    static function () {

        // Transaction API routes:
        Route::get('{tj}', ['uses' => 'TransactionController@showByJournal', 'as' => 'showByJournal']);
    }
);

Route::group(
    ['middleware' => ['auth:api', 'bindings', IsAdmin::class], 'namespace' => 'FireflyIII\Api\V1\Controllers', 'prefix' => 'users',
     'as'         => 'api.v1.users.',],
    static function () {

        // Users API routes:
        Route::get('', ['uses' => 'UserController@index', 'as' => 'index']);
        Route::post('', ['uses' => 'UserController@store', 'as' => 'store']);
        Route::get('{user}', ['uses' => 'UserController@show', 'as' => 'show']);
        Route::put('{user}', ['uses' => 'UserController@update', 'as' => 'update']);
        Route::delete('{user}', ['uses' => 'UserController@delete', 'as' => 'delete']);
    }
);
