<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('cur_text')->nullable();
            $table->string('cur_sym')->nullable();
            $table->string('email_from')->nullable();
            $table->string('email_from_name')->nullable();
            $table->text('email_template')->nullable();
            $table->text('sms_template')->nullable();
            $table->string('sms_from')->nullable();
            $table->string('push_title')->nullable();
            $table->text('push_template')->nullable();
            $table->string('base_color')->nullable();
            $table->text('mail_config')->nullable();
            $table->text('sms_config')->nullable();
            $table->text('firebase_config')->nullable();
            $table->text('global_shortcodes')->nullable();
            $table->text('socialite_credentials')->nullable();
            $table->string('available_version')->nullable();
            $table->boolean('kyc_ver')->default(0);
            $table->boolean('email_ver')->default(0);
            $table->boolean('email_notif')->default(0);
            $table->boolean('sms_ver')->default(0);
            $table->boolean('sms_notif')->default(0);
            $table->boolean('push_notif')->default(0);
            $table->boolean('multi_lang')->default(0);
            $table->boolean('force_ssl')->default(0);
            $table->boolean('in_app_payment')->default(0);
            $table->boolean('maintenance_mode')->default(0);
            $table->boolean('secure_pass')->default(0);
            $table->boolean('agree')->default(0);
            $table->boolean('registration')->default(0);
            $table->string('active_template')->nullable();
            $table->boolean('system_customized')->default(0);
            $table->integer('paginate_number')->default(0);
            $table->enum('currency_format', [1, 2, 3])
                ->default(1)
                ->comment('1 = Both, 2 = Text Only, 3 = Symbol Only');
            $table->boolean('ref_system')->default(0);
            $table->float('ref_commission')->default(0);
            $table->text('instruction')->nullable();
            $table->string('ins_file')->nullable();
            $table->decimal('per_download')->nullable();
            $table->boolean('auto_approval')->default(0);
            $table->integer('upload_limit')->default(0);
            $table->text('ftp')->nullable();
            $table->decimal('image_maximum_price')->nullable();
            $table->boolean('is_invoice_active')->default(0);
            $table->text('wasabi')->nullable();
            $table->text('digital_ocean')->nullable();
            $table->text('vultr')->nullable();
            $table->text('donation_setting')->nullable();
            $table->enum('storage_type', [1, 2, 3, 4])
                ->default(1)
                ->comment('1 = Local Storage, 2 = FTP, 3 = Wasaby, 4 = Digital Ocean');
            $table->boolean('watermark')->default(1);
            $table->text('ads_script')->nullable();
            $table->boolean('ads_module')->default(0);
            $table->boolean('banner')->default(0);
            $table->boolean('contact_system')->default(0);
            $table->boolean('donation_module')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
