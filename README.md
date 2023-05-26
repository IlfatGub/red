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
yii rbac/init
~~~




# Databases
user – 

products – 

comments – 

category – 

basket – 


# site map
/site/login - авторизация

/site/index - Основная страница с товарами

/site/index?type=popular - страница с выводом популярных товаров и категорий. 

/site/serach - страница с выводм поиска

/basket/index - корзина для товара

/products/view - страница товара. + Форма для комментариев



# Учетки
login:admin, pass:admin

login:user1, pass:user1

login:user2, pass:user2

login:user3, pass:user3

Под админом(admin), есть простая админка(сгенерированная GII)


