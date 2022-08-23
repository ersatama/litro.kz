# Introduction

API документация для litro.kz

1) Обновить документацию<br>
<b>php artisan scribe:generate</b><br><br>
2) Параметры<br>
<b>skip - пропустить (начало 0)</b><br>
<b>take - количество данных (например 100)</b><br>
<b>/{skip}/{take} - /0/100 пример (первые 100 записей)</b><br><br>
3) Коды ответа HTTP<br>
<b><span style="color: green;">200 - OK</span> : успешный запрос</b><br>
<b><span style="color: red;">400 - Bad Request</span> : неправильный, некорректный запрос</b><br>
<b><span style="color: red;">401 - Unauthorized</span> : не авторизован</b><br>
<b><span style="color: red;">404 - Not Found</span> : не найдено</b><br>
<b><span style="color: red;">500 - Internal Server Error</span> : внутренняя ошибка сервера</b>

> Base URL

```yaml
http://localhost:8000
```