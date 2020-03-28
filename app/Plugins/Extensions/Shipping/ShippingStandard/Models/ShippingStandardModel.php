<?php
#App\Plugins\Extension\Shipping\ShippingStandard\Models\ShippingStandardModel.php
namespace App\Plugins\Extensions\Shipping\ShippingStandard\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShippingStandardModel extends Model
{
    public $timestamps = false;
    public $table      = 'shipping_standard';
    protected $guarded = [];
    public function uninstallExtension()
    {
        if (Schema::hasTable($this->table)) {
            Schema::drop($this->table);
        }

    }

    public function installExtension()
    {
        $return = ['error' => 0, 'msg' => 'Install extension success'];
        if (!Schema::hasTable($this->table)) {
            try {
                Schema::create($this->table, function (Blueprint $table) {
                    $table->increments('id');
                    $table->double('min_total');
                    $table->double('max_total');
                    $table->double('fee');
                    $table->tinyInteger('is_free')->default(0);
                    $table->tinyInteger('status')->default(1);
                });

                $this->insert([
                    [
                        'min_total' => 0,
                        'max_total' => 49.99,
                        'fee' => 4.95,
                        'is_free' => 0,
                        'status' => 1
                    ],
                    [
                        'min_total' => 50,
                        'max_total' => 89.99,
                        'fee' => 2.95,
                        'is_free' => 0,
                        'status' => 1
                    ],
                    [
                        'min_total' => 90,
                        'max_total' => 100000,
                        'fee' => 0,
                        'is_free' => 1,
                        'status' => 1
                    ]

                ]);

            } catch (\Exception $e) {
                $return = ['error' => 1, 'msg' => $e->getMessage()];
            }
        } else {
            $return = ['error' => 1, 'msg' => 'Table ' . $this->table . ' exist!'];
        }
        return $return;
    }
}
