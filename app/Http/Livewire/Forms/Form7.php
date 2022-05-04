<?php

namespace App\Http\Livewire\Forms;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Form;
use App\Models\Sesion;

use Livewire\Component;

class Form7 extends Component
{
    public $value0;
    public $value1;

    public function mount()
    {
        $this->sesion = new Sesion;
        $this->form = Form::first();
        $this->questions = $this->form->questions;
        $this->idx = 0;
        $this->answers = array();
        $this->answers[$this->idx]["answer"] = -1;
        $this->isCreate = true;
    }

    protected $rules = [
        'value0' => ['required' , 'integer'],
        'value1' => ['required' , 'integer']
    ];

    protected $messages = [
        'value0.required' => 'El campo es obligatorio',
        'value0.integer' => 'El valor debe ser número entero',
        'value1.required' => 'El campo es obligatorio',
        'value1.integer' => 'El valor debe ser número entero'
    ];

    protected $listeners = ['create'];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create(Sesion $sesion , Form $form)
    {
        $this->sesion = $sesion;
        $this->form = $form;
        $this->questions = $this->form->questions;
        $this->idx = 0;
        $this->answers = array();

        if($this->sesion->choices()->where('form_id', '=', $this->form->id)->get()->count())
        {
            $this->isCreate = false;
            foreach($this->questions as $current_question)
            {
                $answer = $this->sesion->choices()->where('question_id', '=', $current_question->id)->first()->answer_id;
                array_push($this->answers , ["question"=>$current_question->id , "answer"=> $answer]);
            }
            $this->value0 = $this->answers[0]["answer"];
            $this->value1 = $this->answers[1]["answer"];
        }
        else
        {
            $this->isCreate = true;
            foreach($this->questions as $current_question)
            { array_push($this->answers , ["question"=>$current_question->id , "answer"=> -1]); }
        }

        $this->emit('open-modal','#modal-form'.$this->form->id);
    }

    public function back()
    { $this->idx-=2; }

    public function next()
    {        
        $this->validate();

        $this->answers[0]["answer"] = $this->value0;
        $this->answers[1]["answer"] = $this->value1;
        
        $this->idx+=2;
    }

    public function saveAll()
    {
        foreach($this->answers as $current_answer)
        {
            $choice = new Choice;
            $choice->sesion_id = $this->sesion->id;
            $choice->form_id = $this->form->id;
            $choice->question_id = $current_answer["question"];
            $choice->answer_id = $current_answer["answer"];
            $choice->save();
        }

        $cont = 0;
        $forms = Form::all(); 
        foreach($forms as $current_form)
        {
            if($this->sesion->choices()->where('form_id', '=', $current_form->id)->first()){ $cont++; }
        }

        if($cont == count($forms))
        { $this->sesion->finish = true; $this->sesion->save(); }

        $this->emitTo('forms.index','changeState',$this->form->id);
        $this->emit('close-modal','#modal-form'.$this->form->id);
        $this->emit('success');
    }

    public function render()
    {
        return view('livewire.forms.form7');
    }
}
