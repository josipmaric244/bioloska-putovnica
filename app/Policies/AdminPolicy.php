use Illuminate\Support\Facades\Log;
<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class AdminPolicy
{
    /**
     * Determine if the user can create an admin.
     */
	public function createAdmin(User $user): bool
    {
        throw new \Exception('AdminPolicy@createAdmin: ' . json_encode([
            'user_email' => $user->email,
            'user_id' => $user->id,
            'roles' => $user->uloge->pluck('naziv')->toArray(),
        ]));
        // return $user->imaUlogu(['super_admin']);
    }
}
