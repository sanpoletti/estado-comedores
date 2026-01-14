# API Estado de Comedores

Proyecto Laravel para exponer el estado y la capacidad diaria de raciones
de los grupos/comedores comunitarios para la app de retiro de comida.

## Proyecto
- Nombre: estado-comedores
- Autenticación: Basic Auth
- Tecnología: Laravel
- Base de datos: SQL Server
- Repo: https://github.com/sanpoletti/estado-comedores.git

## Endpoint

GET /api/v1/estado-comedores

### Parámetros
- idHogar (int)
- tipoGrupo (int)

## Estados posibles
- VIGENTE
- SUSPENDIDO
- CERRADO

## Raciones
El SP _Grupos devuelve:
- -1 → no presta
- >=0 → cantidad de raciones

La API normaliza:
- -1 → 0

## Stored Procedure
- Nombre: _Grupos
- Parámetros: @IDHOGAR, @tGrupo
- Campos: Desayuno, Almuerzo, Merienda, Cena

## Estado actual
- Proyecto Laravel creado
- php artisan serve funcionando

## Próximo paso
- Configurar conexión a SQL Server
- Crear controller y endpoint
