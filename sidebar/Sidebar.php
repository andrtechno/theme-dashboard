<?php

namespace app\web\themes\dashboard\sidebar;

use panix\engine\CMS;
use Yii;
use yii\helpers\ArrayHelper;
use panix\engine\Html;

class Sidebar
{

    public $items = [];

    public function __construct()
    {
        //$found = array_merge($this->items, $this->findMenu());
        $found = ArrayHelper::merge($this->items, $this->findMenu());
        //unset($this->items['shop'], $this->items['cart'], $this->items['user']);
        //CMS::dump($found);
        //die;
        //$found = array_merge($this->items, $this->findMenu());
        $defaultItems['system'] = [
            'sort' => -2,
            'label' => Yii::t('admin/default', 'SYSTEM'),
            'icon' => 'tools',
            'visible' => count($found['system']['items'])
        ];

        if (isset($found['modules'])) {
            $defaultItems['modules'] = [
                'sort' => -1,
                'label' => Yii::t('admin/default', 'MODULES'),
                'icon' => 'puzzle',
                'visible' => count($found['modules']['items'])
            ];
        }
        $this->items = ArrayHelper::merge($defaultItems, $found);
        //$this->items = array_merge($defaultItems, $found);


        self::sortList($this->items);


    }


    public function findMenu($mod = false)
    {
        $result = [];
        if (!$mod) {
            $modules = Yii::$app->getModules();
            foreach ($modules as $key => $module) {
                if (method_exists($module, 'getAdminMenu')) {
                    $result = ArrayHelper::merge($result, $module->getAdminMenu());
                    //$result = array_merge($result, $module->getAdminMenu());
                    //$result[$key] = $module->getAdminMenu();
                }
            }
        }

        $new = [];
        foreach ($result as $id => $res) {
            $new[$id] = $res;
            if (isset($res['visible'])) {
                if (!$res['visible']) {
                    //unset($this->items[$mid]);
                }
            }

            if (isset($res['items'])) {

                foreach ($res['items'] as $k => $item) {
                    if (isset($item['visible'])) {
                        if (!$item['visible']) {
                            // CMS::dump($result[$mid]['items'][$k]);die;
                            unset($result[$id]['items'][$k]);
                        }
                    }
                }
            }
        }
        //CMS::dump($result);die;
        return ($mod) ? $result[$mod] : $result;
    }

    public static function sortList(&$arr, $sort = SORT_DESC)
    {
        $sort_col = [];
        foreach ($arr as $key => $row) {
            $sort_col[$key] = (isset($row['sort'])) ? $row['sort'] : 0;
        }
        array_multisort($sort_col, $sort, $arr);
    }

    public function __toString()
    {
        return '';
    }
}
