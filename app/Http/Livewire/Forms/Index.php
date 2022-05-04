<?php

namespace App\Http\Livewire\Forms;

use App\Models\Sesion;
use App\Models\Form;

use Livewire\Component;

class Index extends Component
{
    public function mount(Sesion $current_sesion)
    {   
        $this->sesion = $current_sesion;
        
        $this->forms = array();
        
        foreach(Form::all() as $current_form)
        {
            $bandera = false;
            if($this->sesion->choices()->where('form_id', '=', $current_form->id)->get()->count()){ $bandera = true; }

            array_push($this->forms , ['id'=>$current_form->id , 'name'=>$current_form->name , 'state'=>$bandera]);
        }

        $this->modals =
        [
            ['id'=>'modal-form1', 'title'=>'TINETTI MARCHA', 'component'=>'forms.form1'],
            ['id'=>'modal-form2', 'title'=>'TINETTI BALANCE', 'component'=>'forms.form2'],
            ['id'=>'modal-form3', 'title'=>'SPPB', 'component'=>'forms.form3'],
            ['id'=>'modal-form4', 'title'=>'MINI EXAMEN DEL ESTADO MENTAL (MMSE)', 'component'=>'forms.form4'],
            ['id'=>'modal-form5', 'title'=>'VELOCIDAD DE LA MARCHA', 'component'=>'forms.form5'],
            ['id'=>'modal-form6', 'title'=>'TIMED UP AND GO', 'component'=>'forms.form6'],
            ['id'=>'modal-form7', 'title'=>'ALCANCE FUNCIONAL', 'component'=>'forms.form7'],
            ['id'=>'modal-form8', 'title'=>'PROPUESTA DE ESCALA DE RIESGO A CAÍDAS DE DOWNTOWN', 'component'=>'forms.form8']
        ];  

        // $this->modals = array();
        // $cont = 1;
        // foreach($forms as $current_form)
        // {
        //     array_push($this->modals , ['id'=>'modal-form'.$current_form->id , 'title'=>$current_form->name , 'component'=>'forms.form'.$cont]);
        //     $cont++;
        // }
    }

    protected $listeners = ['changeState'];

    public function changeState($form_id)
    {
        for($i=0; $i<count($this->forms); $i++)
        {
            if($this->forms[$i]["id"] == $form_id){ $this->forms[$i]['state'] = true; }
        }
    }

    public function create($form_id)
    {
        $this->emitTo('forms.form'.$form_id , 'create' , $this->sesion , $form_id);
    }

    public function render()
    {
        return view('livewire.forms.index');
    }
}