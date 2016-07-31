<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 31.07.16
 * Time: 19:40
 */

namespace app\modules\admin\controllers;

use Yii;


class SystemController extends AppAdminController
{
    public function actionFlushCache()
    {
        Yii::$app->cache->flush();
        Yii::$app->session->setFlash('success', "Кеш очищен");
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionClearAssets()
    {
        foreach(glob(Yii::$app->assetManager->basePath . DIRECTORY_SEPARATOR . '*') as $asset){
            if(is_link($asset)){
                unlink($asset);
            } elseif(is_dir($asset)){
                $this->deleteDir($asset);
            } else {
                unlink($asset);
            }
        }
        Yii::$app->session->setFlash('success', "Ресурсы очищены");
        return $this->redirect(Yii::$app->request->referrer);
    }

    private function deleteDir($directory)
    {
        $iterator = new \RecursiveDirectoryIterator($directory, \RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new \RecursiveIteratorIterator($iterator, \RecursiveIteratorIterator::CHILD_FIRST);
        foreach($files as $file) {
            if ($file->isDir()){
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        return rmdir($directory);
    }
}