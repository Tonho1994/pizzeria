Adjunto el archivo zip del proyecto hasta donde llegue a completar a la 1 de la mañana.

De igual manera les comparto el enlace al repositorio para que vean la versión terminada, que seguramente terminaré en la madrugada, pero dadas las condiciones del tiempo no quería postergar más la entrega.

https://github.com/Tonho1994/pizzeria.git

---------IMPORTANTE:
Se debe descomentar el archivo app/providers/AppServiceProvider en:
- linea 5 (use App\Models\Pizza;)
- linea 29 (View::share('pizzas', Pizza::all());)

despues de correr las migraciones y los seeders, ya que estas funciones envian cierta informacion a todas las vistas y son necesarias

Gracias por su tiempo, Buen día.
