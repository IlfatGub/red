# Install

### sql
~~~
# создать БД
create DATABASE red
~~~
### bash
~~~
# Устанавливаем пакеты 
composer update

# Инициализация. Запуск миграций. Создание пользователей. Создание ролей. Привязка пользователям ролей.
# Создаются все таблицы. Генерируеться инфорамция: создаются товары, к товарам комментарии и категории.
yii rbac/init
~~~



# Описание
~~~
Раздел "Товары".
Вместо "Избранного" решил использовать "Корзина"
У товара есть кнопка "Корзина", нажав, товар записываеться в базу basket. Процесс реализован чере ajax. Файл: /js/main.js

Раздел "Отзывы". 
Отзыв можно оставть на странице товара /products/view. Так же происодит без перезагрузки страницы, реализован через Pjax

Раздел "Популярные категории". 
Страница /site/index?type=popular. Туда входят все товары где больш 4 комментариев, и выведены категории по этим товарам.

Раздел "Поиск". 
Страница /site/serach. К сожалению сделал поиск только отдельно по  наименованию товара и отдельно категории, не хватило времени додумать и реализовать полностью указанный функционал 

Административная панель (необязательный пункт)
Админка самая простая сгенерированная GII, необходимо авторизоваться под admin
~~~



# Databases

| таблица  | Предназначение |
|-----:|-----------|
|     user| Пользователями|
|     products| Товары    |
|     comments| Коментарии       |
|     category| Категории       |
|     basket| Корзина       |

# site map
/site/login - авторизация

/site/index - Основная страница с товарами

/site/index?type=popular - страница с выводом популярных товаров и категорий. 

/site/serach - страница с выводм поиска

/basket/index - корзина для товара

/products/view - страница товара. + Форма для комментариев


# Учетки

| login  | Passwords |
|-----:|-----------|
|     admin| admin|
|     user1| user1    |
|     user2| user2       |
|     user3| user3       |

---
> Под админом(admin), есть простая админка(сгенерированная GII)



