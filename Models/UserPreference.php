<?php namespace Modules\Backend\Models;

use BackendAuth;
use Modules\LivewireCore\Exception\SystemException;
use Modules\LivewireCore\Auth\Models\Preferences as PreferencesBase;

/**
 * All preferences for the backend user
 *
 * @package winter\wn-backend-module
 * @author Alexey Bobkov, Samuel Georges
 */
class UserPreference extends PreferencesBase
{
    /**
     * @var string The database table used by the model.
     */
    protected $table = 'backend_user_preferences';

    public $timestamps = false;

    protected static $cache = [];

    /**
     * Checks for a supplied user or uses the default logged in. You should override this method.
     * @param mixed $user An optional back-end user object.
     * @return User object
     */
    public function resolveUser($user)
    {
        $user = BackendAuth::getUser();
        if (!$user) {
            throw new SystemException(trans('backend::lang.user.preferences.not_authenticated'));
        }

        return $user;
    }
}
