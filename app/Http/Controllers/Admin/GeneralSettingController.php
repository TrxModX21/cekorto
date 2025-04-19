<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Frontend;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function systemSetting()
    {
        $pageTitle = 'System Settings';

        $settings = json_decode(file_get_contents(resource_path('views/admin/setting/settings.json')));

        return view('admin.setting.system', compact('pageTitle', 'settings'));
    }
    public function general()
    {
        $pageTitle = 'General Setting';
        $timezones = timezone_identifiers_list();
        $currentTimezone = array_search(config('app.timezone'), $timezones);

        return view('admin.setting.general', compact('pageTitle', 'timezones', 'currentTimezone'));
    }
    public function generalUpdate(Request $request)
    {
        $request->validate([
            'timezone' => ['required', 'integer'],
        ]);

        $referValidation = 'nullable';
        if (gs('ref_system')) {
            $referValidation = 'required';
        }

        $validated = $request->validate([
            'site_name' => ['required', 'string', 'max:40'],
            'cur_text' => ['required', 'string', 'max:40'],
            'cur_sym' => ['required', 'string', 'max:40'],
            'base_color' => ['nullable', 'regex:/^[a-f0-9]{6}$/i'],
            'currency_format' => ['required', 'in:1,2,3'],
            'paginate_number' => ['required', 'integer'],
            'ref_commission' => [$referValidation . ',numeric', 'gt:0'],
            'upload_limit' => ['required,numeric', 'gte: -1'],
            'per_download' => ['required,numeric', 'gte: 0'],
            // 'image_maximum_price' => ['required', 'numeric', 'gt:0'],
            'ads_script' => ['nullable', 'string'],
            // 'banner' => ['required']
        ]);

        try {
            $timezones = timezone_identifiers_list();
            $timezone = @$timezones[$request->timezone] ?? 'UTC';
            $timezoneFile = config_path('timezone.php');
            $content = '<?php $timezone = "' . $timezone . '" ?>';
            file_put_contents($timezoneFile, $content);

            $general = gs();
            $general->update($validated);
        } catch (\Exception $err) {
            $notify[] = ['error', 'Server not respond, try again later!'];
            return back()->withNotify($notify);
        }

        $notify[] = ['success', 'General setting updated successfully!'];
        return back()->withNotify($notify);

    }
    public function logoIcon()
    {
        $pageTitle = 'Logo & Favicon';
        return view('admin.setting.logo_icon', compact('pageTitle'));
    }
    public function logoIconUpdate(Request $request)
    {
        $request->validate([
            'logo' => ['image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'logo_dark' => ['image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'favicon' => ['image', new FileTypeValidate(['png'])],
        ]);

        $path = getFilePath('logo_icon');
        if ($request->hasFile('logo')) {
            try {
                fileUploader($request->logo, $path, filename: 'logo.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload the logo'];
                return back()->withNotify($notify);
            }
        }

        if ($request->hasFile('favicon')) {
            try {
                fileUploader($request->favicon, $path, filename: 'favicon.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload the favicon'];
                return back()->withNotify($notify);
            }
        }
        if ($request->hasFile('logo_dark')) {
            try {
                fileUploader($request->logo_dark, $path, filename: 'logo_dark.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload the dark logo'];
                return back()->withNotify($notify);
            }
        }

        $notify[] = ['success', 'Logo & favicon updated successfully'];
        return back()->withNotify($notify);
    }
    public function socialiteCredentials()
    {
        $pageTitle = 'Social Login Credentials';
        return view('admin.setting.social_credential', compact('pageTitle'));
    }
    public function updateSocialiteCredentials(Request $request, $key)
    {
        $general = gs();
        $credentials = $general->socialite_credentials;

        try {
            @$credentials->$key->client_id = $request->client_id;
            @$credentials->$key->client_secret = $request->client_secret;
        } catch (\Throwable $th) {
            abort(404);
        }
        
        $general->socialite_credentials = $credentials;
        $general->save();

        $notify[] = ['success', ucfirst($key) . ' credential updated successfully'];
        return back()->withNotify($notify);
    }
    public function updateSocialiteCredentialStatus($key)
    {
        $general = gs();
        $credentials = $general->socialite_credentials;

        try {
            $credentials->$key->status = $credentials->$key->status == Status::ENABLE ? Status::DISABLE : Status::ENABLE;
        } catch (\Throwable $th) {
            abort(404);
        }

        $general->socialite_credentials = $credentials;
        $general->save();

        $notify[] = ['success', 'Status changed successfully'];
        return back()->withNotify($notify);
    }
    public function systemConfiguration()
    {
        $pageTitle = 'System Configuration';
        return view('admin.setting.configuration', compact('pageTitle'));
    }
    public function systemConfigurationSubmit(Request $request)
    {
        $general = gs();

        $general->registration = $request->registration ? Status::ENABLE : Status::DISABLE;
        $general->force_ssl = $request->force_ssl ? Status::ENABLE : Status::DISABLE;
        $general->agree = $request->agree ? Status::ENABLE : Status::DISABLE;
        $general->secure_pass = $request->secure_pass ? Status::ENABLE : Status::DISABLE;
        $general->kyc_ver = $request->kyc_ver ? Status::ENABLE : Status::DISABLE;
        $general->email_ver = $request->email_ver ? Status::ENABLE : Status::DISABLE;
        $general->email_notif = $request->email_notif ? Status::ENABLE : Status::DISABLE;
        $general->sms_ver = $request->sms_ver ? Status::ENABLE : Status::DISABLE;
        $general->sms_notif = $request->sms_notif ? Status::ENABLE : Status::DISABLE;
        $general->push_notif = $request->push_notif ? Status::ENABLE : Status::DISABLE;
        $general->multi_lang = $request->multi_lang ? Status::ENABLE : Status::DISABLE;
        $general->ref_system = $request->ref_system ? Status::ENABLE : Status::DISABLE;
        $general->auto_approval = $request->auto_approval ? Status::ENABLE : Status::DISABLE;
        $general->in_app_payment = $request->in_app_payment ? Status::ENABLE : Status::DISABLE;
        $general->is_invoice_active = $request->is_invoice_active ? Status::ENABLE : Status::DISABLE;
        $general->watermark = $request->watermark ? Status::ENABLE : Status::DISABLE;
        $general->ads_module = $request->ads_module ? Status::ENABLE : Status::DISABLE;
        $general->contact_system = $request->contact_system ? Status::ENABLE : Status::DISABLE;
        $general->donation_module = $request->donation_module ? Status::ENABLE : Status::DISABLE;

        $general->save();
        $notify[] = ['success', 'System configuration updated successfully'];
        return back()->withNotify($notify);
    }
    public function maintenanceMode()
    {
        $pageTitle = 'Maintenance Mode';
        $maintenance = Frontend::where('data_keys', 'maintenance.data')->firstOrFail();
        return view('admin.setting.maintenance', compact('pageTitle', 'maintenance'));
    }
    public function maintenanceModeSubmit(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'image' => ['nullable', new FileTypeValidate(['jpg', 'jpeg', 'png'])]
        ]);
        $general = gs();
        $general->maintenance_mode = $request->status ? Status::ENABLE : Status::DISABLE;
        $general->save();

        $maintenance = Frontend::where('data_keys', 'maintenance.data')->firstOrFail();
        $image = @$maintenance->data_values->image;
        if ($request->hasFile('image')) {
            try {
                $old = $image;
                $image = fileUploader($request->image, getFilePath('maintenance'), getFileSize('maintenance'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $maintenance->data_values = [
            'description' => $request->description,
            'image' => $image
        ];
        $maintenance->save();

        $notify[] = ['success', 'Maintenance mode updated successfully'];
        return back()->withNotify($notify);
    }
}
