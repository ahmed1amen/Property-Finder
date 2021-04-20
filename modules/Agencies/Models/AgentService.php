<?php
namespace Modules\Agencies\Models;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class AgentService extends Model
{
    use HasTranslations;
    protected $table = 'agent_services';
    public $translatable = ['name'];
    protected $guarded=[];

}
