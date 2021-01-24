<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Location\Models\Location;
use Modules\Property\Models\Property;
use Modules\Core\Models\Attributes;
use Modules\Core\Models\Terms;
use Modules\Media\Helpers\FileHelper;

class FormSearchAllService extends BaseBlock
{
    function __construct()
    {
        $list_attr = [];
        $list_attr_select = [];
        $list_attribute = Attributes::where("service", 'property')
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($list_attribute as $key => $service) {
            $list_service[] = ['value'   => $service['id'],
                               'name' => ucwords($service['name'])
            ];
        }
        $arg[] = [
            'id'            => 'attr_hide',
            'type'          => 'checklist',
            'listBox'          => 'true',
            'label'         => "<strong>".__('Show Attribute')."</strong>",
            'values'        => $list_service,
        ];
        $arg[] = [
            'id'        => 'title',
            'type'      => 'input',
            'inputType' => 'text',
            'label'     => __('Title')
        ];
        $arg[] = [
            'id'        => 'sub_title',
            'type'      => 'input',
            'inputType' => 'text',
            'label'     => __('Sub Title')
        ];
        $arg[] = [
            'id'    => 'bg_image',
            'type'  => 'uploader',
            'label' => __('Background Image Uploader')
        ];
        $arg[] = [
            'type'=> "checkbox",
            'label'=>__("Hide form search service?"),
            'id'=> "hide_form_search",
            'default'=>false
        ];
        $this->setOptions([
            'settings' => $arg
        ]);
    }

    public function getName()
    {
        return __('Form Search All Service');
    }

    public function content($model = [])
    {
        $showAttrId = isset($model['attr_show']) ? $model['attr_show'] : false;
        $model['attr_show'] = [];
        if(!empty($showAttrId)) {
            $model['attr_show'] = Attributes::with('terms')->find($showAttrId);
        }
        $hideAttrId = isset($model['attr_hide']) ? $model['attr_hide'] : [];
        $model['attr_hide'] = [];
        if(!empty($hideAttrId)) {
            $model['attr_hide'] = Attributes::with('terms')->whereIn("id", $hideAttrId)->get();
        }
        $model['bg_image_url'] = FileHelper::url($model['bg_image'], 'full') ?? "";
        //$model['list_location'] = $model['property_location'] =  Location::where("status","publish")->limit(1000)->orderBy('name', 'asc')->with(['translations'])->get()->toTree();
        $model['modelBlock'] = $model;
        $model['property_min_max_price'] = Property::getMinMaxPrice();
        return view('Template::frontend.blocks.form-search-all-service.index', $model);
    }
}