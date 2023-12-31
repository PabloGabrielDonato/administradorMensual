<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $fillable = ['mes', 'estado_pago', 'total'];
    protected $dates = ['fecha_modificacion'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
    public function disciplinas()
    {
        // Accede a las disciplinas a través del modelo Alumno
        return $this->alumno->disciplinas();
    }

    // Método para calcular el total
    public function calcularTotal()
    {
        // Obtén las disciplinas asociadas al alumno de esta cuota
        $disciplinas = $this->alumno->disciplinas;

        // Calcula el total sumando los precios de las disciplinas
        $total = $disciplinas->sum('precio');

        return $total;
    }

    // Método para actualizar el total solo si la cuota no está pagada
public function actualizarTotal()
{
    if ($this->estado_pago !== 'pagada') {
        $this->update(['total' => $this->calcularTotal()]);
    }
}

public function actualizarEstado($nuevoEstado)
    {
        // Si el nuevo estado es 'pagada', no actualices el total
        if ($nuevoEstado === 'pagada') {
            $this->estado_pago = 'pagada';
            $this->congelarTotal(); // Llama a la función para congelar el total
            $this->congelarDisciplinas(); // Llama a la función para congelar las disciplinas
        } else {
            // Si el nuevo estado es 'no_corresponde', establece el total en 0
            if ($nuevoEstado === 'no_corresponde') {
                $this->total = 0;
                $this->congelarDisciplinas(); // Llama a la función para congelar las disciplinas
            } else {
                // Actualiza el estado y recalcula el total
                $this->total = $this->calcularTotal();
            }

            $this->estado_pago = $nuevoEstado;
        }

        $this->fecha_modificacion = ($nuevoEstado === 'pagada') ? now() : null;
        $this->save();
    }

    // Función para congelar el total si la cuota está pagada
    public function congelarTotal()
    {
        if ($this->estado_pago === 'pagada') {
            $this->update(['total' => $this->calcularTotal()]);
        }
    }

   // Función para congelar las disciplinas si la cuota está pagada
   public function congelarDisciplinas()
   {
       if ($this->estado_pago === 'pagada') {
           // Obtén las disciplinas asociadas al alumno de esta cuota
           $disciplinas = $this->alumno->disciplinas;

           // Actualiza el estado de las disciplinas asociadas
           foreach ($disciplinas as $disciplina) {
               $disciplina->update(['estado' => 'congelada']); // Ajusta según tu modelo de datos
           }
       }
   }

   // Sobrescribe el método save para realizar acciones adicionales antes de guardar
   public function save(array $options = [])
   {
       // Antes de guardar, verifica si el estado es 'no_corresponde' y ajusta el total
       if ($this->estado_pago === 'no_corresponde') {
           $this->total = 0;
       }

       // Llama al método save original para guardar la cuota
       parent::save($options);

       // Llama a la función para congelar las disciplinas después de guardar
       $this->congelarDisciplinas();
   }



}
