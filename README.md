# API Estado de Comedores

Proyecto Laravel para exponer el estado y la disponibilidad diaria de raciones
de los grupos/comedores comunitarios para la app de retiro de comida.

## Proyecto
- Nombre: estado-comedores
- Autenticación: Basic Auth
- Tecnología: Laravel 9
- Base de datos: SQL Server
- Tipo de API: REST (solo lectura)
- Repo: https://github.com/sanpoletti/estado-comedores.git

## URL Producción
http://10.22.1.86:8005

## Endpoint

GET /api/v1/estado-comedores

## Autenticación

La API utiliza autenticación **Basic Auth**.  
Las credenciales (usuario y contraseña) deben enviarse mediante el header
`Authorization` utilizando el esquema Basic.

## Parámetros
- idHogar (int)  
  Identificador del comedor / grupo.

- tipoGrupo (int)  
  Tipo de grupo (por ejemplo: COMEDOR, MERENDERO).

## Estados posibles
- VIGENTE
- SUSPENDIDO
- CERRADO
- EN RECESO

## Raciones

El Stored Procedure `_Grupos` devuelve los siguientes valores:
- **-1** → no presta el servicio
- **>= 0** → cantidad de raciones disponibles

La API interpreta los valores de la siguiente manera:
- **0** → no hay raciones disponibles para el servicio
- **-1** → el comedor no reparte raciones para ese servicio

Servicios informados:
- Desayuno
- Almuerzo
- Merienda
- Cena

## Stored Procedure
- Nombre: _Grupos
- Parámetros: @IDHOGAR, @tGrupo
- Campos: Desayuno, Almuerzo, Merienda, Cena

## Ejemplo de uso

GET /api/v1/estado-comedores?idHogar=1234&tipoGrupo=COMEDOR

## Estado actual
- API funcionando en entorno productivo
- Autenticación Basic Auth implementada
- Endpoint disponible y operativo
- Consultas realizadas contra SQL Server

## Notas
- La API devuelve respuestas en formato JSON
- En caso de error, se retorna un mensaje descriptivo

