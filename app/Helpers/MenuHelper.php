<?php

namespace App\Helpers;

class MenuHelper
{
    public static function getMainNavItems()
    {
        return [
            [
                'icon' => 'dashboard',
                'name' => 'Dashboard',
                'subItems' => [
                    ['name' => 'Ecommerce', 'path' => '/'],
                ],
            ],
            [
                'icon' => 'category',
                'name' => 'Kategori',
                'path' => '/kategori'
            ],
            [
                'icon' => 'product',
                'name' => 'Produk',
                'path' => '/produk'
            ],
            [
                'icon' => 'customer',
                'name' => 'Pelanggan',
                'path' => '/pelanggan'
            ]
        ];
    }

    public static function getMenuGroups()
    {
        return [
            [
                'title' => 'Menu',
                'items' => self::getMainNavItems()
            ],
        ];
    }

    public static function isActive($path)
    {
        return request()->is(ltrim($path, '/'));
    }

    public static function getIconSvg($iconName)
    {
        $icons = [
            'dashboard' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z" fill="currentColor"></path></svg>',
            'category' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.25C3 3.55964 3.55964 3 4.25 3H9.75C10.4404 3 11 3.55964 11 4.25V9.75C11 10.4404 10.4404 11 9.75 11H4.25C3.55964 11 3 10.4404 3 9.75V4.25ZM4.5 4.5V9.5H9.5V4.5H4.5ZM13 4.25C13 3.55964 13.5596 3 14.25 3H19.75C20.4404 3 21 3.55964 21 4.25V9.75C21 10.4404 20.4404 11 19.75 11H14.25C13.5596 11 13 10.4404 13 9.75V4.25ZM14.5 4.5V9.5H19.5V4.5H14.5ZM3 14.25C3 13.5596 3.55964 13 4.25 13H9.75C10.4404 13 11 13.5596 11 14.25V19.75C11 20.4404 10.4404 21 9.75 21H4.25C3.55964 21 3 20.4404 3 19.75V14.25ZM4.5 15V19.5H9.5V15H4.5ZM13 14.25C13 13.5596 13.5596 13 14.25 13H19.75C20.4404 13 21 13.5596 21 14.25V19.75C21 20.4404 20.4404 21 19.75 21H14.25C13.5596 21 13 20.4404 13 19.75V14.25ZM14.5 15V19.5H19.5V15H14.5Z" fill="currentColor"></path></svg>',
            'product' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.87 2.29a2 2 0 0 0-1.74 0l-7 3.5A2 2 0 0 0 3 7.57v8.86a2 2 0 0 0 1.13 1.79l7 3.5a2 2 0 0 0 1.74 0l7-3.5A2 2 0 0 0 21 16.43V7.57a2 2 0 0 0-1.13-1.79l-7-3.5zM12 4l6.5 3.25L12 10.5 5.5 7.25 12 4zm7.5 4.96v7.47L13 19.68v-7.47l6.5-3.25zm-8 10.72L5 16.43V8.96l6.5 3.25v7.47z" fill="currentColor"></path></svg>',
            'customer' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 3a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9zm-6 4.5a6 6 0 1 1 12 0 6 6 0 0 1-12 0zm6 7.5c-4.14 0-7.5 3.36-7.5 7.5a.75.75 0 0 0 1.5 0c0-3.31 2.69-6 6-6s6 2.69 6 6a.75.75 0 0 0 1.5 0c0-4.14-3.36-7.5-7.5-7.5z" fill="currentColor"></path></svg>'
        ];
        return $icons[$iconName] ?? '<svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" fill="currentColor"/></svg>';
    }
}
