<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('permissions')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 inactive, 1 active');
            $table->timestamps();
        });
        $now  = now();
        Role::create([
            'name'        => 'Admin',
            'slug'        => 'admin',
            'permissions' => [
                'admin.dashboard',
                'dashboard_statistic',
                'client.index',
                'client.create',
                'client.edit',
                'client.destroy',
                'client.log_in',
                'price_plans.index',
                'price_plans.create',
                'price_plans.edit',
                'price_plans.destroy',
                'staffs.create',
                'staffs.edit',
                'delete',
                'staffs.change-role',
                'ai.writer',
                'ai.setting',
                'payment_methods.index',
                'payment_methods.edit',
                'subscription.index',
                'subscription.create',
                'subscription.edit',
                'subscription.destroy',
                'pusher.notification',
                'onesignal.notification',
                'tickets.index',
                'tickets.create',
                'tickets.edit',
                'ticket.reply',
                'ticket.reply.edit',
                'ticket.reply.delete',
                'departments.index',
                'departments.create',
                'departments.edit',
                'departments.destroy',
                'website.themes',
                'section.title',
                'hero.section',
                'ai.chat',
                'website.cta',
                'footer.content',
                'website_setting.seo',
                'website_setting.custom_js',
                'website_setting.custom_css',
                'website_setting.google_setup',
                'website_setting.fb_pixel',
                'cloud_server.index',
                'cloud_server.create',
                'cloud_server.edit',
                'cloud_server.destroy',
                'partner_logo.index',
                'partner_logo.create',
                'partner_logo.edit',
                'partner_logo.destroy',
                'story_section.index',
                'story_section.create',
                'story_section.edit',
                'story_section.destroy',
                'unique_feature.index',
                'unique_feature.create',
                'unique_feature.edit',
                'unique_feature.destroy',
                'feature.index',
                'feature.create',
                'feature.edit',
                'feature.destroy',
                'testimonials.index',
                'testimonials.create',
                'testimonials.edit',
                'testimonials.destroy',
                'advantage.index',
                'advantage.create',
                'advantage.edit',
                'advantage.destroy',
                'faqs.index',
                'faqs.create',
                'faqs.edit',
                'faqs.destroy',
                'email.server_configuration',
                'email.server_configuration.update',
                'email.template',
                'email_template.update',
                'verified',
                'ban',
                'status',
                'delete',
                'general.setting',
                'preference',
                'admin.cache',
                'admin.panel-setting',
                'admin.firebase',
                'storage.setting',
                'chat.messenger',
                'miscellaneous.setting',
                'cron.setting',
                'currencies.index',
                'currencies.create',
                'currencies.edit',
                'currencies.destroy',
                'currencies.update',
                'currencies.default-currency',
                'set.currency.format',
                'languages.index',
                'languages.create',
                'languages.edit',
                'languages.destroy',
                'languages.update',
                'language.translations.page',
                'admin.language.key.update',
                'countries.index',
                'countries.create',
                'countries.edit',
                'countries.destroy',
                'addon.index',
                'addon.create',
                'addon.edit',
                'addon.destroy',
                'system.update',
                'server.info',
                'system.info',
                'extension.library',
                'file.system.permission',
            ],
        ]);
        $data = [
            [
                'name'        => 'Staff',
                'slug'        => 'staff',
                'created_at'  => $now,
                'updated_at'  => $now,
                'permissions' => json_encode([
                    'admin.dashboard',
                    'dashboard_statistic',
                    'client.index',
                    'client.create',
                    'client.edit',
                    'client.destroy',
                    'client.log_in',
                    'price_plans.index',
                    'price_plans.create',
                    'price_plans.edit',
                    'price_plans.destroy',
                    'staffs.create',
                    'staffs.index',
                    'staffs.edit',
                    'roles.index',
                    'delete',
                    'staffs.change-role',
                    'ai.writer',
                    'ai.setting',
                    'payment_methods.index',
                    'payment_methods.edit',
                    'subscription.index',
                    'subscription.create',
                    'subscription.edit',
                    'subscription.destroy',
                    'pusher.notification',
                    'onesignal.notification',
                    'tickets.index',
                    'tickets.create',
                    'tickets.edit',
                    'ticket.reply',
                    'ticket.reply.edit',
                    'ticket.reply.delete',
                    'departments.index',
                    'departments.create',
                    'departments.edit',
                    'departments.destroy',
                    'website.themes',
                    'section.title',
                    'hero.section',
                    'ai.chat',
                    'website.cta',
                    'footer.content',
                    'website_setting.seo',
                    'website_setting.custom_js',
                    'website_setting.custom_css',
                    'website_setting.google_setup',
                    'website_setting.fb_pixel',
                    'partner_logo.index',
                    'partner_logo.create',
                    'partner_logo.edit',
                    'partner_logo.destroy',
                    'story_section.index',
                    'story_section.create',
                    'story_section.edit',
                    'story_section.destroy',
                    'unique_feature.index',
                    'unique_feature.create',
                    'unique_feature.edit',
                    'unique_feature.destroy',
                    'feature.index',
                    'feature.create',
                    'feature.edit',
                    'feature.destroy',
                    'testimonials.index',
                    'testimonials.create',
                    'testimonials.edit',
                    'testimonials.destroy',
                    'advantage.index',
                    'advantage.create',
                    'advantage.edit',
                    'advantage.destroy',
                    'faqs.index',
                    'faqs.create',
                    'faqs.edit',
                    'faqs.destroy',
                    'email.server_configuration',
                    'email.server_configuration.update',
                    'email.template',
                    'email_template.update',
                    'verified',
                    'ban',
                    'status',
                    'delete',
                    'general.setting',
                    'preference',
                    'admin.cache',
                    'admin.panel-setting',
                    'admin.firebase',
                    'storage.setting',
                    'chat.messenger',
                    'miscellaneous.setting',
                    'cron.setting',
                    'currencies.index',
                    'currencies.create',
                    'currencies.edit',
                    'currencies.destroy',
                    'currencies.update',
                    'currencies.default-currency',
                    'set.currency.format',
                    'custom-notification.index',
                    'custom-notification.create',
                    'custom-notification.edit',
                    'custom-notification.destroy',
                ]),
            ],
            [
                'name'        => 'Client-staff',
                'slug'        => 'Client-staff',
                'created_at'  => $now,
                'updated_at'  => $now,   
                'permissions' => json_encode(['manage_whatsapp', 'manage_telegram', 'manage_ai_writer', 'manage_team', 'manage_chat', 'manage_campaigns', 'manage_ticket', 'manage_setting','manage_widget','manage_template','manage_flow']),
            ],
        ];
        Role::insert($data); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
