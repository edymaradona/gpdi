<?php
/**
 * Created by PhpStorm.
 * User: peterjkambey
 * Date: 7/16/16
 * Time: 5:11 PM
 */

namespace common\components;

use yii\rbac\Rule;


class defaultUserGroup extends Rule
{

    public $name = 'userGroup';

    /**
     * @param string|integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['post']) ? $params['post']->createdBy == $user : false;
    }

}