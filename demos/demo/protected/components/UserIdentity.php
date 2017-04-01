<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $username = $this->username;
        $password = $this->password;

        $criteria = new CDbCriteria();
        $criteria->condition = 'username = :username';
        $criteria->params = array(':username' => $username);

        $user = Users::model()->find($criteria);

        if (! empty($user)) {
            $passwordHash = md5($password);

            if ($passwordHash == $user->password) {
                die('success login');
            } else {
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }
        } else {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }

		return !$this->errorCode;
	}
}