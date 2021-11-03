<?php

namespace Core\Model\View;

class Layout
{
    const LAYOUT_PATH = 'Code\Resources\Layout';
    const BASE_LAYOUT = 'default.php';
    const ROOT_NODE = 'root';

    private $loadedLayout = [];

    public function loadLayout($page)
    {
        $pathLayout = str_replace('_', DS,$page) . '.php';
        $filesToParse = [
            self::BASE_LAYOUT,
            $pathLayout
        ];

        foreach ($filesToParse as $file) {
            $content = include BD . DS . self::LAYOUT_PATH . DS . $file;
            /**
             * положим в loadedLayout содержимое файлов, чьи названия нам пришли
             * первым массивом всегда наш дефолт ( base_layout). Он задает основу. затем идёт второй файл из pathToLayout.
             * Он меняет информацию. они должны лежать в Лаяут патче.
             */
            $this->loadedLayout = array_replace_recursive($this->loadedLayout, $content);
        }
    }
}

