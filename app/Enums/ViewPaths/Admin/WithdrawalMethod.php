<?php

namespace App\Enums\ViewPaths\Admin;

enum WithdrawalMethod
{
    const LIST = [
        URI => 'list',
        VIEW => 'admin-views.seller.withdraw-methods-list',
    ];

    const ADD = [
        URI => 'add',
        VIEW => 'admin-views.seller.withdraw-methods-create',
    ];

    const DELETE = [
        URI => 'delete',
        VIEW => '',
    ];

    const DEFAULT_STATUS = [
        URI => 'default-status-update',
        VIEW => '',
    ];

    const STATUS = [
       URI => 'status-update',
       VIEW => ''
    ];

    const UPDATE = [
        URI => 'update',
        VIEW => 'admin-views.seller.withdraw-methods-edit'
    ];
}
