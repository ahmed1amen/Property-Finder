<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Agencies\Models\AgentService;
use Modules\Media\Models\MediaFile;

class AgentServices extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AgentService::create([
            'name' => ['slug' => 'Moving & installing furniture', 'ar' => "نقل و تركيب األثاث"],
        ]);
        AgentService::create([
            'name' => ['en' => 'Maintenance Services', 'ar' => "خدمات الصيانة"],
        ]);
        AgentService::create([
            'name' => ['en' => 'Contract Signature', 'ar' => "توثيق العقود"],
        ]);
        AgentService::create([
            'name' => ['en' => 'Mortgage', 'ar' => "التمويل العقاري"],
        ]);
        AgentService::create([
            'name' => ['en' => 'Engineering & Contracting', 'ar' => "الخدمات الهندسية و المقاوالت"],
        ]);
        AgentService::create([
            'name' => ['en' => 'Real Estate Appraisal', 'ar' => "التقييم العقاري"],
        ]);
        AgentService::create([
            'name' => ['en' => 'Estate Development', 'ar' => "التطوير العقاري"],
        ]);
        AgentService::create([
            'name' => ['en' => 'Auctions & tenders', 'ar' => "المزادات و المناقصات العقارية"],
        ]);
        AgentService::create([
            'name' => ['en' => 'kitchens Designing', 'ar' => "تفصيل المطابخ"],
        ]);

    }
}
