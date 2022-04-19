<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : RoleAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Account;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class RoleAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * API is used to retrieve all the assigned roles of a particular User.
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition of Complete Roles data
     * 18.6
    */

    public function getRolesByUid($uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/role";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to assign your desired roles to a given user.
     * @param accountRolesModel Model Class containing Definition of payload for Create Role API
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition of Complete Roles data
     * 18.7
    */

    public function assignRolesByUid($accountRolesModel, $uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/role";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $accountRolesModel);
    }
       


    /**
     * This API is used to unassign roles from a user.
     * @param accountRolesModel Model Class containing Definition of payload for Create Role API
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition of Delete Request
     * 18.8
    */

    public function unassignRolesByUid($accountRolesModel, $uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/role";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam, $accountRolesModel);
    }
       


    /**
     * This API Gets the contexts that have been configured and the associated roles and permissions.
     * @param uid UID, the unified identifier for each user account
     * @return Complete user RoleContext data
     * 18.9
    */

    public function getRoleContextByUid($uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/rolecontext";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The API is used to retrieve role context by the context name.
     * @param contextName Name of context
     * @return Complete user RoleContext data
     * 18.10
    */

    public function getRoleContextByContextName($contextName)
    {
        $resourcePath = "/identity/v2/manage/account/rolecontext/$contextName";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API creates a Context with a set of Roles
     * @param accountRoleContextModel Model Class containing Definition of RoleContext payload
     * @param uid UID, the unified identifier for each user account
     * @return Complete user RoleContext data
     * 18.11
    */

    public function updateRoleContextByUid($accountRoleContextModel, $uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/rolecontext";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $accountRoleContextModel);
    }
       


    /**
     * This API Deletes the specified Role Context
     * @param contextName Name of context
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition of Delete Request
     * 18.12
    */

    public function deleteRoleContextByUid($contextName, $uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/rolecontext/$contextName";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam);
    }
       


    /**
     * This API Deletes the specified Role from a Context.
     * @param contextName Name of context
     * @param roleContextRemoveRoleModel Model Class containing Definition of payload for RoleContextRemoveRole API
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition of Delete Request
     * 18.13
    */

    public function deleteRolesFromRoleContextByUid($contextName, $roleContextRemoveRoleModel,
        $uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/rolecontext/$contextName/role";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam, $roleContextRemoveRoleModel);
    }
       


    /**
     * This API Deletes Additional Permissions from Context.
     * @param contextName Name of context
     * @param roleContextAdditionalPermissionRemoveRoleModel Model Class containing Definition of payload for RoleContextAdditionalPermissionRemoveRole API
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition of Delete Request
     * 18.14
    */

    public function deleteAdditionalPermissionFromRoleContextByUid($contextName, $roleContextAdditionalPermissionRemoveRoleModel,
        $uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/rolecontext/$contextName/additionalpermission";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam, $roleContextAdditionalPermissionRemoveRoleModel);
    }
       


    /**
     * This API retrieves the complete list of created roles with permissions of your app.
     * @return Complete user Roles List data
     * 41.1
    */

    public function getRolesList()
    {
        $resourcePath = "/identity/v2/manage/role";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API creates a role with permissions.
     * @param rolesModel Model Class containing Definition of payload for Roles API
     * @return Complete user Roles data
     * 41.2
    */

    public function createRoles($rolesModel)
    {
        $resourcePath = "/identity/v2/manage/role";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $rolesModel);
    }
       


    /**
     * This API is used to delete the role.
     * @param role Created RoleName
     * @return Response containing Definition of Delete Request
     * 41.3
    */

    public function deleteRole($role)
    {
        $resourcePath = "/identity/v2/manage/role/$role";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to add permissions to a given role.
     * @param permissionsModel Model Class containing Definition for PermissionsModel Property
     * @param role Created RoleName
     * @return Response containing Definition of Complete role data
     * 41.4
    */

    public function addRolePermissions($permissionsModel, $role)
    {
        $resourcePath = "/identity/v2/manage/role/$role/permission";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $permissionsModel);
    }
       


    /**
     * API is used to remove permissions from a role.
     * @param permissionsModel Model Class containing Definition for PermissionsModel Property
     * @param role Created RoleName
     * @return Response containing Definition of Complete role data
     * 41.5
    */

    public function removeRolePermissions($permissionsModel, $role)
    {
        $resourcePath = "/identity/v2/manage/role/$role/permission";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam, $permissionsModel);
    }

}