<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    public const TITLE_FINANCIAL = 'financial';
    public const TITLE_ADMIN = 'admin';
    public const TITLE_OPERATOR = 'manager';
    public const TITLE_HR = 'hr';

    public const GUARD_API = 'api';
}
