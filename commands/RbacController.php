<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\User;
/**
 * Инициализатор RBAC выполняется в консоли php yii my-rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {

        \Yii::$app->runAction('migrate');
        \Yii::$app->runAction('migrate', ['migrationPath' => '@yii/rbac/migrations/']);

        
        $auth = Yii::$app->authManager;
        $user = new User();

        $user->username = 'admin';
        $user->email = 'admin@red.ru';
        $user->password = 'admin';
        $adm = $user->userCreate();
        
        $user->username = 'user1';
        $user->email = 'user1@red.ru';
        $user->password = '321qwe';
        $user1 = $user->userCreate();

        $user->username = 'user2';
        $user->email = 'user2@red.ru';
        $user->password = '321qwe';
        $user2 = $user->userCreate();

        $user->username = 'user3';
        $user->email = 'user3@red.ru';
        $user->password = '321qwe';
        $user3 = $user->userCreate();

        // Создадим роли админа и покупателей
        $admin = $auth->createRole('admin');
        $shop = $auth->createRole('shop');
        
        // запишем их в БД
        $auth->add($admin);
        $auth->add($shop);
        
        // Назначаем роль admin
        $auth->assign($admin, $adm->id); 
        $auth->assign($shop, $user1->id); 
        $auth->assign($shop, $user2->id); 
        $auth->assign($shop, $user3->id); 
    }
}