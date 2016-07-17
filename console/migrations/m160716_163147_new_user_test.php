<?php

use yii\db\Migration;

class m160716_163147_new_user_test extends Migration
{
    public function up()
    {

        /**
         * Export to PHP Array plugin for PHPMyAdmin
         * @version 0.2b
         */

        //
        // Database `gpdi_project`
        //

        // `gpdi_project`.`auth_assignment`
        $this->insert('auth_assignment', [
            array('item_name' => 'AdministratorRole', 'user_id' => '1', 'created_at' => '1468676797'),
            array('item_name' => 'AllModuleRole', 'user_id' => '2', 'created_at' => '1468676907'),
            array('item_name' => 'AuthenticatedRole', 'user_id' => '1', 'created_at' => '1468678265'),
            array('item_name' => 'AuthenticatedRole', 'user_id' => '2', 'created_at' => '1468676907'),
            array('item_name' => 'AuthenticatedRole', 'user_id' => '3', 'created_at' => '1468677388'),
            array('item_name' => 'PastoralPermission', 'user_id' => '3', 'created_at' => '1468677613')
        ]);
        // `gpdi_project`.`auth_item`
        $this->insert('auth_item', [
            array(
                'name' => '/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/admin/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/admin/assignment/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/admin/default/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/admin/menu/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/admin/permission/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/admin/role/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/admin/route/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/admin/rule/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/admin/user/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/admin/user/index',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/debug/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/debug/default/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/gii/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/gii/default/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/gridview/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/gridview/export/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/organization/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/organization/index',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/pastor/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/pastor/index',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/site/*',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/site/index',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676089',
                'updated_at' => '1468676089'
            ),
            array(
                'name' => '/site/request-password-reset',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676330',
                'updated_at' => '1468676330'
            ),
            array(
                'name' => '/site/reset-password',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676330',
                'updated_at' => '1468676330'
            ),
            array(
                'name' => '/site/signup',
                'type' => '2',
                'description' => null,
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676554',
                'updated_at' => '1468676554'
            ),
            array(
                'name' => 'AdministratorPermission',
                'type' => '2',
                'description' => 'All Administrator Permission',
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468677037',
                'updated_at' => '1468677037'
            ),
            array(
                'name' => 'AdministratorRole',
                'type' => '1',
                'description' => 'All Access All Module',
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676469',
                'updated_at' => '1468676469'
            ),
            array(
                'name' => 'AllModuleBundle',
                'type' => '2',
                'description' => 'Pastor, Organization,  .... ',
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676431',
                'updated_at' => '1468676431'
            ),
            array(
                'name' => 'AllModuleRole',
                'type' => '1',
                'description' => 'All Module Except Administrator Role',
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676851',
                'updated_at' => '1468676851'
            ),
            array(
                'name' => 'AuthenticatedRole',
                'type' => '1',
                'description' => 'Authenticated Only Action ',
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676289',
                'updated_at' => '1468676289'
            ),
            array(
                'name' => 'OrganizationPermission',
                'type' => '2',
                'description' => 'All Organization Action',
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676189',
                'updated_at' => '1468676216'
            ),
            array(
                'name' => 'PastoralPermission',
                'type' => '2',
                'description' => 'All Pastoral Action',
                'rule_name' => null,
                'data' => null,
                'created_at' => '1468676159',
                'updated_at' => '1468676159'
            )
        ]);

        // `gpdi_project`.`auth_item_child`
        $this->insert('auth_item_child', array(
            array('parent' => 'AdministratorPermission', 'child' => '/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/admin/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/admin/assignment/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/admin/default/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/admin/menu/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/admin/permission/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/admin/role/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/admin/route/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/admin/rule/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/admin/user/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/admin/user/index'),
            array('parent' => 'AdministratorPermission', 'child' => '/debug/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/debug/default/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/gii/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/gii/default/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/gridview/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/gridview/export/*'),
            array('parent' => 'OrganizationPermission', 'child' => '/organization/*'),
            array('parent' => 'PastoralPermission', 'child' => '/pastor/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/site/*'),
            array('parent' => 'AdministratorPermission', 'child' => '/site/index'),
            array('parent' => 'AdministratorPermission', 'child' => '/site/request-password-reset'),
            array('parent' => 'AuthenticatedRole', 'child' => '/site/request-password-reset'),
            array('parent' => 'AdministratorPermission', 'child' => '/site/reset-password'),
            array('parent' => 'AuthenticatedRole', 'child' => '/site/reset-password'),
            array('parent' => 'AdministratorPermission', 'child' => '/site/signup'),
            array('parent' => 'AdministratorRole', 'child' => 'AdministratorPermission'),
            array('parent' => 'AdministratorRole', 'child' => 'AllModuleBundle'),
            array('parent' => 'AllModuleRole', 'child' => 'AllModuleBundle'),
            array('parent' => 'AllModuleBundle', 'child' => 'OrganizationPermission'),
            array('parent' => 'AllModuleBundle', 'child' => 'PastoralPermission')
        ));

        // `gpdi_project`.`auth_rule`
        $this->insert('auth_rule', array(
            array(
                'name' => 'defaultUserGroup',
                'data' => 'O:34:"common\\components\\defaultUserGroup":3:{s:4:"name";s:16:"defaultUserGroup";s:9:"createdAt";i:1468664245;s:9:"updatedAt";i:1468664245;}',
                'created_at' => '1468664245',
                'updated_at' => '1468664245'
            )
        ));

        // `gpdi_project`.`family`
        $this->insert('family', array(
            array(
                'id' => '1',
                'parent_id' => '1',
                'relation_id' => '1',
                'family_name' => 'Jeannie Tambaritji',
                'birth_place' => 'Manado',
                'birth_date' => '1985-01-01',
                'gender_id' => '1',
                'handphone' => '081212121210',
                'email' => 'audi@audi.com',
                'remark' => '',
                'photo_path' => null,
                'created_at' => '0',
                'updated_at' => '1468574947'
            )
        ));

        // `gpdi_project`.`menu`
        $this->insert('menu', array(
            array(
                'id' => '1',
                'name' => 'Organization',
                'parent' => null,
                'route' => '/organization/index',
                'order' => '3',
                'data' => null
            ),
            array(
                'id' => '2',
                'name' => 'Pastor',
                'parent' => null,
                'route' => '/pastor/index',
                'order' => '2',
                'data' => null
            ),
            array(
                'id' => '3',
                'name' => 'Home',
                'parent' => null,
                'route' => '/site/index',
                'order' => '1',
                'data' => null
            ),
            array(
                'id' => '4',
                'name' => 'MDM Admin',
                'parent' => null,
                'route' => '/admin/user/index',
                'order' => '4',
                'data' => null
            ),
            array(
                'id' => '5',
                'name' => 'Sign Up',
                'parent' => '4',
                'route' => '/site/signup',
                'order' => '2',
                'data' => null
            ),
            array(
                'id' => '6',
                'name' => 'Admin',
                'parent' => '4',
                'route' => '/admin/user/index',
                'order' => '1',
                'data' => null
            )
        ));

        // `gpdi_project`.`ministry`
        $this->insert('ministry', array(
            array(
                'id' => '1',
                'parent_id' => '1',
                'organization_parent_id' => '5',
                'status_id' => '1',
                'start_date' => '2018-07-12',
                'end_date' => '2019-12-10',
                'church_name' => 'GPdI Betlehem3',
                'sk_number' => '1212/SK/342VI/200',
                'ministry_address' => 'Kelapa Gading3',
                'ministry_address1' => '',
                'ministry_address2' => '',
                'phone_number' => '08211114466',
                'remark' => '',
                'created_at' => '0',
                'updated_at' => '1468578875'
            ),
            array(
                'id' => '2',
                'parent_id' => '2',
                'organization_parent_id' => '6',
                'status_id' => '1',
                'start_date' => '2018-07-12',
                'end_date' => '2019-12-10',
                'church_name' => 'GPdI Betlehem3',
                'sk_number' => '1212/SK/342VI/200',
                'ministry_address' => 'Kelapa Gading3',
                'ministry_address1' => '',
                'ministry_address2' => '',
                'phone_number' => '08211114466',
                'remark' => '',
                'created_at' => '0',
                'updated_at' => '1468578875'
            ),
            array(
                'id' => '3',
                'parent_id' => '6',
                'organization_parent_id' => '7',
                'status_id' => '1',
                'start_date' => '2018-07-12',
                'end_date' => '2019-12-10',
                'church_name' => 'GPdI Betlehem3',
                'sk_number' => '1212/SK/342VI/200',
                'ministry_address' => 'Kelapa Gading3',
                'ministry_address1' => '',
                'ministry_address2' => '',
                'phone_number' => '08211114466',
                'remark' => '',
                'created_at' => '0',
                'updated_at' => '1468578875'
            )
        ));

        // `gpdi_project`.`organization`
        $this->insert('organization', array(
            array(
                'id' => '1',
                'parent_id' => '0',
                'start_date' => '2016-02-01',
                'end_date' => '2016-02-01',
                'organization_name' => 'MP',
                'description' => '',
                'sk_number' => '',
                'ministry_address' => '',
                'ministry_address1' => '',
                'ministry_address2' => '',
                'phone_number' => '',
                'status_id' => '1',
                'remark' => '',
                'photo_path' => null,
                'created_at' => '0',
                'updated_at' => '1468552473'
            ),
            array(
                'id' => '2',
                'parent_id' => '1',
                'start_date' => '2016-02-01',
                'end_date' => '2016-01-01',
                'organization_name' => 'MD Jabar',
                'description' => 'test',
                'sk_number' => '',
                'ministry_address' => '',
                'ministry_address1' => '',
                'ministry_address2' => '',
                'phone_number' => '',
                'status_id' => '1',
                'remark' => '',
                'photo_path' => null,
                'created_at' => '1468551810',
                'updated_at' => '1468554359'
            ),
            array(
                'id' => '3',
                'parent_id' => '2',
                'start_date' => '2016-02-01',
                'end_date' => '1970-01-01',
                'organization_name' => 'MW Banten',
                'description' => '',
                'sk_number' => '',
                'ministry_address' => '',
                'ministry_address1' => '',
                'ministry_address2' => '',
                'phone_number' => '',
                'status_id' => '1',
                'remark' => '',
                'photo_path' => null,
                'created_at' => '1468551913',
                'updated_at' => '1468552482'
            ),
            array(
                'id' => '4',
                'parent_id' => '1',
                'start_date' => '2016-02-01',
                'end_date' => '2016-01-01',
                'organization_name' => 'MD Jakarta',
                'description' => 'test2',
                'sk_number' => '',
                'ministry_address' => '',
                'ministry_address1' => '',
                'ministry_address2' => '',
                'phone_number' => '',
                'status_id' => '1',
                'remark' => '',
                'photo_path' => null,
                'created_at' => '1468551810',
                'updated_at' => '1468554359'
            ),
            array(
                'id' => '5',
                'parent_id' => '2',
                'start_date' => '2016-02-01',
                'end_date' => '1970-01-01',
                'organization_name' => 'MW Banten2',
                'description' => '',
                'sk_number' => '',
                'ministry_address' => '',
                'ministry_address1' => '',
                'ministry_address2' => '',
                'phone_number' => '',
                'status_id' => '1',
                'remark' => '',
                'photo_path' => null,
                'created_at' => '1468551913',
                'updated_at' => '1468552482'
            ),
            array(
                'id' => '6',
                'parent_id' => '4',
                'start_date' => '2016-02-01',
                'end_date' => '1970-01-01',
                'organization_name' => 'MW Jakarta1',
                'description' => '',
                'sk_number' => '',
                'ministry_address' => '',
                'ministry_address1' => '',
                'ministry_address2' => '',
                'phone_number' => '',
                'status_id' => '1',
                'remark' => '',
                'photo_path' => null,
                'created_at' => '1468551913',
                'updated_at' => '1468552482'
            ),
            array(
                'id' => '7',
                'parent_id' => '4',
                'start_date' => '2016-02-01',
                'end_date' => '1970-01-01',
                'organization_name' => 'MW Jakarta2',
                'description' => '',
                'sk_number' => '',
                'ministry_address' => '',
                'ministry_address1' => '',
                'ministry_address2' => '',
                'phone_number' => '',
                'status_id' => '1',
                'remark' => '',
                'photo_path' => null,
                'created_at' => '1468551913',
                'updated_at' => '1468552482'
            )
        ));

        // `gpdi_project`.`organization_role`
        $this->insert('organization_role', array(
            array(
                'id' => '1',
                'parent_id' => '1',
                'organization_id' => '2',
                'start_date' => '2010-01-01',
                'end_date' => '2019-07-12',
                'role_id' => '1',
                'title' => 'Testing',
                'report_to_id' => '3',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '1468582280'
            )
        ));

        // `gpdi_project`.`parameter`
        $this->insert('parameter', array(
            array(
                'id' => '1',
                'group_name' => 'gender',
                'description' => 'Laki-Laki',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '2',
                'group_name' => 'gender',
                'description' => 'Perempuan',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '1',
                'group_name' => 'jabatan',
                'description' => 'Pdp',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '2',
                'group_name' => 'jabatan',
                'description' => 'Pdm',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '3',
                'group_name' => 'jabatan',
                'description' => 'Pdt',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '4',
                'group_name' => 'jabatan',
                'description' => 'Belum dilantik',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '1',
                'group_name' => 'kegiatan',
                'description' => 'Ibadah Raya/Minggu',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '2',
                'group_name' => 'kegiatan',
                'description' => 'Ibadah Pertengahan',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '3',
                'group_name' => 'kegiatan',
                'description' => 'Ibadah Doa dan Puasa',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '4',
                'group_name' => 'kegiatan',
                'description' => 'Komsel',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '5',
                'group_name' => 'kegiatan',
                'description' => 'Pelnap',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '6',
                'group_name' => 'kegiatan',
                'description' => 'Pelprap',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '7',
                'group_name' => 'kegiatan',
                'description' => 'Pelpap',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '8',
                'group_name' => 'kegiatan',
                'description' => 'Pelwap',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '9',
                'group_name' => 'kegiatan',
                'description' => 'lainnya',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '1',
                'group_name' => 'pelayanan',
                'description' => 'Gembala Sidang',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '2',
                'group_name' => 'pelayanan',
                'description' => 'Wakil Gembala',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '3',
                'group_name' => 'pelayanan',
                'description' => 'Perintisan',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '1',
                'group_name' => 'pendidikan',
                'description' => 'SMU',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '2',
                'group_name' => 'pendidikan',
                'description' => 'D3',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '3',
                'group_name' => 'pendidikan',
                'description' => 'S1',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '4',
                'group_name' => 'pendidikan',
                'description' => 'S2',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '5',
                'group_name' => 'pendidikan',
                'description' => 'S3',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '6',
                'group_name' => 'pendidikan',
                'description' => 'SA',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '7',
                'group_name' => 'pendidikan',
                'description' => 'STT',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '8',
                'group_name' => 'pendidikan',
                'description' => 'Lainnya',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '1',
                'group_name' => 'pernikahan',
                'description' => 'Kawin',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '2',
                'group_name' => 'pernikahan',
                'description' => 'Belum Kawin',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '3',
                'group_name' => 'pernikahan',
                'description' => 'Duda',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '4',
                'group_name' => 'pernikahan',
                'description' => 'Janda',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '1',
                'group_name' => 'status',
                'description' => 'Active',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '2',
                'group_name' => 'status',
                'description' => 'Non Active',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '1',
                'group_name' => 'family',
                'description' => 'Istri',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '2',
                'group_name' => 'family',
                'description' => 'Anak',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '1',
                'group_name' => 'jabatanorg',
                'description' => 'Ketua',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '2',
                'group_name' => 'jabatanorg',
                'description' => 'Sekretaris',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '3',
                'group_name' => 'jabatanorg',
                'description' => 'Bendahara',
                'status_id' => '1',
                'created_at' => '0',
                'updated_at' => '0'
            )
        ));

        // `gpdi_project`.`pastor`
        $this->insert('pastor', array(
            array(
                'id' => '1',
                'pastor_name' => 'Peter J. Kambey',
                'front_title' => null,
                'back_title' => null,
                'birth_place' => '',
                'birth_date' => '0000-00-00',
                'gender_id' => '1',
                'address' => null,
                'address1' => null,
                'address2' => null,
                'handphone' => null,
                'email' => null,
                'remark' => null,
                'photo_path' => 'pastor/peter-jk.jpg',
                'user_id' => '1',
                'created_at' => '0',
                'updated_at' => '1468496685'
            ),
            array(
                'id' => '2',
                'pastor_name' => 'Handri Manengkey',
                'front_title' => null,
                'back_title' => null,
                'birth_place' => '',
                'birth_date' => '0000-00-00',
                'gender_id' => '1',
                'address' => null,
                'address1' => null,
                'address2' => null,
                'handphone' => null,
                'email' => null,
                'remark' => null,
                'photo_path' => 'pastor/13473231_532254363626621_2109116799_n.jpg',
                'user_id' => null,
                'created_at' => '0',
                'updated_at' => '1468496685'
            ),
            array(
                'id' => '4',
                'pastor_name' => 'Bobby Lopulalan',
                'front_title' => 'Pdt',
                'back_title' => 'MA',
                'birth_place' => 'Kawangkoan',
                'birth_date' => '2016-07-12',
                'gender_id' => '1',
                'address' => 'Jakarta',
                'address1' => 'Jakarta Selatan',
                'address2' => 'DKI Jakarta',
                'handphone' => '082110046046',
                'email' => 'peterjkambey@gmail.com',
                'remark' => '',
                'photo_path' => null,
                'user_id' => null,
                'created_at' => '0',
                'updated_at' => '0'
            ),
            array(
                'id' => '5',
                'pastor_name' => 'Yanny Lela',
                'front_title' => '',
                'back_title' => '',
                'birth_place' => 'Jakarta',
                'birth_date' => '2016-07-19',
                'gender_id' => '1',
                'address' => 'Jakarta',
                'address1' => 'Jakarta',
                'address2' => '',
                'handphone' => '082110046046',
                'email' => 'peter@phpindonesia.or.id',
                'remark' => '',
                'photo_path' => null,
                'user_id' => null,
                'created_at' => '1468415398',
                'updated_at' => '1468415398'
            ),
            array(
                'id' => '6',
                'pastor_name' => 'Audi Woworuntu',
                'front_title' => 'test',
                'back_title' => 'test',
                'birth_place' => 'test',
                'birth_date' => '2016-12-23',
                'gender_id' => '1',
                'address' => '.',
                'address1' => '',
                'address2' => '',
                'handphone' => '000',
                'email' => '',
                'remark' => '',
                'photo_path' => null,
                'user_id' => '2',
                'created_at' => '0',
                'updated_at' => '1468499688'
            )
        ));


        // `gpdi_project`.`user`
        $this->insert('user', array(
            array(
                'id' => '1',
                'username' => 'admin',
                'auth_key' => '877p146Wg0lptlUXHKv22Bmi14ipC2ZX',
                'password_hash' => '$2y$13$WZQdev537S9EBLyAfdpjVe9F8D.k99MXd4mvBHD3ogUmmhUtJaZ06',
                'password_reset_token' => null,
                'email' => 'admin@gpdi.com',
                'status' => '10',
                'created_at' => '1467560515',
                'updated_at' => '1467560515'
            ),
            array(
                'id' => '2',
                'username' => 'audi',
                'auth_key' => 'BQiDCILp-45avOVTmWwyhMq5dkbOUg99',
                'password_hash' => '$2y$13$tT7BcX8Bm8/dkVfOo9FET.C3Jvk3vixSTCGLG7yYEqpMibjoDWrxm',
                'password_reset_token' => null,
                'email' => 'audi@gmail.com',
                'status' => '10',
                'created_at' => '1468596723',
                'updated_at' => '1468596723'
            ),
            array(
                'id' => '3',
                'username' => 'handry',
                'auth_key' => 'e3BiEcp-Dg80kUNewwXLemvNdwoAwLJ8',
                'password_hash' => '$2y$13$4blNipjOFnSXM1WITzrqvu5iIzgJuFtSVgTYW2TVeW4jZMKvMOi2u',
                'password_reset_token' => null,
                'email' => 'handry@handry.com',
                'status' => '10',
                'created_at' => '1468677300',
                'updated_at' => '1468677300'
            ),
            array(
                'id' => '5',
                'username' => 'test',
                'auth_key' => 'e3BiEcp-Dg80kUNewwXLemvNdwoAwLJ8',
                'password_hash' => '$2y$13$4blNipjOFnSXM1WITzrqvu5iIzgJuFtSVgTYW2TVeW4jZMKvMOi2u',
                'password_reset_token' => null,
                'email' => 'test@test.com',
                'status' => '10',
                'created_at' => '1468677300',
                'updated_at' => '1468677300'
            )
        ));


    }

    public function down()
    {
        echo "m160716_163147_new_user_test cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
