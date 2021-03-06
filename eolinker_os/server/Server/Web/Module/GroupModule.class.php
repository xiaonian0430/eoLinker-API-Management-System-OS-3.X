<?php

/**
 * @name eolinker ams open source，eolinker开源版本
 * @link https://www.eolinker.com/
 * @package eolinker
 * @author www.eolinker.com 广州银云信息科技有限公司 2015-2017
 * eoLinker是目前全球领先、国内最大的在线API接口管理平台，提供自动生成API文档、API自动化测试、Mock测试、团队协作等功能，旨在解决由于前后端分离导致的开发效率低下问题。
 * 如在使用的过程中有任何问题，欢迎加入用户讨论群进行反馈，我们将会以最快的速度，最好的服务态度为您解决问题。
 *
 * eoLinker AMS开源版的开源协议遵循Apache License 2.0，如需获取最新的eolinker开源版以及相关资讯，请访问:https://www.eolinker.com/#/os/download
 *
 * 官方网站：https://www.eolinker.com/
 * 官方博客以及社区：http://blog.eolinker.com/
 * 使用教程以及帮助：http://help.eolinker.com/
 * 商务合作邮箱：market@eolinker.com
 * 用户讨论QQ群：284421832
 */
class GroupModule
{
    public function __construct()
    {
        @session_start();
    }

    /**
     * 获取项目中用户类型
     * @param $groupID int 分组ID
     * @return bool|int
     */
    public function getUserType(&$groupID)
    {
        $groupDao = new GroupDao;
        $projectID = $groupDao->checkGroupPermission($groupID, $_SESSION['userID']);
        if (empty($projectID)) {
            return -1;
        }
        $dao = new AuthorizationDao();
        $result = $dao->getProjectUserType($_SESSION['userID'], $projectID);
        if ($result === FALSE) {
            return -1;
        }
        return $result;
    }

    /**
     * 添加项目分组
     * @param $projectID int 项目ID
     * @param $groupName string 分组名
     * @param $parentGroupID int 父分组ID，默认为0
     * @return int|bool
     */
    public function addGroup(&$projectID, &$groupName, &$parentGroupID)
    {
        $groupDao = new GroupDao;
        $projectDao = new ProjectDao;
        if ($projectDao->checkProjectPermission($projectID, $_SESSION['userID'])) {
            if (is_null($parentGroupID)) {
                $result = $groupDao->addGroup($projectID, $groupName);
                if ($result) {
                    $projectDao->updateProjectUpdateTime($projectID);
                    //将操作写入日志
                    $log_dao = new ProjectLogDao();
                    $log_dao->addOperationLog($projectID, $_SESSION['userID'], ProjectLogDao::$OP_TARGET_API_GROUP, $result, ProjectLogDao::$OP_TYPE_ADD, "添加接口分组:'{$groupName}'", date("Y-m-d H:i:s", time()));
                    return $result;
                } else {
                    return FALSE;
                }
            } else {
                if ($groupDao->checkGroupPermission($parentGroupID, $_SESSION['userID'])) {
                    $result = $groupDao->addChildGroup($projectID, $groupName, $parentGroupID);
                    if ($result) {
                        $projectDao->updateProjectUpdateTime($projectID);
                        $parent_group_name = $groupDao->getGroupName($parentGroupID);
                        //将操作写入日志
                        $log_dao = new ProjectLogDao();
                        $log_dao->addOperationLog($projectID, $_SESSION['userID'], ProjectLogDao::$OP_TARGET_API_GROUP, $result, ProjectLogDao::$OP_TYPE_ADD, "添加接口子分组:'{$parent_group_name}>>{$groupName}'", date("Y-m-d H:i:s", time()));
                        return $result;
                    } else {
                        return FALSE;
                    }
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
    }

    /**
     * 删除项目分组
     * @param $groupID int 分组ID
     * @return bool
     */
    public function deleteGroup(&$groupID)
    {
        $groupDao = new GroupDao;
        $projectDao = new ProjectDao;
        if ($projectID = $groupDao->checkGroupPermission($groupID, $_SESSION['userID'])) {
            $group_name = $groupDao->getGroupName($groupID);
            $result = $groupDao->deleteGroup($groupID);
            if ($result) {
                $projectDao->updateProjectUpdateTime($projectID);
                //将操作写入日志
                $log_dao = new ProjectLogDao();
                $log_dao->addOperationLog($projectID, $_SESSION['userID'], ProjectLogDao::$OP_TARGET_API_GROUP, $groupID, ProjectLogDao::$OP_TYPE_DELETE, "删除接口分组:'$group_name'", date("Y-m-d H:i:s", time()));
                return $result;
            } else {
                return FALSE;
            }
        } else
            return FALSE;
    }

    /**
     * 获取项目分组
     * @param $projectID int 项目ID
     * @return bool|array
     */
    public function getGroupList(&$projectID)
    {
        $groupDao = new GroupDao;
        $projectDao = new ProjectDao;
        if ($projectDao->checkProjectPermission($projectID, $_SESSION['userID']))
            return $groupDao->getGroupList($projectID);
        else
            return FALSE;
    }

    /**
     * 修改项目分组
     * @param $groupID int 分组ID
     * @param $groupName string 分组名
     * @param $parentGroupID int 父分组ID
     * @return bool
     */
    public function editGroup(&$groupID, &$groupName, &$parentGroupID)
    {
        $groupDao = new GroupDao;
        $projectDao = new ProjectDao;
        if ($projectID = $groupDao->checkGroupPermission($groupID, $_SESSION['userID'])) {
            if ($parentGroupID && !$groupDao->checkGroupPermission($parentGroupID, $_SESSION['userID'])) {
                return FALSE;
            }
            $projectDao->updateProjectUpdateTime($projectID);
            $result = $groupDao->editGroup($groupID, $groupName, $parentGroupID);
            if ($result) {
                //将操作写入日志
                $log_dao = new ProjectLogDao();
                $log_dao->addOperationLog($projectID, $_SESSION['userID'], ProjectLogDao::$OP_TARGET_API_GROUP, $groupID, ProjectLogDao::$OP_TYPE_UPDATE, "修改接口分组:'{$groupName}'", date("Y-m-d H:i:s", time()));
                return $result;
            } else {
                return FALSE;
            }
        } else
            return FALSE;
    }

    /**
     * 修改分组排序
     * @param $projectID int 项目ID
     * @param $orderList string 排序列表
     * @return bool
     */
    public function sortGroup(&$projectID, &$orderList)
    {
        $groupDao = new GroupDao;
        $projectDao = new ProjectDao;
        if ($projectDao->checkProjectPermission($projectID, $_SESSION['userID'])) {
            if ($groupDao->sortGroup($projectID, $orderList)) {
                $projectDao->updateProjectUpdateTime($projectID);

                //将操作写入日志
                $log_dao = new ProjectLogDao();
                $log_dao->addOperationLog($projectID, $_SESSION['userID'], ProjectLogDao::$OP_TARGET_API_GROUP, $projectID, ProjectLogDao::$OP_TYPE_UPDATE, "修改接口分组排序", date("Y-m-d H:i:s", time()));

                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    /**
     * 获取分组排序列表
     * @param $projectID int 项目ID
     * @return bool
     */
    public function getGroupOrderList(&$projectID)
    {
        $groupDao = new GroupDao;
        $projectDao = new ProjectDao;
        if ($projectDao->checkProjectPermission($projectID, $_SESSION['userID'])) {
            return $groupDao->getGroupOrderList($projectID);
        } else {
            return FALSE;
        }
    }
}

?>