<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\Contracts\View\View;

use Route;
use Auth;

class AdminMainMenuComposer
{
    protected $current_route_name = '';
    protected $route_group_name_prefix = 'admin::';

    protected function getMenuItems()
    {
        return collect([
            $this->setMenuItem('admin_access', [
                $this->setSubMenuItem('index', 'admin_access', 'index')
            ]),
            $this->setMenuItem('manage_users', [
                $this->setSubMenuItem('users.create', 'manage_users', 'create'),
                $this->setSubMenuItem('users.index', 'manage_users', 'index'),
                $this->setSubMenuItem('users.trash', 'manage_users', 'trash'),
                $this->setSubMenuItem('users.edit', 'manage_users', '')
            ]),
            $this->setMenuItem('manage_schools', [
                $this->setSubMenuItem('schools.create', 'manage_schools', 'create'),
                $this->setSubMenuItem('schools.index', 'manage_schools', 'index'),
                $this->setSubMenuItem('schools.trash', 'manage_schools', 'trash'),
                $this->setSubMenuItem('schools.edit', 'manage_schools', '')
            ]),

        ]);
    }

    public function __construct()
    {
        $this->current_route_name = str_replace($this->route_group_name_prefix, '', Route::currentRouteName());
    }

    public function compose(View $view)
    {
        $view->with('menu_items', $this->constructMenuMap());
        $view->with('route_group_prefix', $this->route_group_name_prefix);
    }

    protected function isActiveSection(array $route_names = [])
    {
        return in_array($this->current_route_name, $route_names);
    }

    public function constructMenuMap()
    {
        $user = Auth::user();

        return $this->getMenuItems()->filter(function ($menu_item) use ($user) {
            $permissions = $menu_item->routes->pluck('permission');
            return $user->hasPermission($permissions->unique()->toArray());
        })->map(function ($menu_item) use ($user) {
            return (object) [
                'label'		=> trans($menu_item->label.".admin_menu.label"),
                'current'	=> $this->isActiveSection($menu_item->routes->pluck('name')->toArray()),
                'sub_menu'	=> $menu_item->routes->filter(function ($sub_menu_item) use ($user,$menu_item) {
                    return !empty($sub_menu_item->label) && $user->hasPermission($sub_menu_item->permission);
                })->map(function ($sub_menu_item) use ($menu_item) {
                    return (object) [
                        'name'			=> $sub_menu_item->name,
                        'permission'	=> $sub_menu_item->permission,
                        'label'			=> trans($menu_item->label.".admin_menu.".$sub_menu_item->label),
                    ];
                    ;
                })
            ];
        });
    }

    protected function setSubMenuItem($route_name, $permission, $label)
    {
        return (object) [
            'name'			=> $route_name,
            'permission'	=> $permission,
            'label'			=> $label
        ];
    }


    protected function setMenuItem($label, array $sub_menu)
    {
        return (object) [
            'label'		=> $label,
            'routes'	=> collect($sub_menu)
        ];
    }
}
