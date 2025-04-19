<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notification_templates')->insert([
            [
                'act' => 'DEFAULT',
                'name' => 'Default Template',
                'subject' => '{{subject}}',
                'push_title' => '{{subject}}',
                'email_body' => '{{message}}',
                'sms_body' => '{{message}}',
                'push_body' => '{{message}}',
                'shortcodes' => '{"subject":"Subject","message":"Message"}',
                'email_status' => 1,
                'sms_status' => 1,
                'push_status' => 1
            ],
            [
                'act' => 'PASS_RESET_CODE',
                'name' => 'Password - Reset - Code',
                'subject' => 'Password Reset',
                'push_title' => '{{site_name}} Password Reset Code',
                'email_body' => '<div style="font-family: Montserrat, sans-serif;">We have received a request to reset the password for your account on&nbsp;<span style="font-weight: bolder;">{{time}} .<br></span></div><div style="font-family: Montserrat, sans-serif;">Requested From IP:&nbsp;<span style="font-weight: bolder;">{{ip}}</span>&nbsp;using&nbsp;<span style="font-weight: bolder;">{{browser}}</span>&nbsp;on&nbsp;<span style="font-weight: bolder;">{{operating_system}}&nbsp;</span>.</div><div style="font-family: Montserrat, sans-serif;"><br></div><br style="font-family: Montserrat, sans-serif;"><div style="font-family: Montserrat, sans-serif;"><div>Your account recovery code is:&nbsp;&nbsp;&nbsp;<font size="6"><span style="font-weight: bolder;">{{code}}</span></font></div><div><br></div></div><div style="font-family: Montserrat, sans-serif;"><br></div><div style="font-family: Montserrat, sans-serif;"><font size="4" color="#CC0000">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><div><font size="4" color="#CC0000"><br></font></div>',
                'sms_body' => 'Your account recovery code is: {{code}}',
                'shortcodes' => '{"code":"Verification code for password reset","ip":"IP address of the user","browser":"Browser of the user","operating_system":"Operating system of the user","time":"Time of the request"}',
                'email_status' => 1,
                'sms_status' => 0,
                'push_status' => 0
            ],
            [
                'act' => 'PASS_RESET_DONE',
                'name' => 'Password - Reset - Confirmation',
                'subject' => 'You have reset your password',
                'email_body' => '{{message}}',
                'sms_body' => 'Your password has been changed successfully',
                'shortcodes' => '{"ip":"IP address of the user","browser":"Browser of the user","operating_system":"Operating system of the user","time":"Time of the request"}',
                'email_status' => 1,
                'sms_status' => 1,
                'push_status' => 0
            ],
        ]);
    }
}
