<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'user_address_create',
            ],
            [
                'id'    => 19,
                'title' => 'user_address_edit',
            ],
            [
                'id'    => 20,
                'title' => 'user_address_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_address_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_address_access',
            ],
            [
                'id'    => 23,
                'title' => 'basic_information_access',
            ],
            [
                'id'    => 24,
                'title' => 'paymenttype_create',
            ],
            [
                'id'    => 25,
                'title' => 'paymenttype_edit',
            ],
            [
                'id'    => 26,
                'title' => 'paymenttype_show',
            ],
            [
                'id'    => 27,
                'title' => 'paymenttype_delete',
            ],
            [
                'id'    => 28,
                'title' => 'paymenttype_access',
            ],
            [
                'id'    => 29,
                'title' => 'userpayment_create',
            ],
            [
                'id'    => 30,
                'title' => 'userpayment_edit',
            ],
            [
                'id'    => 31,
                'title' => 'userpayment_show',
            ],
            [
                'id'    => 32,
                'title' => 'userpayment_delete',
            ],
            [
                'id'    => 33,
                'title' => 'userpayment_access',
            ],
            [
                'id'    => 34,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 35,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 36,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 37,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 38,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 39,
                'title' => 'product_inventory_create',
            ],
            [
                'id'    => 40,
                'title' => 'product_inventory_edit',
            ],
            [
                'id'    => 41,
                'title' => 'product_inventory_show',
            ],
            [
                'id'    => 42,
                'title' => 'product_inventory_delete',
            ],
            [
                'id'    => 43,
                'title' => 'product_inventory_access',
            ],
            [
                'id'    => 44,
                'title' => 'discount_create',
            ],
            [
                'id'    => 45,
                'title' => 'discount_edit',
            ],
            [
                'id'    => 46,
                'title' => 'discount_show',
            ],
            [
                'id'    => 47,
                'title' => 'discount_delete',
            ],
            [
                'id'    => 48,
                'title' => 'discount_access',
            ],
            [
                'id'    => 49,
                'title' => 'product_create',
            ],
            [
                'id'    => 50,
                'title' => 'product_edit',
            ],
            [
                'id'    => 51,
                'title' => 'product_show',
            ],
            [
                'id'    => 52,
                'title' => 'product_delete',
            ],
            [
                'id'    => 53,
                'title' => 'product_access',
            ],
            [
                'id'    => 54,
                'title' => 'shopping_session_create',
            ],
            [
                'id'    => 55,
                'title' => 'shopping_session_edit',
            ],
            [
                'id'    => 56,
                'title' => 'shopping_session_show',
            ],
            [
                'id'    => 57,
                'title' => 'shopping_session_delete',
            ],
            [
                'id'    => 58,
                'title' => 'shopping_session_access',
            ],
            [
                'id'    => 59,
                'title' => 'cart_item_create',
            ],
            [
                'id'    => 60,
                'title' => 'cart_item_edit',
            ],
            [
                'id'    => 61,
                'title' => 'cart_item_show',
            ],
            [
                'id'    => 62,
                'title' => 'cart_item_delete',
            ],
            [
                'id'    => 63,
                'title' => 'cart_item_access',
            ],
            [
                'id'    => 64,
                'title' => 'payment_detail_create',
            ],
            [
                'id'    => 65,
                'title' => 'payment_detail_edit',
            ],
            [
                'id'    => 66,
                'title' => 'payment_detail_show',
            ],
            [
                'id'    => 67,
                'title' => 'payment_detail_delete',
            ],
            [
                'id'    => 68,
                'title' => 'payment_detail_access',
            ],
            [
                'id'    => 69,
                'title' => 'order_detail_create',
            ],
            [
                'id'    => 70,
                'title' => 'order_detail_edit',
            ],
            [
                'id'    => 71,
                'title' => 'order_detail_show',
            ],
            [
                'id'    => 72,
                'title' => 'order_detail_delete',
            ],
            [
                'id'    => 73,
                'title' => 'order_detail_access',
            ],
            [
                'id'    => 74,
                'title' => 'order_item_create',
            ],
            [
                'id'    => 75,
                'title' => 'order_item_edit',
            ],
            [
                'id'    => 76,
                'title' => 'order_item_show',
            ],
            [
                'id'    => 77,
                'title' => 'order_item_delete',
            ],
            [
                'id'    => 78,
                'title' => 'order_item_access',
            ],
            [
                'id'    => 79,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 80,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 81,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 82,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 83,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 84,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 85,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 86,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 87,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 88,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 89,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 90,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 91,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 92,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 93,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 94,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 95,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 96,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 97,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 98,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 99,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 100,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 101,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 102,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 103,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 104,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 105,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 106,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 107,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 108,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 109,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 110,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 111,
                'title' => 'task_create',
            ],
            [
                'id'    => 112,
                'title' => 'task_edit',
            ],
            [
                'id'    => 113,
                'title' => 'task_show',
            ],
            [
                'id'    => 114,
                'title' => 'task_delete',
            ],
            [
                'id'    => 115,
                'title' => 'task_access',
            ],
            [
                'id'    => 116,
                'title' => 'task_calendar_access',
            ],
            [
                'id'    => 117,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 118,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 119,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 120,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 121,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 122,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 123,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 124,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 125,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 126,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 127,
                'title' => 'faq_question_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
