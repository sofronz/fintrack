<?php
namespace App\Enum;

enum TransactionType: string
{
    case Expense = 'EXPENSE';

    case Income = 'INCOME';
}
